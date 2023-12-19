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

class PagespeedNinja_View
{
    /** @var PagespeedNinja_Admin */
    private $admin;

    /**
     * PagespeedNinja_View constructor.
     * @param PagespeedNinja_Admin $admin
     */
    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @param string $template
     * @param array $config
     */
    public function load($template, $config)
    {
        include_once __DIR__ . '/partials/pagespeedninja-' . $template . '.php';
    }

    /**
     * @param string $message
     */
    protected function enqueueMessage($message)
    {
        $this->admin->enqueueMessage($message);
    }

    /**
     * @param string $title
     * @param string $tooltip
     */
    public function title($title, $tooltip = '')
    {
        static $tabindex = 0;
        $tabindex++;
        echo '<div tabindex="' . $tabindex . '" class="title"';
        if ($tooltip !== '') {
            echo ' data-tooltip="' . esc_attr($tooltip) . '"';
        }
        echo '>' . $title . '</div>';
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $class
     * @param string $enabledValue
     * @param string $disabledValue
     * @param bool $disabled
     */
    public function checkbox($id, $name, $value = '0', $class = '', $enabledValue = '1', $disabledValue = '0', $disabled = false)
    {
        echo '<input type="hidden"' . ($name ? " name=\"$name\"" : '') . " value=\"$disabledValue\" />"
            . '<input type="checkbox"' . ($name ? " name=\"$name\"" : '') . " id=\"$id\" value=\"$enabledValue\" "
            . ((string)$value === $enabledValue ? 'checked="checked" ' : '')
            . ($class === '' ? '' : "class=\"$class\" ")
            . ($disabled ? ' disabled="disabled"' : '')
            . '/>'
            . "<label for=\"$id\"></label>";
    }

    /**
     * @param array|stdClass $items
     * @return array
     */
    protected function toList($items)
    {
        $result = array();
        foreach ($items as $item) {
            // a trick to get name and value of first object property
            $item = (array)$item;
            $result[key($item)] = current($item);
        }
        return $result;
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param array $values
     * @param string $class
     */
    public function select($id, $name, $value, $values, $class = '')
    {
        foreach ($values as $key => $title) {
            echo '<label>'
                . "<input type=\"radio\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"" . esc_attr($key) . '" '
                . ((is_string($key) && $key !== '' && $key[0] === '$') ? 'disabled ' : '')
                . ($value === (string)$key ? 'checked ' : '')
                . ($class === '' ? '' : "class=\"$class\" ")
                . '/>'
                . esc_html($title)
                . '</label>';
        }
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param array $values
     * @param string $class
     */
    public function selectlist($id, $name, $value, $values, $class = '')
    {
        echo "<select id=\"$id\" ".($name ? " name=\"$name\"" : '').">";
        foreach ($values as $key => $title) {
            echo "<option value=\"" . esc_attr($key) . '" '
                . ((is_string($key) && $key !== '' && $key[0] === '$') ? 'disabled ' : '')
                . ($value === (string)$key ? 'selected ' : '')
                . ($class === '' ? '' : "class=\"$class\" ")
                . '/>'
                . esc_html($title)
                . '</option>';
        }
        echo '</select>';
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $class
     * @param int $rows
     * @param int $cols
     */
    public function textarea($id, $name, $value, $class = '', $rows = 5, $cols = 80)
    {
        echo "<textarea id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " rows=\"$rows\" cols=\"$cols\""
            . ($class === '' ? '' : "class=\"$class\" ")
            . '>'
            . esc_textarea($value)
            . '</textarea>';
    }

    /**
     * @param string $id
     * @param string $name
     * @param int $value
     * @param string $class
     */
    public function number($id, $name, $value, $class = '')
    {
        echo "<input type=\"number\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"$value\" "
            . ($class === '' ? '' : "class=\"$class\" ")
            . '/>';
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $class
     */
    public function text($id, $name, $value, $class = '')
    {
        echo "<input type=\"text\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"" . esc_attr($value) . '" '
            . ($class === '' ? '' : "class=\"$class\" ")
            . '/>';
    }

    /**
     * @param string $id
     * @param string $name
     * @param string $value
     * @param string $class
     */
    public function time($id, $name, $value, $class = '')
    {
        echo "<input type=\"time\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"" . esc_attr($value) . '" '
            . ($class === '' ? '' : "class=\"$class\" ")
            . '/>';
    }

    /**
     * @param array $config
     * @param string $param
     */
    public function hidden($config, $param)
    {
        $id = 'pagespeedninja_config_' . $param;
        $name = 'pagespeedninja_config[' . $param . ']';
        if (!isset($config[$param])) {
            $this->enqueueMessage(sprintf(__('Configuration field doesn\'t exist: %s'), $param));
        }
        $value = $config[$param];
        echo "<input type=\"hidden\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"" . esc_attr($value) . '" />';
    }

    /**
     * @param string $type
     * @param string $param
     * @param array $config
     * @param stdClass $item
     */
    public function render($type, $param, $config, $item = null)
    {
        if (strncmp($param, 'do_', 3) === 0 || $param === '') {
            // create dummy value
            $config[$param] = false;
        }

        if (!isset($config[$param])) {
            $this->enqueueMessage(sprintf(__('Configuration field doesn\'t exist: %s'), $param));
            //return;
        }

        $id = 'pagespeedninja_config_' . $param;
        $name = isset($item->pro) ? null : 'pagespeedninja_config[' . $param . ']';
        $value = isset($config[$param]) ? $config[$param] : '';

        switch ($type) {
            case 'checkbox':
                ?>
                <div class="field"><?php
                $this->checkbox($id, $name, $value, isset($item->class) ? $item->class : '');
                ?></div><?php
                break;
            case 'cachingcheckbox':
                ?>
                <div class="field"><?php
                $disabled = ($value === '0' && defined('WP_CACHE') && WP_CACHE);
                $this->checkbox($id, $name, $value, '', '1', '0', $disabled);
                ?></div><?php
                break;
            case 'select':
                ?>
                <div class="field"><?php
                $values = $this->toList($item->values);
                if (!isset($values[$value])) {
                    $value = $item->default;
                }
                $this->select($id, $name, $value, $values, isset($item->class) ? $item->class : null);
                ?></div><?php
                break;
            case 'selectlist':
                ?>
                <div class="field"><?php
                $values = $this->toList($item->values);
                if (!isset($values[$value])) {
                    $value = $item->default;
                }
                $this->selectlist($id, $name, $value, $values, isset($item->class) ? $item->class : null);
                ?></div><?php
                break;
            case 'text':
                ?>
                <div class="field"><?php
                $this->text($id, $name, $value);
                ?></div><?php
                break;
            case 'time':
                ?>
                <div class="field"><?php
                $this->time($id, $name, $value);
                ?></div><?php
                break;
            case 'number':
                ?>
                <div class="field"><?php
                $this->number($id, $name, (int)$value, 'small-text');
                if (isset($item->units)) {
                    echo $item->units;
                }
                ?></div><?php
                break;
            case 'textarea':
                ?>
                <div class="field fullline"><?php
                $this->textarea($id, $name, $value);
                ?></div><?php
                break;
            case 'errorlogging':
                ?>
                <div class="field"><?php
                $this->checkbox($id, $name, $value);
                ?></div><?php
                $logFilename = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'error_log.php';
                ?>
                <div class="field fullline"><?php
                echo __('Log file:') . " <span class=\"filename\">$logFilename</span> " . (is_file($logFilename) ? sprintf(__('(%d bytes)'), filesize($logFilename)) : '');
                ?></div><?php
                break;
            case 'apikey':
                ?>
                <div class="field fullline">
                    <?php $this->text($id, $name, $value); ?>
                    <a id="do_subscription_getapikey" href="https://pagespeed.ninja/download/?utm_source=psnbackend-apikey&amp;utm_medium=Advanced-tab-upgrade&amp;utm_campaign=Admin-upgrade" target="_blank">Get License Key</a>
                </div><?php
                break;
            case 'do_subscription':
                ?>
                <div class="field">
                    <div class="do_subscription">
                        <span class="loading" id="do_subscription_title"></span>
                        <a class="button" id="do_subscription_upgrade" href="https://pagespeed.ninja/download/?utm_source=psnbackend-subscription&amp;utm_medium=Advanced-tab-upgrade&amp;utm_campaign=Admin-upgrade" target="_blank">Upgrade</a>
                        <br>
                        <?php printf(__('%s request(s)/week'), '<span id="do_subscription_limit">?</span>'); ?>
                    </div>
                </div><?php
                break;
            case 'do_backup':
                ?>
                <div class="field">
                    <a id="do_backup_create" href="<?php echo esc_url(wp_nonce_url(admin_url('admin-post.php?action=psn_backup_backup'), 'psn_backup_backup')); ?>" target="_blank" class="button"><?php _e('Backup'); ?></a>
                </div>
                <?php
                break;
            case 'do_restore':
                ?>
                <div class="field">
                    <input type="file" accept="application/json" name="backupfile" id="backupfile">
                    <a id="do_backup_restore" href="#" class="button disabled"><?php _e('Upload & Restore'); ?></a>
                </div>
                <?php
                break;
            case 'abovethefoldstyle':
                ?>
                <div class="field fullline"><?php
                $this->textarea($id, $name, $value, 'large-text');
                ?><br><a href="#" class="button"
                         onclick="autoGenerateATF('pagespeedninja_config_<?php echo $item->name; ?>', document.getElementById('pagespeedninja_config_css_abovethefoldlocal').checked);return false;"><?php
                _e('&#x2191; Generate Critical CSS styles');
                ?></a></div><?php
                break;
            case 'imgdriver':
                ?>
                <div class="field"><?php
                $values = $this->toList($item->values);
                if (!isset($values[$value])) {
                    $value = $item->default;
                }
                foreach ($this->toList($item->values) as $key => $title) {
                    $disabled = false;
                    if ($key === 'imagick' && !extension_loaded('imagick')) {
                        $disabled = true;
                    }
                    echo '<label>'
                        . "<input type=\"radio\" id=\"$id\"" . ($name ? " name=\"$name\"" : '') . " value=\"" . esc_attr($key) . '" '
                        . ($value === (string)$key ? 'checked ' : '')
                        . ($disabled ? 'disabled ' : '')
                        . '/>'
                        . esc_html($title)
                        . '</label>';
                }
                ?></div><?php
                break;
            case 'do_clear_images':
                $pattern = __('%1$s in %2$s files(s).');
                $html = sprintf($pattern,
                    '<span id="psn_cachesize_image_size" class="loading"></span>',
                    '<span id="psn_cachesize_image_files" class="loading"></span>');
                ?>
                <div class="field"><?php echo $html; ?><br>
                    <input type="button" id="do_clear_images" value="<?php esc_attr_e('Remove optimized images'); ?>"/></div>
                <?php
                break;
            case 'do_clear_loaded':
                $pattern = __('%1$s in %2$s files(s).');
                $html = sprintf($pattern,
                    '<span id="psn_cachesize_loaded_size" class="loading"></span>',
                    '<span id="psn_cachesize_loaded_files" class="loading"></span>');
                ?>
                <div class="field"><?php echo $html; ?><br>
                    <input type="button" id="do_clear_loaded" value="<?php esc_attr_e('Remove files'); ?>"/></div>
                <?php
                break;
            case 'do_view_static':
                $pattern = __('%1$s in %2$s files(s).');
                $html = sprintf($pattern,
                    '<span id="psn_cachesize_static_size" class="loading"></span>',
                    '<span id="psn_cachesize_static_files" class="loading"></span>');
                ?>
                <div class="field"><?php echo $html; ?></div>
                <?php
                break;
            case 'do_clear_cache':
                $pattern = __('%1$s in %2$s files(s).');
                $html = sprintf($pattern,
                    '<span id="psn_cachesize_ress_size" class="loading"></span>',
                    '<span id="psn_cachesize_ress_files" class="loading"></span>');
                ?>
                <div class="field"><?php echo $html; ?><br>
                    <input type="button" id="do_clear_cache_expired" value="<?php esc_attr_e('Clear Expired'); ?>"/>
                    <input type="button" id="do_clear_cache_all" value="<?php esc_attr_e('Clear All'); ?>"/>
                </div>
                <?php
                break;
            case 'do_clear_pagecache':
                $pattern = __('%1$s in %2$s files(s).');
                $html = sprintf($pattern,
                    '<span id="psn_cachesize_page_size" class="loading"></span>',
                    '<span id="psn_cachesize_page_files" class="loading"></span>');
                ?>
                <div class="field"><?php echo $html; ?><br>
                    <input type="button" id="do_clear_pagecache_expired" value="<?php esc_attr_e('Clear Expired'); ?>"/>
                    <input type="button" id="do_clear_pagecache_all" value="<?php esc_attr_e('Clear All'); ?>"/>
                </div>
                <?php
                break;
            case 'do_dnsprefetch_assistant':
                ?>
                <div class="field">
                    <input disabled type="button" id="do_dnsprefetch_run" value="<?php esc_attr_e('Suggestions...'); ?>"/>
                    <input disabled type="button" id="do_dnsprefetch_clear" value="<?php esc_attr_e('Clear List'); ?>"/>
                </div>
                <?php
                break;
            case 'do_preload_assistant':
                ?>
                <div class="field">
                    <input disabled type="button" id="do_preload_run" value="<?php esc_attr_e('Suggestions...'); ?>"/>
                    <input disabled type="button" id="do_preload_clear" value="<?php esc_attr_e('Clear Lists'); ?>"/>
                </div>
                <?php
                break;
            case 'rules':
                ?><div class="field">
                    <?php $this->textarea($id, $name, $value, 'hidden'); ?>
                    <table class="rules-list" data-rules-id="<?php echo $param; ?>" data-notset-text="<?php esc_attr_e('not set'); ?>"></table>
                    <?php
                        if (preg_match('/^(?:js|css)_/', $param)) {
                            ?><a class="button" href="#" onclick="showExcludeListPopup('<?php echo $param; ?>'); return false;">
                            <?php _e('Select from list'); ?>
                            </a><?php
                        }
                    ?><a class="button" href="#" onclick="showExcludeRulesPopup('<?php echo $param; ?>'); return false;">
                    <?php _e('Edit'); ?>
                    </a>
                </div><?php
                break;
            default:
                trigger_error('PageSpeed Ninja: unknown type (' . var_export($item->type, true) . ') in config file');
        }
    }

    /**
     * @return array
     */
    protected function getUrlsList()
    {
        static $urls;
        if ($urls === null) {
            global $wpdb;
            $sql = "SELECT * FROM `{$wpdb->prefix}psninja_urls` ORDER BY `url`";
            $urls = $wpdb->get_results($sql);
        }
        return $urls;
    }

    /**
     * @param string $path
     * @return array
     */
    public function loadJsonPhp($path)
    {
        ob_start();
        include $path;
        $data = ob_get_clean();
        $data = json_decode($data);
        return $data;
    }
}