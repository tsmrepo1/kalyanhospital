<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_AboveTheFoldCSS extends Ressio_Plugin
{
    /** @var bool */
    protected $loadAboveTheFoldCSS = false;

    /** @var bool */
    protected $relayout = false;

    /**
     * @param Ressio_DI $di
     * @param null|stdClass $params
     */
    public function __construct($di, $params)
    {
        $params = $this->loadConfig(__DIR__ . '/config.json', $params);

        parent::__construct($di, $params);
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @return void
     */
    public function onHtmlIterateBefore($event, $optimizer)
    {
        if (empty($this->params->cookie)) {
            $this->loadAboveTheFoldCSS = true;
        } elseif (!isset($_COOKIE[$this->params->cookie])) {
            $this->loadAboveTheFoldCSS = true;

            setcookie($this->params->cookie, '1', time() + $this->params->cookietime, '/', $_SERVER['HTTP_HOST'], false, true);
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagLINK($event, $optimizer, $node)
    {
        if (!$this->loadAboveTheFoldCSS || $optimizer->nodeIsDetached($node)) {
            return;
        }

        if ($node->hasAttribute('rel') && $node->hasAttribute('href')
            && $node->getAttribute('rel') === 'stylesheet'
            && (!$node->hasAttribute('type') || $node->getAttribute('type') === 'text/css')
            && !$node->hasAttribute('onload')
        ) {
            $media = $node->hasAttribute('media') ? $node->getAttribute('media') : 'all';
            if ($media !== 'print') {
                $optimizer->nodeInsertAfter($node, 'noscript', null, $optimizer->nodeToString($node));
                $node->setAttribute('media', 'print');
                $node->setAttribute('onload', "this.media='$media'");
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagSCRIPTBefore($event, $optimizer, $node)
    {
        if (!$this->loadAboveTheFoldCSS || $this->relayout) {
            return;
        }

        if ($node->hasAttribute('type') && $node->getAttribute('type') !== 'text/javascript') {
            return;
        }

        if ($node->hasAttribute('src')) {
            $src = $node->getAttribute('src');
            if (strpos($src, 'masonry') !== false) {
                $this->relayout = true;
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @return void
     */
    public function onHtmlIterateAfter($event, $optimizer)
    {
        if (!$this->loadAboveTheFoldCSS) {
            return;
        }

        if ($this->relayout) {
            $scriptData = file_get_contents(__DIR__ . '/js/relayout.min.js');
            $optimizer->appendScriptDeclaration($scriptData);
        }

        // Process CSS with image optimizer and FontDisplaySwap plugin
        $abovethefoldcss = $this->di->cssRelocator->run($this->params->abovethefoldcss);
        $optimizer->prependHead(array('style', null, $abovethefoldcss));
    }

    /**
     * @param Ressio_Event $event
     * @param stdClass $wrapper
     * @return void
     */
    public function onCssCombinerNodeList($event, $wrapper)
    {
        if (!$this->loadAboveTheFoldCSS) {
            return;
        }

        $noscript = '';
        foreach ($wrapper->nodes as $node) {
            /** Ressio_NodeWrapper $node */
            if ($node->tagName === 'link') {
                $media = isset($node->attributes['media']) ? $node->attributes['media'] : 'all';
                if ($media !== 'print') {
                    $noscript .= $node;
                    $node->attributes['media'] = 'print';
                    $node->attributes['onload'] = "this.media='$media'";
                }
            }
        }
        if ($noscript !== '') {
            $wrapper->nodes[] = new Ressio_NodeWrapper('noscript', $noscript);
        }
    }
}