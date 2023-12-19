<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_GoogleFont extends Ressio_Plugin
{
    /** @var string[] */
    protected $googlefonts = array();

    /** @var string[] */
    protected $bunnyfonts = array();

    /**
     * @param Ressio_DI $di
     * @param ?stdClass $params
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
    public function onHtmlIterateTagLINKBefore($event, $optimizer, $node)
    {
        if ($node->hasAttribute('rel') && $node->hasAttribute('href') && $node->getAttribute('rel') === 'stylesheet'
            && (!$node->hasAttribute('type') || $node->getAttribute('type') === 'text/css')
        ) {
            $url = $node->getAttribute('href');

            if (preg_match('#^(?:https?:)?//fonts\.googleapis\.com/css\?family=([^&]+)#', $url, $match)) {
                $fonts = explode('|', $match[1]);
                $this->googlefonts = array_merge($this->googlefonts, $fonts);
                $optimizer->nodeDetach($node);
            } elseif (preg_match('#^(?:https?:)?//fonts\.bunny\.net/css\?family=([^&]+)#', $url, $match)) {
                $fonts = explode('|', $match[1]);
                $this->bunnyfonts = array_merge($this->bunnyfonts, $fonts);
                $optimizer->nodeDetach($node);
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param Ressio_HtmlOptimizer_Base $optimizer
     * @return void
     */
    public function onHtmlBeforeStringify($event, $optimizer)
    {
        $isHtml5 = ($optimizer->doctype === IRessio_HtmlOptimizer::DOCTYPE_HTML5);

        if (count($this->googlefonts) > 0) {
            $attrs = $this->generateLinkTagAttrs('//fonts.googleapis.com/css?family=', $this->googlefonts, $isHtml5);
            $optimizer->prependHead(
                //array('link', array('rel' => 'dns-prefetch', 'href' => '//fonts.googleapis.com'), false),
                array('link', array('rel' => 'dns-prefetch', 'href' => '//fonts.gstatic.com'), false),
                //array('link', array('rel' => 'preconnect', 'href' => '//fonts.googleapis.com'), false),
                array('link', array('rel' => 'preconnect', 'href' => '//fonts.gstatic.com', 'crossorigin' => false), false),
                array('link', $attrs, false)
            );
        }

        if (count($this->bunnyfonts) > 0) {
            $attrs = $this->generateLinkTagAttrs('//fonts.bunny.net/css?family=', $this->bunnyfonts, $isHtml5);
            $optimizer->prependHead(
                //array('link', array('rel' => 'dns-prefetch', 'href' => '//fonts.bunny.net'), false),
                //array('link', array('rel' => 'preconnect', 'href' => '//fonts.bunny.net'), false),
                array('link', array('rel' => 'preconnect', 'href' => '//fonts.bunny.net', 'crossorigin' => false), false),
                array('link', $attrs, false)
            );
        }
    }

    /**
     * @param string $baseurl
     * @param string[] $fonts
     * @param bool $isHtml5
     * @return string[]
     */
    private function generateLinkTagAttrs($baseurl, $fonts, $isHtml5)
    {
        $url = $baseurl . implode('%7C', $fonts);

        switch ($this->params->method) {
            case 'async':
            case 'fout':
                $url .= '&display=swap';
                /** @fallthrough */
            case 'first':
            case 'foit':
            default:
                $attrs = array(
                    'rel' => 'stylesheet',
                    'href' => $url
                );
                if (!$isHtml5) {
                    $attrs['type'] = 'text/css';
                }
        }

        return $attrs;
    }
}