<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_FilecacheCleaner extends Ressio_Plugin
{
    /** @var IRessio_FileLock */
    protected $filelock;
    /** @var IRessio_Filesystem */
    protected $filesystem;

    /**
     * @param Ressio_DI $di
     * @param ?stdClass $params
     */
    public function __construct($di, $params)
    {
        $params = $this->loadConfig(__DIR__ . '/config.json', $params);

        parent::__construct($di, $params);

        $this->filelock = $di->filelock;
        $this->filesystem = $di->filesystem;

        register_shutdown_function(array($this, 'shutdown'));
    }

    /** @return void */
    public function shutdown()
    {
        if ($this->params->detach) {
            // if (!headers_sent()) header('Connection: close');
            ignore_user_abort(true);
            while (ob_get_level()) {
                ob_end_flush();
            }
            flush();
            if (session_id()) {
                session_write_close();
            }
            if (function_exists('fastcgi_finish_request')) {
                fastcgi_finish_request();
            } elseif (function_exists('litespeed_finish_request')) {
                litespeed_finish_request();
            }
        }

        $filelock = $this->filelock;
        $fs = $this->filesystem;

        $cachedir = $this->config->cachedir;
        $ttl = $this->config->cachettl;
        if ($ttl <= 0) {
            $ttl = (int)ini_get('max_execution_time');
        }

        $cachecleaner_ttl = min($ttl, 24 * 60 * 60); // run daily even for larger TTL (@todo make it adjustable)

        $now = time();
        $aging_time = $now - $cachecleaner_ttl;

        $lock = $cachedir . '/filecachecleaner.stamp';
        if (!$fs->isFile($lock)) {
            // create the file with $aging_time timestamp to bypass getModificationTime check below
            $fs->touch($lock, $aging_time);
        }
        if (!$filelock->lock($lock)) {
            return;
        }
        if ($fs->getModificationTime($lock) > $aging_time) {
            // skip if it has just been processed (or is processing) by other script
            $filelock->unlock($lock);
            return;
        }
        $fs->touch($lock);
        $filelock->unlock($lock);

        // wait for double ttl to clear cache
        $aging_time = $now - 2 * $ttl;
        $file_list = array();

        $staticdir = $this->config->webrootpath . $this->config->staticdir;

        // iterate cache directory
        foreach (scandir($cachedir, SCANDIR_SORT_NONE) as $subdir) {
            $subdir_path = "$cachedir/$subdir";
            if ($subdir[0] === '.' || !is_dir($subdir_path)) {
                continue;
            }
            $h = opendir($subdir_path);
            $remove_dir = true;
            while (($file = readdir($h)) !== false) {
                $file_path = "$subdir_path/$file";
                if ($file[0] === '.' || !is_file($file_path)) {
                    continue;
                }
                if ($fs->getModificationTime($file_path) < $aging_time) {
                    unlink($file_path);
                    continue;
                }
                $remove_dir = false;
                $group = explode('_', $file, 2)[1];
                switch ($group) {
                    case 'js':
                        foreach (@json_decode(file_get_contents($file_path)) as $node) {
                            if (isset($node->attributes->src)) {
                                if (preg_match('#[/?]([0-9a-f]+\.js)$#', $node->attributes->src, $matches)) {
                                    $file_ref = $matches[1];
                                    $file_list[$file_ref] = 1;
                                }
                            }
                        }
                        break;
                    case 'css':
                        foreach (@json_decode(file_get_contents($file_path)) as $node) {
                            if (isset($node->attributes->href)) {
                                if (preg_match('#[/?]([0-9a-f]+\.css)$#', $node->attributes->href, $matches)) {
                                    $file_ref = $matches[1];
                                    $file_list[$file_ref] = 1;
                                }
                            }
                        }
                        break;
                    case 'htmljs':
                        if (preg_match_all('#src="[^">]+[/?]([0-9a-f]+\.js)#', file_get_contents($file_path), $matches)) {
                            foreach ($matches[1] as $file_ref) {
                                $file_list[$file_ref] = 1;
                            }
                        }
                        break;
                    case 'htmlcss':
                        if (preg_match_all('#href="[^">]+[/?]([0-9a-f]+\.css)#', file_get_contents($file_path), $matches)) {
                            foreach ($matches[1] as $file_ref) {
                                $file_list[$file_ref] = 1;
                            }
                        }
                        break;
                    case 'file':
                        $data = @json_decode(file_get_contents($file_path));
                        if (isset($data->filename) && strncmp($data->filename, $staticdir, strlen($staticdir)) === 0) {
                            $file_ref = substr($data->filename, strlen($staticdir) + 1);
                            $file_list[$file_ref] = 1;
                        }
                }
            }
            closedir($h);
            if ($remove_dir) {
                @rmdir($subdir_path);
            }
        }

        if (is_dir($staticdir)) {
            $iterator = new AppendIterator();
            // iterate static files
            $iterator->append(new DirectoryIterator($staticdir));
            // iterate loaded files
            if (is_dir("$staticdir/loaded")) {
                $iterator->append(new DirectoryIterator("$staticdir/loaded"));
            }
            foreach ($iterator as $file) {
                /** @var DirectoryIterator $file */
                if (!$file->isFile()) {
                    continue;
                }
                $file_name = $file->getFilename();
                $file_path = $file->getRealPath();
                if (
                    $file_name[0] === '.' ||
                    $fs->getModificationTime($file_path) >= $aging_time ||
                    substr($file_name, -4) === '.php' // preserve f.php file
                ) {
                    continue;
                }
                $src_file = str_replace('.gz', '', substr($file->getPathname(), strlen($staticdir) + 1));
                if (isset($file_list[$src_file])) {
                    continue;
                }
                unlink($file_path);
            }
        }
    }
}