<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_Imagesize extends Ressio_Plugin
{
    /**
     * @param Ressio_DI $di
     * @param null|stdClass $params
     */
    public function __construct($di, $params = null)
    {
        $params = $this->loadConfig(__DIR__ . '/config.json', $params);

        parent::__construct($di, $params);
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagIMG($event, $optimizer, $node)
    {
        if ($node->hasAttribute('ress-nosize')) {
            $node->removeAttribute('ress-nosize');
            return;
        }

        if ($optimizer->nodeIsDetached($node) || $optimizer->isNoscriptState()) {
            return;
        }
        if ($node->hasAttribute('width') || $node->hasAttribute('height') || !$node->hasAttribute('src')) {
            return;
        }

        $src = $node->getAttribute('src');
        $src_imagepath = $this->di->urlRewriter->urlToFilepath($src);
        if ($src_imagepath === null) {
            return;
        }

        if ($this->di->filesystem->isFile($src_imagepath)) {
            $src_imagesize = getimagesize($src_imagepath);
            if ($src_imagesize !== false) {
                list($src_width, $src_height) = $src_imagesize;
                $node->setAttribute('width', $src_width);
                $node->setAttribute('height', $src_height);
            }
        }
    }
}