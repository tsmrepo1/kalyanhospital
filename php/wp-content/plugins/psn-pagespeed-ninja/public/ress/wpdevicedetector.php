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

class Ressio_DeviceDetector_Wordpress extends Ressio_DeviceDetector_Base implements IRessio_DIAware, IRessio_DeviceDetector
{
    /**
     * @param Ressio_DI $di
     */
    public function __construct($di)
    {
        $ua = $_SERVER['HTTP_USER_AGENT'];
        parent::__construct($ua);
    }

    public function screen_width()
    {
        return false;
    }

    public function screen_height()
    {
        return false;
    }

    public function screen_dpr()
    {
        return false;
    }

    public function browser_imgformats()
    {
        return null;
    }

    public function browser_js()
    {
        return true;
    }

    public function category()
    {
        return '';
    }

    public function isDesktop()
    {
        return true;
    }

    public function isMobile()
    {
        return false;
    }
}