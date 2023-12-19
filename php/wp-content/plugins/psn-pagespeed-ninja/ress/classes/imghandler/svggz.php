<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

/**
 * SVG Images minification/compression
 */
class Ressio_ImgHandler_SvgGz implements IRessio_ImgHandlerOptimize, IRessio_DIAware
{
    /** @var Ressio_DI */
    protected $di;

    /**
     * Ressio_ImgHandler_SvgGz constructor.
     * @param $di
     */
    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * @param string $format
     * @return bool
     */
    public function isSupportedFormat($format)
    {
        return $format === 'svg';
    }

    /**
     * @param string $srcFile
     * @param string $destFile
     * @return bool
     */
    public function optimize($srcFile, $destFile)
    {
        $src_ext = pathinfo($srcFile, PATHINFO_EXTENSION);
        if ($src_ext !== 'svg') {
            return false;
        }

        $fs = $this->di->filesystem;

        if (!$fs->isFile($srcFile)) {
            return false;
        }

        // Do nothing. Gzipping is scheduled by Ressio_ImgOptimizer
        return true;
    }
}