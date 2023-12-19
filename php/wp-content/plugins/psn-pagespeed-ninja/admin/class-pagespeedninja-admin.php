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

class PagespeedNinja_Admin
{
    /** @var string The slug of this plugin. */
    private $plugin_slug;

    /** @var string The ID of this plugin. */
    private $plugin_name;

    /** @var string The current version of this plugin. */
    private $version;

    /** @var array */
    protected $messages = array();

    /** @var string The menu slug of the General settings page. */
    protected $page_general_slug;

    /** @var string The menu slug of the Advanced settings page. */
    protected $page_advanced_slug;

    /** @var string The menu slug of the Global settings page. */
    protected $page_global_slug;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_slug The slug of this plugin.
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     */
    public function __construct($plugin_slug, $plugin_name, $version)
    {
        $this->plugin_slug = $plugin_slug;
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        $this->page_general_slug = $plugin_name;
        $this->page_advanced_slug = "{$plugin_name}_advanced";
        $this->page_global_slug = "{$plugin_name}_global";
    }

    /**
     * @return string
     */
    public function get_version()
    {
        return $this->version;
    }

    /** @return void */
    public function admin_init()
    {
        // redirect from old URL (e.g. if bookmarked)
        global $parent_file, $plugin_page;
        if ($parent_file === 'options-general.php' && $plugin_page === 'pagespeedninja') {
            wp_redirect(admin_url('admin.php?page=' . $this->page_general_slug));
        }

        // redirect to post-install settings
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && get_transient('pagespeedninja_activated') !== false) {
            delete_transient('pagespeedninja_activated');
            wp_redirect(admin_url('admin.php?page=' . $this->page_general_slug));
        }

        register_setting('pagespeedninja_config', 'pagespeedninja_config');

        wp_register_style('pagespeedninja_style', plugins_url('/assets/css/pagespeedninja.css', __DIR__),
            array(), $this->version);
        wp_register_style('pagespeedninja_popup_style', plugins_url('/assets/css/pagespeedninja-popup.css', __DIR__),
            array('pagespeedninja_style'), $this->version);
        wp_register_style('pagespeedninja_email_style', plugins_url('/assets/css/pagespeedninja-email.css', __DIR__),
            array('pagespeedninja_style'), $this->version);

        wp_register_script('pagespeedninja_areyousure_script', plugins_url('/assets/js/jquery.are-you-sure.js', __DIR__),
            array('jquery'), $this->version, true);
        wp_register_script('pagespeedninja_atfbundle_script', plugins_url('/assets/js/atfbundle.js', __DIR__),
            array(), $this->version, true);
        wp_register_script('pagespeedninja_script', plugins_url('/assets/js/pagespeedninja.js', __DIR__),
            array('jquery', 'pagespeedninja_areyousure_script', 'pagespeedninja_atfbundle_script'), $this->version, true);
        wp_register_script('pagespeedninja_general_script', plugins_url('/assets/js/pagespeedninja-general.js', __DIR__),
            array('jquery', 'pagespeedninja_script'), $this->version, true);
        wp_register_script('pagespeedninja_advanced_script', plugins_url('/assets/js/pagespeedninja-advanced.js', __DIR__),
            array('jquery', 'pagespeedninja_script'), $this->version, true);
        wp_register_script('pagespeedninja_tooltip_script', plugins_url('/assets/js/pagespeedninja-tooltip.js', __DIR__),
            array('jquery', 'pagespeedninja_script'), $this->version, true);
    }

    /** @return void */
    public function admin_menu()
    {
        $menu_ico = file_get_contents(dirname(__DIR__) . '/assets/image/pagespeed-ninja-logo.svg');

        $hook = add_menu_page(
            __('PageSpeed Ninja Options', 'psn-pagespeed-ninja'),
            __('PageSpeed Ninja', 'psn-pagespeed-ninja'),
            'manage_options',
            $this->page_general_slug,
            array($this, 'pagespeedninja_options'),
            'data:image/svg+xml;base64,' . base64_encode($menu_ico),
            100
        );
        if ($hook) {
            add_action('admin_print_styles-' . $hook, array($this, 'admin_styles'));
            add_action('admin_print_scripts-' . $hook, array($this, 'admin_scripts'));
        }

        add_submenu_page(
            $this->page_general_slug,
            __('PageSpeed Ninja Options', 'psn-pagespeed-ninja'),
            __('General', 'psn-pagespeed-ninja'),
            'manage_options',
            $this->page_general_slug
        );

        $hook = add_submenu_page(
            $this->page_general_slug,
            __('PageSpeed Ninja Advanced Options', 'psn-pagespeed-ninja'),
            __('Advanced', 'psn-pagespeed-ninja'),
            'manage_options',
            $this->page_advanced_slug,
            array($this, 'pagespeedninja_options')
        );
        if ($hook) {
            add_action('admin_print_styles-' . $hook, array($this, 'admin_styles'));
            add_action('admin_print_scripts-' . $hook, array($this, 'admin_scripts'));
        }

        $this->add_promo_link($this->page_general_slug);
    }

    /** @return void */
    public function network_admin_menu()
    {
        $menu_ico = file_get_contents(dirname(__DIR__) . '/assets/image/pagespeed-ninja-logo.svg');

        $hook = add_menu_page(
            __('PageSpeed Ninja Options', 'psn-pagespeed-ninja'),
            __('PageSpeed Ninja', 'psn-pagespeed-ninja'),
            'manage_options',
            $this->page_global_slug,
            array($this, 'pagespeedninja_options'),
            'data:image/svg+xml;base64,' . base64_encode($menu_ico),
            100
        );
        if ($hook) {
            add_action('admin_print_styles-' . $hook, array($this, 'admin_styles'));
            add_action('admin_print_scripts-' . $hook, array($this, 'admin_scripts'));
            add_action('load-' . $hook, array($this, 'load_global_page'));
        }

        add_submenu_page(
            $this->page_global_slug,
            __('PageSpeed Ninja Options', 'psn-pagespeed-ninja'),
            __('Global Settings', 'psn-pagespeed-ninja'),
            'manage_options',
            $this->page_global_slug
        );

        $this->add_promo_link($this->page_global_slug);
    }

    /** @return void */
    private function add_promo_link($parent_slug)
    {
        if (!apply_filters('psn_is_pro', false)) {
            $url = 'https://pagespeed.ninja/download/?utm_source=psnbackend&amp;utm_medium=Menu-upgrade&amp;utm_campaign=Admin-upgrade';
            add_submenu_page(
                $parent_slug,
                '',
                '<span style="color:#fffb00;background-color:#2c3338;display:inline-block;width:100%" onclick="window.open(\'' . $url . '\', \'_blank\').focus();">' . __('Upgrade to Pro') . '</span>',
                'manage_options',
                'javascript:void(0)'
            );
        }
    }

    /** @return void */
    public function admin_head()
    {
        add_action('admin_notices', array($this, 'activation_admin_notices'));

        if (!apply_filters('psn_is_pro', false)) {
            add_action('admin_notices', array($this, 'admin_notices_licensekey_2023nov15'));
            add_action('network_admin_notices', array($this, 'admin_notices_licensekey_2023nov15'));
        }

        global $pagenow;
        if ($pagenow === 'plugins.php') {
            add_thickbox();
            add_action('admin_footer-plugins.php', array($this, 'admin_footer_survey_popup'));
        }

        global $parent_file;
        if (!isset($parent_file) || $parent_file !== $this->plugin_name) {
            return;
        }

        add_action('admin_notices', array($this, 'admin_notices_email_popup'), -1);
        add_action('network_admin_notices', array($this, 'admin_notices_email_popup'), -1);

        add_action('admin_notices', array($this, 'admin_notices'));
        add_action('network_admin_notices', array($this, 'admin_notices'));

        add_action('admin_footer', array($this, 'admin_footer_print_messages'));

        $config = get_option('pagespeedninja_config');

        if (defined('WP_CACHE') && WP_CACHE) {
            // Check caching-related conflicts
            //$active_plugins = apply_filters('active_plugins', get_option('active_plugins'));

            if (!($config['psi_server-response-time'] && $config['caching'])) {
                $this->enqueueMessage(__('Note that some PageSpeed Ninja features (e.g. "Remove IE conditionals") may not be compatible with caching plugin'));
            }
        }

        $logFilename = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'error_log.php';
        if (is_file($logFilename)) {
            $logSize = filesize($logFilename);
            if ($logSize > 10 * 1024 * 1024) {
                $logSize = number_format($logSize / (1024 * 1024), 1, '.', '');
                $this->enqueueMessage(sprintf(__('Size of %1$s file is %2$sMb.'), $logFilename, $logSize));
            }
        }
    }

    /** @return void */
    public function admin_footer_survey_popup()
    {
        if (current_user_can('delete_plugins')) {
            include __DIR__ . '/partials/pagespeedninja-survey-form.php';
        }
    }

    /** @return void */
    public function admin_styles()
    {
        wp_enqueue_style('pagespeedninja_google_fonts', '//fonts.googleapis.com/css?family=Montserrat:300,400,600&display=swap', array(), null);
        wp_enqueue_style('pagespeedninja_style');

        $config = get_option('pagespeedninja_config');
        if (!is_network_admin() && $config['afterinstall_popup'] !== '1') {
            wp_enqueue_style('pagespeedninja_popup_style');
        } else {
            wp_enqueue_style('pagespeedninja_email_style');
        }
    }

    /** @return void */
    public function admin_scripts()
    {
        $cache_dir = WP_CONTENT_DIR . '/uploads/psn-pagespeed-ninja/pagecache';
        $cache_timestamp = @filemtime($cache_dir . '/tags/GLOBAL');
        $config = get_option('pagespeedninja_config');

        wp_enqueue_script('pagespeedninja_atfbundle_script');
        wp_enqueue_script('pagespeedninja_areyousure_script');
        wp_enqueue_script('pagespeedninja_script');
        wp_enqueue_script('pagespeedninja_tooltip_script');
        add_thickbox();

        if ($config['afterinstall_popup'] === '1') {
            global $plugin_page;
            switch ($plugin_page) {
                case $this->page_general_slug:
                    wp_enqueue_script('pagespeedninja_general_script');
                    wp_add_inline_script('pagespeedninja_script', 'var psn_cache_timestamp=' . (int)$cache_timestamp . ';');
                    break;
                case $this->page_advanced_slug:
                case $this->page_global_slug:
                    wp_enqueue_script('pagespeedninja_advanced_script');
                    break;
            }
        }

        do_action('psn_admin_scripts');
    }

    /**
     * @param array $links
     * @return array
     */
    public function admin_plugin_settings_link($links)
    {
        $settings_link =
            '<a href="' . esc_url(admin_url('admin.php?page=' . $this->page_general_slug)) . '">'
            . __('Settings')
            . '</a>';
        array_unshift($links, $settings_link);

        return $links;
    }

    /**
     * @param array $links
     * @return array
     */
    public function network_admin_plugin_settings_link($links)
    {
        $settings_link =
            '<a href="' . esc_url(network_admin_url('admin.php?page=' . $this->page_global_slug)) . '">'
            . __('Settings')
            . '</a>';
        array_unshift($links, $settings_link);

        return $links;
    }

    /**
     * @param array $links
     * @param string $file
     * @return array
     */
    public function admin_plugin_meta_links($links, $file)
    {
        if ($file === "{$this->plugin_slug}/{$this->plugin_name}.php") {
            $extra_links = array(
                array(
                    'icon' => 'editor-help', 'color' => '#00a0d2',
                    'url' => 'https://wordpress.org/support/plugin/psn-pagespeed-ninja',
                    'text' => __('Support')
                ),
                array(
                    'icon' => 'facebook', 'color' => '#3b5998',
                    'url' => 'https://www.facebook.com/groups/240066356467297/',
                    'text' => __('Get tips')
                ),
                array(
                    'icon' => 'star-filled', 'color' => '#ffb900',
                    'url' => 'https://wordpress.org/support/plugin/psn-pagespeed-ninja/reviews/?rate=5#new-post',
                    'text' => __('Review')
                )
            );
            if (!apply_filters('psn_is_pro', false)) {
                $extra_links[] = array(
                    'icon' => 'superhero', 'color' => '#f53a59',
                    'url' => 'https://pagespeed.ninja/download/?utm_source=psnbackend&amp;utm_medium=Plugins-page-upgrade&amp;utm_campaign=Admin-upgrade',
                    'text' => __('Upgrade to Pro')
                );
            }
            foreach ($extra_links as $extra_link) {
                $links[] = sprintf('<a target="_blank" href="%s" class="no-break"><span class="dashicons dashicons-%s" style="color:%s"></span> %s</a>',
                    $extra_link['url'], $extra_link['icon'], $extra_link['color'], $extra_link['text']);
            }
        }
        return $links;
    }

    /** @return void */
    public function pagespeedninja_options()
    {
        include_once __DIR__ . '/class-pagespeedninja-view.php';
        $view = new PagespeedNinja_View($this);

        if (is_network_admin()) {
            $config = get_site_option('pagespeedninja_config');
            $view->load('admin-global', $config);
            return;
        }

        $config = get_option('pagespeedninja_config');

        if ($config['afterinstall_popup'] !== '1') {
            $view->load('admin-popup', $config);
            return;
        }

        global $plugin_page;
        switch ($plugin_page) {
            case $this->page_general_slug:
                $view->load('admin-general', $config);
                break;
            case $this->page_advanced_slug:
                $view->load('admin-advanced', $config);
                break;
        }
    }

    /** @return void */
    public function activation_admin_notices()
    {
        global $parent_file;
        if ($parent_file === $this->plugin_name) {
            return;
        }

        $options = get_option('pagespeedninja_config');
        if (is_network_admin() || $options['afterinstall_popup'] === '1') {
            return;
        }

        $message = sprintf(
            __('To initialize PageSpeed Ninja, open its <a href="%s">Settings page</a>.'),
            esc_url(admin_url('admin.php?page=' . $this->page_general_slug))
        );
        echo '<div class="notice notice-alt notice-warning is-dismissible">' .
            '<p><b>' . $message . '</b></p>' .
            '</div>';
    }

    /** @return void */
    public function admin_notices_licensekey_2023nov15()
    {
        $config = get_site_option('pagespeedninja_config');
        if (!empty($config['apikey']) || get_transient('dismiss_licensekey_2023nov15')) {
            return;
        }
?>
<script>
jQuery(document).ready(function ($) {setTimeout(function () {
    $('.psn-licensekey-2023nov15-notice .notice-dismiss').on('click keydown', function (e) {
        if (e.type === 'keydown' && e.which !== 13) {
            return;
        }
        e.preventDefault();
        e.stopPropagation();
        $('.psn-licensekey-2023nov15-notice').remove();
        $.post(ajaxurl, {action: 'pagespeedninja_dismiss_licensekey_2023nov15_notice'});
    });
})});
</script>
<div class="psn-licensekey-2023nov15-notice notice notice-alt notice-info is-dismissible">
    <p>
        <b><?php _e('Please activate your free license key for PageSpeed Ninja', 'psn-pagespeed-ninja'); ?></b><br>
        <?php _e('A free license key is required to access all of PageSpeed Ninja features. The license key is free and helps support our development efforts. Please click the button below to grab your complimentary key to avoid any interruption in the functionality of the plugin. We appreciate you taking this quick step!', 'psn-pagespeed-ninja'); ?><br>
        <a href="https://pagespeed.ninja/download/?utm_source=psnbackend&amp;utm_medium=15NovNotice&utm_campaign=Admin-upgrade" target="_blank"><?php _e('Get your free license key', 'psn-pagespeed-ninja'); ?></a>
    </p>
</div>
<?php
    }

    /** @return void */
    public function admin_notices_email_popup()
    {
        global $plugin_page;
        switch ($plugin_page) {
            case $this->page_general_slug:
            case $this->page_advanced_slug:
                $config = get_site_option('pagespeedninja_config');
                if (isset($config['afterinstall_popup']) && $config['afterinstall_popup'] === '1') {
                    include_once __DIR__ . '/class-pagespeedninja-view.php';
                    $view = new PagespeedNinja_View($this);
                    $view->load('admin-emailform', $config);
                }
                break;
        }
    }

    /** @return void */
    public function admin_notices()
    {
        foreach ($this->messages as $message) {
            echo '<div class="notice notice-alt notice-warning is-dismissible">' .
                '<p>' . esc_html($message) . '</p>' .
                '</div>';
        }
        $this->messages = array();

        global $plugin_page;
        if ($plugin_page === $this->page_general_slug) {
            echo '<div class="notice notice-alt notice-info is-dismissible hidden" id="pagespeedninja_atfcss_notice">' .
                '<p>' . esc_html(__('Critical CSS styles have been generated. Save changes to apply. You can view and edit generated styles in Advanced settings page.')) . '</p>' .
                '</div>';
        }
        echo '<div class="is-dismissible hidden" id="pagespeedninja_afternotices"></div>';
    }

    /** @return void */
    public function admin_footer_print_messages()
    {
        if (count($this->messages) === 0) {
            return;
        }
        $html = '';
        foreach ($this->messages as $message) {
            $html .= '<div class="notice notice-alt notice-warning is-dismissible">' .
                '<p>' . esc_html($message) . '</p>' .
                '</div>';
        }
        ?>
        <script>jQuery('#pagespeedninja_afternotices').after('<?php echo addcslashes($html, "'"); ?>');</script><?php
        $this->messages = array();
    }

    /**
     * @param string $message
     */
    public function enqueueMessage($message)
    {
        $this->messages[] = $message;
    }

    /** @return void */
    public function load_global_page()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (!isset($_POST['action']) || $_POST['action'] !== 'update') {
            return;
        }

        if (check_admin_referer('pagespeedninja_config') === false) {
            wp_die();
            exit;
        }

        if (!current_user_can('manage_network_options')) {
            wp_die();
            exit;
        }

        if (isset($_POST['pagespeedninja_config'])) {
            $config = $_POST['pagespeedninja_config'];
            $config = wp_unslash($config);
            update_site_option('pagespeedninja_config', $config);

            foreach (get_sites() as $site) {
                // re-save to merge with global config
                switch_to_blog($site->blog_id);
                $config = get_option('pagespeedninja_config');
                update_option('pagespeedninja_config', $config);
                restore_current_blog();
            }
        }

        add_settings_error('general', 'settings_updated', __('Settings saved.'), 'success');
        wp_redirect(add_query_arg('settings-updated', 'true', wp_get_referer()));
        exit;
    }
}
