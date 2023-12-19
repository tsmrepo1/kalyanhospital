<?php
/**
 * PageSpeed Ninja
 * https://pagespeed.ninja/
 *
 * @version    1.1.1
 * @license    GNU/GPL v2 - http://www.gnu.org/licenses/gpl-2.0.html
 * @copyright  (C) 2016-2023 PageSpeed Ninja Team
 * @date       December 2023
 */

class PagespeedNinja_AdminAjax
{
    /** @var PagespeedNinja_Admin */
    private $admin;

    /**
     * Initialize the class and set its properties.
     *
     * @param PagespeedNinja_Admin $plugin_admin
     */
    public function __construct($plugin_admin)
    {
        $this->admin = $plugin_admin;
    }

    /** @return void */
    public function get_cache_size()
    {
        header('Content-Type: text/json');

        $type = $_POST['type'];

        switch ($type) {
            case 'image':
                $size = 0;
                $files = 0;
                foreach ($this->getStaticDirs() as $staticdir) {
                    $dir = rtrim(ABSPATH, '/') . $staticdir;
                    $this->getDirectoryStats($dir . '/img', $size1, $files1);
                    $this->getDirectoryStats($dir . '/img-r', $size2, $files2);
                    $size += $size1 + $size2;
                    $files += $files1 + $files2;
                }
                echo json_encode(array('size' => size_format($size), 'files' => $files));
                break;
            case 'loaded':
                $size = 0;
                $files = 0;
                foreach ($this->getStaticDirs() as $staticdir) {
                    $dir = rtrim(ABSPATH, '/') . $staticdir;
                    $this->getDirectoryStats($dir . '/loaded', $size1, $files1);
                    $size += $size1;
                    $files += $files1;
                }
                echo json_encode(array('size' => size_format($size), 'files' => $files));
                break;
            case 'static':
                $size = 0;
                $files = 0;
                foreach ($this->getStaticDirs() as $staticdir) {
                    $dir = rtrim(ABSPATH, '/') . $staticdir;
                    $this->getDirectoryStats($dir, $size1, $files1, false);
                    $size += $size1;
                    $files += $files1;
                }
                echo json_encode(array('size' => size_format($size), 'files' => $files));
                break;
            case 'ress':
                $resscachedir = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/cache';
                $this->getDirectoryStats($resscachedir, $size, $files);
                echo json_encode(array('size' => size_format($size), 'files' => $files));
                break;
            case 'page':
                $pagecachedir = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/pagecache';
                $this->getDirectoryStats($pagecachedir, $size, $files);
                echo json_encode(array('size' => size_format($size), 'files' => $files));
                break;
        }
        wp_die();
    }

    /**
     * @param string $dir
     * @param int $size
     * @param int $files
     * @param bool $recursive
     * @return void
     */
    protected function getDirectoryStats($dir, &$size, &$files, $recursive = true)
    {
        $size = 0;
        $files = 0;

        if (is_dir($dir)) {
            $this->getDirectorySize($dir, $size, $files, $recursive);
        }
    }

    /**
     * @param string $dir
     * @param int $size
     * @param int $files
     * @param bool $recursive
     * @return void
     */
    private function getDirectorySize($dir, &$size, &$files, $recursive = true)
    {
        if ($h = @opendir($dir)) {
            while ($entry = readdir($h)) {
                if ($entry !== '.' && $entry !== '..') {
                    $path = $dir . DIRECTORY_SEPARATOR . $entry;
                    if (is_file($path)) {
                        $size += filesize($path);
                        $files++;
                    } elseif ($recursive && is_dir($path)) {
                        $this->getDirectorySize($path, $size, $files);
                    }
                }
            }
            closedir($h);
        }
    }

    /**
     * @param string $dir
     * @param bool $recursive
     * @return void
     */
    protected function clearDirectory($dir, $recursive = true)
    {
        if (!is_dir($dir)) {
            return;
        }

        $entries = scandir($dir, SCANDIR_SORT_NONE);
        foreach ($entries as $entry) {
            if ($entry !== '.' && $entry !== '..') {
                $path = $dir . DIRECTORY_SEPARATOR . $entry;
                if (is_file($path) || is_link($path)) {
                    unlink($path);
                } elseif ($recursive) {
                    $this->clearDirectory($path);
                    rmdir($path);
                }
            }
        }
    }

    /**
     * @return string[]
     */
    protected function getStaticDirs()
    {
        if (!is_multisite()) {
            $config = get_option('pagespeedninja_config');
            return array($config['staticdir']);
        }
        $staticdirs = array();
        foreach (get_sites() as $site) {
            $config = get_blog_option($site->blog_id, 'pagespeedninja_config');
            $staticdirs[$config['staticdir']] = 1;
        }
        return array_keys($staticdirs);
    }

    /** @return void */
    public function clear_images()
    {
        foreach ($this->getStaticDirs() as $staticdir) {
            $dir = rtrim(ABSPATH, '/') . $staticdir;
            $this->clearDirectory($dir . '/img');
            $this->clearDirectory($dir . '/img-r');
        }
        wp_die();
        exit;
    }

    /** @return void */
    public function clear_loaded()
    {
        foreach ($this->getStaticDirs() as $staticdir) {
            $dir = rtrim(ABSPATH, '/') . $staticdir;
            $this->clearDirectory($dir . '/loaded');
        }
        wp_die();
        exit;
    }

    /**
     * @param int $ttl (seconds)
     */
    protected function clear_cache($ttl)
    {

        /** @var array $options */
        $options = get_option('pagespeedninja_config');

        if (!preg_match('#^/[^/]#', $options['staticdir'])) {
            return;
        }

        if (!class_exists('Ressio', false)) {
            include_once dirname(__DIR__) . '/ress/ressio.php';
        }

        try {
            Ressio::registerAutoloading(true);
        } catch (Exception $e) {
            return;
        }

        try {
            $di = new Ressio_DI();
            $di->set('config', new stdClass());
            $di->config->cachedir = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/cache';
            $di->config->cachettl = $ttl;
            $di->config->webrootpath = rtrim(ABSPATH, '/');
            $di->config->staticdir = $options['staticdir'];
            $di->config->change_group = null;
            $di->set('filesystem', Ressio_Filesystem_Native::class);
            $di->set('filelock', Ressio_FileLock_flock::class);

            $lock = $di->config->cachedir . '/filecachecleaner.stamp';
            unlink($lock);

            $plugin = new Ressio_Plugin_FileCacheCleaner($di, null);
        } catch (ERessio_UnknownDiKey $e) {
            return;
        }

        // invalidate page cache (empty cache triggers /s clearing)
        $pagecache_stamp = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/pagecache/tags/GLOBAL';
        if (file_exists($pagecache_stamp)) {
            $newStamp = time() - $ttl;
            if (@filemtime($pagecache_stamp) < $newStamp) {
                touch($pagecache_stamp, $newStamp);
            }
        } else {
            touch($pagecache_stamp);
        }
    }

    /** @return void */
    public function clear_cache_expired()
    {
        /** @var array $options */
        $options = get_option('pagespeedninja_config');
        $ttl = (int)$options['caching_ttl'] * 60;
        $this->clear_cache($ttl);
        wp_die();
        exit;
    }

    /** @return void */
    public function clear_cache_all()
    {
        $this->clear_cache(1);
        wp_die();
        exit;
    }

    /**
     * @param int $ttl (seconds)
     */
    protected function clear_pagecache($ttl)
    {
        global $pagespeedninja_cache;
        if (!isset($pagespeedninja_cache)) {
            if (!defined('PAGESPEEDNINJA_CACHE_DIR')) {
                define('PAGESPEEDNINJA_CACHE_DIR', WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/pagecache');
            }
            if (!defined('PAGESPEEDNINJA_CACHE_TTL')) {
                define('PAGESPEEDNINJA_CACHE_TTL', $ttl);
            }
            $pluginDir = dirname(__DIR__);
            include $pluginDir . '/public/advanced-cache.php';
        }
        $pagespeedninja_cache->purgeCache($ttl);
    }

    /** @return void */
    public function clear_pagecache_expired()
    {
        /** @var array $options */
        $options = get_option('pagespeedninja_config');
        $ttl = (int)$options['caching_ttl'] * 60;
        $this->clear_pagecache($ttl);
        wp_die();
        exit;
    }

    /** @return void */
    public function clear_pagecache_all()
    {
        $this->clear_pagecache(0);
        wp_die();
        exit;
    }

    /** @return void */
    public function update_atfcss()
    {
        /** @var array $options */
        $options = get_option('pagespeedninja_config');

        $options['css_abovethefoldstyle'] = '';
        update_option('pagespeedninja_config', $options);

        $atfCSS = $this->loadATFCSS($options);
        $plugin_file = dirname(__DIR__) . '/pagespeedninja.php';
        if (is_file($plugin_file) && $atfCSS !== '') {
            $options['css_abovethefoldstyle'] = $atfCSS;
            update_option('pagespeedninja_config', $options);
        }

        wp_die();
        exit;
    }

    /** @return void */
    public function ajax_key()
    {
        $config = $_POST['pagespeedninja_config'];

        $json = json_encode($config);
        $key = sha1($json . NONCE_SALT);

        file_put_contents(__DIR__ . '/sessions/' . $key, $json, LOCK_EX);

        echo $key;
        wp_die();
    }

    /**
     * @param array[] $options
     * @return string
     */
    private function loadATFCSS($options)
    {

        if (!function_exists('download_url')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        $websiteURL = rtrim(get_option('home'), '/') . '/?pagespeedninja=no';

        $data = array(
            'url' => $websiteURL,
            'apikey' => $options['apikey'],
        );

        $tmp_filename = download_url('https://api.pagespeed.ninja/v1/getcss?' . http_build_query($data), 60);
        if (is_string($tmp_filename)) {
            $css = @file_get_contents($tmp_filename);
            @unlink($tmp_filename);
            return $css;
        }
        return '';
    }

    /** @return void */
    public function dismiss_licensekey_2023nov15()
    {
        set_transient('dismiss_licensekey_2023nov15', '1', 7 * 24 * 60 * 60);

        wp_die();
    }

    /** @return void */
    public function send_survey()
    {
        if (!check_ajax_referer('psn_send_survey', 'nonce', false)) {
            wp_send_json_error();
        }

        $data = wp_parse_args($_POST['data']);
        $option = isset($data['psn-survey-option']) ? (int)$data['psn-survey-option'] : 0;
        $reason_key = 'psn-reason' . $option;
        $reason = isset($data[$reason_key]) ? $data[$reason_key] : '';
        wp_remote_post(
            'https://api.pagespeed.ninja/v1/survey-deactivate',
            array(
                'body' => array('option' => $option, 'reason' => $reason),
                'timeout' => 0.3
            )
        );
        wp_send_json_success();
    }
}
