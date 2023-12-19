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

abstract class PagespeedNinja_Activator
{
    /**
     * @param string $plugin_slug
     * @param string $plugin_name
     * @param string $version
     * @throws ERessio_Exception
     * @throws ERessio_UnknownDiKey
     */
    public static function activate_site($plugin_slug, $plugin_name, $version) {
        $pagecache_stamp = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/pagecache/tags/GLOBAL';
        if (!file_exists($pagecache_stamp)) {
            @mkdir(dirname($pagecache_stamp), 0777, true);
            @touch($pagecache_stamp);
        }
        $cache_dir = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/cache';
        if (!file_exists($cache_dir)) {
            @mkdir($cache_dir, 0777, true);
        }

        add_option('pagespeedninja_config', array());
        /** @var array $config */
        $config = get_option('pagespeedninja_config');
        if (!is_array($config)) {
            $config = array();
        }

        if (!isset($config['afterinstall_popup'])) {
            $config['afterinstall_popup'] = isset($config['version']) ? '1' : '0';
            if (!isset($config['version']) && isset($_REQUEST['plugin']) && $_REQUEST['plugin'] === "{$plugin_slug}/{$plugin_name}.php") {
                set_transient('pagespeedninja_activated', time(), 60);
            }
        }

        // special updating routines
        if (isset($config['version'])) {
            $prev_version = $config['version'];
            $updates_dir = __DIR__ . '/updates';
            $updates = scandir($updates_dir, SCANDIR_SORT_NONE);
            usort($updates, 'version_compare');
            foreach ($updates as $file) {
                if ($file[0] !== '.' && version_compare(str_replace('.php', '', $file), $prev_version, '>')) {
                    include $updates_dir . '/' . $file;
                }
            }
        }

        $config['version'] = $version;

        if (!isset($config['staticdir'])) {
            $config['staticdir'] = '/s';
        }

        // create /s directory
        $staticDir = rtrim(ABSPATH, '/') . $config['staticdir'];
        if (!is_dir($staticDir) && !@mkdir($staticDir, 0755, true) && !is_dir($staticDir)) {
            trigger_error('PageSpeed Ninja: cannot create directory ' . var_export($staticDir, true));
        }

        if (!isset($config['distribmode'])) {
            $config['distribmode'] = 'php';
            if (self::isApache()) {
                // Apache
                $config['distribmode'] = self::suggestedDistribMode($config['staticdir']);
                if (!isset($config['htaccess_gzip'])) {
                    $config['htaccess_gzip'] = '1';
                }
                if (!isset($config['htaccess_caching'])) {
                    $config['htaccess_caching'] = '1';
                }
            }
        }

        if (!isset($config['exec_mode'])) {
            $config['exec_mode'] = 'exec';
            $disable_functions = ini_get('disable_functions');
            $disable_functions = ($disable_functions === false) ? array() : explode(',', $disable_functions);
            if (function_exists('proc_open') && !in_array('proc_open', $disable_functions, true)) {
                $exec_mode = 'procopen';
            } elseif (function_exists('popen') && !in_array('popen', $disable_functions, true)) {
                $exec_mode = 'popen';
            }
        }
//        if (!isset($config['caching'])) {
//            $config['caching'] = !(defined('WP_CACHE') && WP_CACHE);
//            if ($config['caching']) {
//                $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
//                if (in_array('woocommerce/woocommerce.php', $active_plugins, true)) {
//                    $config['caching'] = '0';
//                }
//            }
//        }

        /** @var array $options */
        $options = file_get_contents(__DIR__ . '/options.json.php');
        $options = str_replace("\\'", "'", $options);
        $options = json_decode($options);

        foreach ($options as $section) {
            if (isset($section->id)) {
                $name = 'psi_' . $section->id;
                if (!isset($config[$name])) {
                    $config[$name] = '0';
                }
            }
            if (isset($section->items)) {
                /** @var array {$section->items} */
                foreach ($section->items as $item) {
                    if (isset($item->name, $item->default) && !isset($config[$item->name])) {
                        $config[$item->name] = (string)$item->default;
                    }
                }
            }
        }

        update_option('pagespeedninja_config', $config);

        if (!wp_next_scheduled('pagespeedninja_daily_event')) {
            self::schedule_next_daily_event();
        }

        self::createTables();

        if (file_exists(dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php')) {
            include_once dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php';
            PagespeedNinja_Pro_Activator::activate_site($plugin_slug, $plugin_name, $version, $config);
        }
    }

    /**
     * @return void
     */
    public static function schedule_next_daily_event()
    {
        $next_time = apply_filters('psn_next_daily_event', strtotime('tomorrow'));
        wp_schedule_single_event($next_time, 'pagespeedninja_daily_event');
    }

    /**
     * @param string $plugin_slug
     * @param string $plugin_name
     * @param string $version
     */
    public static function deactivate_site($plugin_slug, $plugin_name, $version) {
        $file = ABSPATH . 'wp-config.php';
        if (!file_exists($file)) {
            $file = dirname(ABSPATH) . '/wp-config.php';
        }

        wp_clear_scheduled_hook('pagespeedninja_daily_event');

        if (!is_multisite()) {
            // reset WP_CACHE to avoid errors
            $config = file_get_contents($file);
            $regex = '/^\s*define\s*\(\s*[\'"]WP_CACHE[\'"]\s*,[^)]+\)\s*;\s*(?:\/\/.*?)?(?>\r\n|\n|\r)/m';
            if (preg_match($regex, $config)) {
                $config = preg_replace($regex, '', $config);
                @file_put_contents($file, $config, LOCK_EX);
            }
        }

        if (file_exists(dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php')) {
            include_once dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php';
            PagespeedNinja_Pro_Activator::deactivate_site($plugin_slug, $plugin_name, $version);
        }
    }

    /**
     * @param string $plugin_slug
     * @param string $plugin_name
     * @param string $version
     * @throws ERessio_Exception
     * @throws ERessio_UnknownDiKey
     */
    public static function activate_network($plugin_slug, $plugin_name, $version) {
        add_site_option('pagespeedninja_config', array());
        /** @var array $config */
        $config = get_site_option('pagespeedninja_config');
        if (!is_array($config)) {
            $config = array();
        }

        $config['version'] = $version;

        if (!isset($config['distribmode'])) {
            $config['distribmode'] = 'php';
            if (self::isApache()) {
                // Apache
                $config['distribmode'] = self::suggestedDistribMode($config['staticdir']);
                if (!isset($config['htaccess_gzip'])) {
                    $config['htaccess_gzip'] = '1';
                }
                if (!isset($config['htaccess_caching'])) {
                    $config['htaccess_caching'] = '1';
                }
            }
        }
//        if (!isset($config['caching'])) {
//            $config['caching'] = !(defined('WP_CACHE') && WP_CACHE);
//            if ($config['caching']) {
//                $active_plugins = apply_filters('active_plugins', get_option('active_plugins'));
//                if (in_array('woocommerce/woocommerce.php', $active_plugins, true)) {
//                    $config['caching'] = '0';
//                }
//            }
//        }

        /** @var array $options */
        $options = file_get_contents(__DIR__ . '/options.json.php');
        $options = str_replace('\\\'', '\'', $options);
        $options = json_decode($options);

        foreach ($options as $section) {
            if (isset($section->items)) {
                /** @var array {$section->items} */
                foreach ($section->items as $item) {
                    if (isset($item->name, $item->global) && $item->global && !isset($config[$item->name])) {
                        $config[$item->name] = (string)$item->default;
                    }
                }
            }
        }

        update_site_option('pagespeedninja_config', $config);

        if (file_exists(dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php')) {
            include_once dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php';
            PagespeedNinja_Pro_Activator::activate_network($plugin_slug, $plugin_name, $version);
        }
    }

    /**
     * @param string $plugin_slug
     * @param string $plugin_name
     * @param string $version
     */
    public static function deactivate_network($plugin_slug, $plugin_name, $version) {
        // do nothing

        if (file_exists(dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php')) {
            include_once dirname(__DIR__) . '/pro/class-pagespeedninja-pro-activator.php';
            PagespeedNinja_Pro_Activator::deactivate_network($plugin_slug, $plugin_name, $version);
        }
    }

    /**
     * @param int $status (1-activate, 2-deactivate)
     * @param string $version
     */
    public static function ping($status, $version)
    {
        global $wp_version;
        // activate/deactivate domain name in getcss service
        $data = array(
            's' => $status,
            'v' => $version,
            'wp' => $wp_version,
            'host' => get_option('siteurl')
        );

        include_once ABSPATH . 'wp-admin/includes/admin.php';
        wp_remote_get('https://pagespeed.ninja/api/update', array('body' => $data));
    }

    /**
     * @return bool
     */
    private static function isApache()
    {
        return isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Apache') !== false;
    }

    /**
     * @param string $staticdir
     * @return string
     */
    private static function suggestedDistribMode($staticdir)
    {
        if (function_exists('apache_get_modules')) {
            // Apache module
            $apache_modules = apache_get_modules();
            if (in_array('mod_rewrite', $apache_modules, true)) {
                if (in_array('mod_mime', $apache_modules, true) && in_array('mod_headers', $apache_modules, true)) {
                    return 'apache';
                }
                return 'rewrite';
            }
        } else {
            // FastCGI
            $testurl = plugins_url('assets/apachetest/a.htm', __DIR__);
            $tmp_filename = download_url( $testurl, 5 );
            if (is_string($tmp_filename)) {
                $check = @file_get_contents($tmp_filename);
                @unlink($tmp_filename);
                switch ($check) {
                    case 'B':
                        return 'rewrite';
                    case 'C':
                        return 'apache';
                    default:
                        break;
                }
            }
        }

        // check PHP is enabled in the $staticdir directory
        $testFile = rtrim(ABSPATH, '/') . $staticdir . '/test.php';
        @file_put_contents($testFile, '<?php echo "1";', LOCK_EX);
        $tmp_filename = download_url(home_url() . $staticdir . '/test.php', 5);
        @unlink($testFile);
        if (is_string($tmp_filename)) {
            $check = @file_get_contents($tmp_filename);
            @unlink($tmp_filename);
            if ($check === '1') {
                return 'php';
            }
        }

        return 'direct';
    }

    private static function createTables()
    {
        global $wpdb;

        $table_name = $wpdb->prefix . 'psninja_urls';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
          `url` varchar(4096) NOT NULL,
          `hash` binary(20) NOT NULL,
          `time` datetime NOT NULL,
          `type` tinyint NOT NULL,
          PRIMARY KEY(`hash`)
        ) $charset_collate;";

        $wpdb->query($sql);
    }
}
