<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_DeviceDetector_None implements IRessio_DeviceDetector
{
    /** @return string */
    public function os()
    {
        return 'unknown';
    }

    /** @return string */
    public function os_version()
    {
        return 'unknown';
    }

    /** @return string */
    public function vendor()
    {
        return 'unknown';
    }

    /** @return string */
    public function vendor_version()
    {
        return 'unknown';
    }

    /** @return string */
    public function browser()
    {
        return 'unknown';
    }

    /** @return string */
    public function browser_version()
    {
        return 'unknown';
    }

    /** @return bool */
    public function screen_width()
    {
        return false;
    }

    /** @return bool */
    public function screen_height()
    {
        return false;
    }

    /** @return float */
    public function screen_dpr()
    {
        return 1;
    }

    /** @return array|null */
    public function browser_imgformats()
    {
        return array();
    }

    /** @return bool */
    public function browser_js()
    {
        return true;
    }

    /** @return string */
    public function category()
    {
        return 'unknown';
    }

    /** @return bool */
    public function isDesktop()
    {
        return true;
    }

    /** @return bool */
    public function isMobile()
    {
        return false;
    }
}