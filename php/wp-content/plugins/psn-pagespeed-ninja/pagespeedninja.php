<?php
/**
 * PageSpeed Ninja
 *
 * @link              http://pagespeed.ninja
 * @wordpress-plugin
 * Plugin Name:       PageSpeed Ninja
 * Plugin URI:        https://wordpress.org/plugins/psn-pagespeed-ninja/
 * Description:       The quickest and most advanced performance plugin. Make your site super fast and fix PageSpeed issues with just one click!
 * Version:           1.1.1
 * Requires at least: 4.6
 * Requires PHP:      5.6
 * Author:            PageSpeed Ninja
 * Author URI:        https://pagespeed.ninja/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       psn-pagespeed-ninja
 * Network:           true
 */

defined('WPINC') || die;

function run_pagespeedninja()
{
    // optional error logging
    include_once __DIR__ . '/includes/class-pagespeedninja-errorlogging.php';
    PagespeedNinja_ErrorLogging::init();

    require __DIR__ . '/includes/class-pagespeedninja.php';
    $plugin_name = basename(__FILE__, '.php');
    $plugin_slug = basename(__DIR__);
    $plugin = new PagespeedNinja($plugin_slug, $plugin_name);

    register_activation_hook(__FILE__, array($plugin, 'activate'));
    register_deactivation_hook(__FILE__, array($plugin, 'deactivate'));

    $plugin->run();
}

run_pagespeedninja();
