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

class PagespeedNinja_i18n {
    /**@var string $domain The domain identifier for this plugin. */
    private $domain;

    public function load_plugin_textdomain()
    {
        load_plugin_textdomain($this->domain);
    }

    /**
     * @param    string $domain The domain that represents the locale of this plugin.
     */
    public function set_domain($domain)
    {
        $this->domain = $domain;
    }
}
