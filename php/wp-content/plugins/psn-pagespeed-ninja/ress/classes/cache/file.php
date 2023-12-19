<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Cache_File implements IRessio_Cache, IRessio_DIAware
{
    /** @var IRessio_Filesystem */
    private $fs;
    /** @var IRessio_FileLock */
    private $filelock;
    /** @var string */
    private $cachedir;
    /** @var int */
    private $ttl;
    /** @var int Update time is used to don't update filesystem at initial 10% of cache lifetime */
    private $update_time;
    /** @var string */
    private $prefix;
    /** @var array */
    private $id2file = array();

    /**
     * @param Ressio_DI $di
     */
    public function __construct($di)
    {
        $time = time();
        $config = $di->config;
        $this->fs = $di->filesystem;
        $this->filelock = $di->filelock;

        $this->cachedir = isset($config->cachedir) ? $config->cachedir : './cache';

        $ttl = isset($config->cachettl) ? $config->cachettl : 24 * 60 * 60;
        $this->ttl = $ttl;
        $this->update_time = $time - (int)round(0.5 * $ttl);
        //$this->prefix = implode("\0", $config->cachedeps) . '_' . $this->fs->getModificationTime(__FILE__) . '_';
        $this->prefix = '';
        if (!empty($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'off') !== 0)) {


            $this->prefix .= 'https:_';
        }
        // for multisite
        $this->prefix .= $_SERVER['HTTP_HOST'] . '_';
    }

    /**
     * @param string|array $deps
     * @param string $suffix
     * @return string
     */
    public function id($deps, $suffix = '')
    {
        if (is_array($deps)) {
            $deps = implode("\0", $deps);
        }
        return sha1($this->prefix . $deps) . '_' . $suffix;
    }

    /**
     * @param string $id
     * @return string|bool
     */
    public function getOrLock($id)
    {
        $filename = $this->fileById($id);
        if ($this->fs->isFile($filename)) {
            $mtime = $this->fs->getModificationTime($filename);
            if ($mtime < $this->update_time) {
                // update modification time to don't remove actively used cache file
                $this->fs->touch($filename);
            }
            return $this->fs->getContents($filename);
        }
        return $this->filelock->lock($filename);
    }

    /**
     * @param string $id
     * @return bool
     */
    public function lock($id)
    {
        $filename = $this->fileById($id);
        return $this->filelock->lock($filename);
    }

    /**
     * @param string $id
     * @param string $data
     * @return bool
     */
    public function storeAndUnlock($id, $data)
    {
        $filename = $this->fileById($id);
        if ($this->filelock->isLocked($filename, true)) {
            $this->fs->putContents($filename, $data);
            $this->filelock->unlock($filename);
            return true;
        }
        return false;
    }

    /**
     * @param string $id
     * @return bool
     */
    public function delete($id)
    {
        $filename = $this->fileById($id);
        if ($this->fs->isFile($filename)) {
            if (!$this->filelock->isLocked($filename, true) && !$this->filelock->lock($filename)) {
                return false;
            }
            $this->fs->delete($filename);
        }
        $this->filelock->unlock($filename);
        return true;
    }

    /**
     * @param string $id
     * @return string
     */
    private function fileById($id)
    {
        if (!isset($this->id2file[$id])) {
            $dir = $this->cachedir . '/' . substr($id, 0, 2);
            $this->fs->makeDir($dir);
            $this->id2file[$id] = "$dir/$id";
        }
        return $this->id2file[$id];
    }

    /**
     * @return stdClass
     */
    public function getParams()
    {
        $params = new stdClass();
        $params->class = self::class;
        $params->cachedir = $this->cachedir;
        $params->ttl = $this->ttl;
        $params->prefix = $this->prefix;
        return $params;
    }

    /**
     * @param stdClass $params
     * @return bool
     */
    public function setParams($params)
    {
        if (!isset($params->class) || $params->class !== self::class) {
            return false;
        }

        $this->cachedir = $params->cachedir;
        $this->ttl = $params->ttl;
        $this->prefix = $params->prefix;

        $time = time();
        $this->update_time = $time - 0.9 * $params->ttl;

        return true;
    }
}
