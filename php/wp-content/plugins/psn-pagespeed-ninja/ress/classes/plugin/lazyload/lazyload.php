<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_Lazyload extends Ressio_Plugin
{
    /** @var string */
    public static $blankImage = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
    /** @var string */
    public static $blankIframe = 'about:blank';

    /** @var int */
    private $numImages = 0;
    /** @var int */
    private $numIframes = 0;

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
        if ($this->params->image) {
            if ($this->params->rules_img_exclude && $optimizer->matchExcludeRule($node, $this->params->rules_img_exclude)) {
                return;
            }
            $this->numImages++;
            if ($this->numImages > $this->params->skipimages) {
                $this->lazyfyNode($node, $optimizer);
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagVIDEO($event, $optimizer, $node)
    {
        if ($this->params->video) {
            if ($optimizer->nodeIsDetached($node) || $optimizer->isNoscriptState()) {
                return;
            }
            if ($this->params->rules_video_exclude && $optimizer->matchExcludeRule($node, $this->params->rules_video_exclude)) {
                return;
            }

            $modified = false;

            if ($node->hasAttribute('src') && !$node->hasAttribute('data-src')) {
                $src = $node->getAttribute('src');
                if (strncmp($src, 'data:', 5) === 0 && !preg_match('/(?:__|\}\})$/', $src)) {
                    $modified = true;
                    $node->setAttribute('data-src', $src);
                    $node->removeAttribute('src');
                }
            }

            if ($node->hasAttribute('poster') && !$node->hasAttribute('data-poster')) {
                $src = $node->getAttribute('poster');
                if (strncmp($src, 'data:', 5) === 0 && !preg_match('/(?:__|\}\})$/', $src)) {
                    $modified = true;
                    $node->setAttribute('data-poster', $src);
                    $node->removeAttribute('poster');
                }
            }

            if ($modified) {
                $node->addClass('lazy');
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagIFRAME($event, $optimizer, $node)
    {
        if ($this->params->iframe) {
            if ($this->params->rules_iframe_exclude && $optimizer->matchExcludeRule($node, $this->params->rules_iframe_exclude)) {
                return;
            }
            $this->numIframes++;
            if ($this->numIframes > $this->params->skipiframes) {
                $this->lazyfyNode($node, $optimizer);
            }
        }
    }

    /**
     * @param IRessio_HtmlNode $node
     * @param IRessio_HtmlOptimizer $optimizer
     * @return void
     */
    private function lazyfyNode($node, $optimizer)
    {
        if ($node->hasAttribute('ress-nolazy')) {
            $node->removeAttribute('ress-nolazy');
            return;
        }

        if ($node->hasAttribute('onload') || $node->hasAttribute('onerror')) {
            return;
        }

        if ($optimizer->nodeIsDetached($node) ||
            $optimizer->isNoscriptState() ||
            !$node->hasAttribute('src') ||
            strncmp($node->getAttribute('src'), 'data:', 5) === 0
        ) {
            return;
        }

        // 1x1 tracking pixel analytics
        if ($node->hasAttribute('width') && $node->hasAttribute('height')
            && $node->getAttribute('width') === '1' && $node->getAttribute('height') === '1') {
            return;
        }

        // skip data attributes (sliders, etc.)
        if ($node instanceof DOMElement) {
            if ($node->hasAttributes()) {
                foreach ($node->attributes as $attr) {
                    if (strncmp($attr->nodeName, 'data-', 5) === 0) {
                        return;
                    }
                }
            }
        } else {
            if (count($node->attributes)) {
                foreach ($node->attributes as $name => $value) {
                    if (strncmp($name, 'data-', 5) === 0) {
                        return;
                    }
                }
            }
        }

        $src = $node->getAttribute('src');
        if (preg_match('/(?:__|\}\})$/', $src)) {
            // template-like URL: __dummy__ or {{dummy}}
            return;
        }

        switch ($this->params->noscriptpos) {
            case 'none':
                break;
            case 'before':
                $optimizer->nodeInsertBefore($node, 'noscript', null, $optimizer->nodeToString($node));
                break;
            case 'after':
                $optimizer->nodeInsertAfter($node, 'noscript', null, $optimizer->nodeToString($node));
                break;
        }

        $node->addClass('lazy');
        if ($this->params->method === 'native') {
            $node->setAttribute('loading', 'lazy');
        } else {
            if ($node->getTag() === 'img') {
                $node->setAttribute('data-src', $node->getAttribute($node->hasAttribute('srcset') ? 'srcset' : 'src'));
                switch ($this->params->lqip) {
                    case 'none':
                        $src = false;
                        break;
                    case 'full':
                        $src = $this->getLQIP($src);
                        break;
                    case 'low':
                        $low_src = $this->getLQIP($src);
                        if ($low_src !== false) {
                            list($src_width, $src_height) = getimagesize($src);
                            $style = $node->hasAttribute('style') ? $node->getAttribute('style') . ';' : '';
                            $style .= "aspect-ratio:{$src_width}/{$src_height}";
                            $node->setAttribute('style', $style);
                            $src = $low_src;
                        }
                        break;
                }
                if ($src === false) {
                    $src = self::$blankImage;
                }
                $node->setAttribute('srcset', $src);
            } else {
                $node->setAttribute('src', self::$blankIframe);
                $node->setAttribute('data-src', $src);
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagHEADAfterEnd($event, $optimizer, $node)
    {
        static $async = array('async' => true, 'defer' => true);

        $suffix = $this->params->debug ? '.js' : '.min.js';

        if ($this->params->edgey >= 0) {
            $optimizer->appendScriptDeclaration('lazyLoadXT={edgeY:"' . (int)$this->params->edgey . 'px"};', $async);
        }
        $optimizer->appendScriptDeclaration(file_get_contents(__DIR__ . '/js/lazyloadxt.v3' . $suffix), $async);
        if ($this->params->noscriptpos !== 'none') {
            $optimizer->prependHead(
                array('noscript', array(), '<style>.lazy{display:none}</style>')
            );
        }
        if ($this->params->lqip !== 'none' && $this->params->lqip_blur) {
            // Note: clip-path:inset(0) doesn't prevent outer blur in the case of border-radius
            $optimizer->appendStyleDeclaration('img.lazy-hidden{-webkit-filter:blur(8px);filter:blur(8px);-webkit-mask:linear-gradient(#000 0 0) content-box;mask:linear-gradient(#000 0 0) content-box}');
        }

        $addons = (isset($this->params->addons) && is_array($this->params->addons)) ? $this->params->addons : array();
        if (($this->params->video || $this->params->iframe) && !in_array('video', $addons, true)) {
            $addons[] = 'video';
        }
        if ($this->params->srcset && !in_array('srcset', $addons, true)) {
            $addons[] = 'srcset';
        }
        foreach ($addons as $addon) {
            $filename = __DIR__ . '/js/lazyloadxt.v3.' . $addon . $suffix;
            if (is_file($filename)) {
                $optimizer->appendScriptDeclaration(file_get_contents(__DIR__ . '/js/lazyloadxt.' . $addon . $suffix), $async);
            }
        }
    }

    /**
     * @param string $src_url
     * @return string
     */
    public function getLQIP($src_url)
    {
        $src_ext = strtolower(pathinfo($src_url, PATHINFO_EXTENSION));
        if ($src_ext === 'jpeg') {
            $src_ext = 'jpg';
        }

        $urlRewriter = $this->di->urlRewriter;
        $src_imagepath = $urlRewriter->urlToFilepath($src_url);
        if ($this->di->filesystem->isFile($src_imagepath)) {
            if ($src_ext === 'svg') {
                $xml = simplexml_load_file($src_imagepath);
                if ($xml->getName() === 'svg') {
                    $svg = '<svg xmlns="http://www.w3.org/2000/svg"';
                    if (isset($xml['width'])) {
                        $svg .= " width=\"{$xml['width']}\"";
                    }
                    if (isset($xml['height'])) {
                        $svg .= " height=\"{$xml['height']}\"";
                    }
                    if (isset($xml['viewBox'])) {
                        $svg .= " viewBox=\"{$xml['viewBox']}\"";
                    }
                    $svg .= '></svg>';
                    return 'data:image/svg+xml,' . rawurlencode($svg);
                }
            } else {
                $type = $this->params->lqip;
                $dest_imagepath = $this->getLQIPPath($src_imagepath, $type);

                switch ($type) {
                    case 'full':
                        $jpegquality = $this->config->img->jpegquality;
                        $this->config->img->jpegquality = -1;
                        if ($src_ext === 'jpg') {
                            $dest_imagepath = $this->di->imgOptimizer->optimize($src_imagepath, $dest_imagepath);
                        } else {
                            $dest_imagepath = $this->di->imgOptimizer->convert($src_imagepath, 'jpg', $dest_imagepath);

                        }
                        $this->config->img->jpegquality = $jpegquality;

                        if ($dest_imagepath !== false && is_file($dest_imagepath)) {
                            if ($this->params->lqip_embed) {
                                $data = file_get_contents($dest_imagepath);
                                if ($data !== false && $data !== '') {
                                    return 'data:image/jpeg;base64,' . base64_encode($data);
                                }
                            } else {
                                return $urlRewriter->filepathToUrl($dest_imagepath);
                            }
                        }
                        break;

                    case 'low':
                        // fast check $dest_imagepath exists and has same timestamp
                        if (file_exists($dest_imagepath) && filemtime($src_imagepath) === filemtime($dest_imagepath)) {
                            if (filesize($dest_imagepath) === 0) {
                                return false;
                            }
                        } else {
                            list($src_width, $src_height) = getimagesize($src_imagepath);
                            if ($src_width !== 0 && $src_height !== 0) {
                                if ($src_width > $src_height) {
                                    $width = $this->params->lqip_low_res;
                                    $height = max(2, (int)round($width * $src_height / $src_width));
                                } else {
                                    $height = $this->params->lqip_low_res;
                                    $width = max(2, (int)round($height * $src_width / $src_height));
                                }

                                $dest_imagepath = $this->di->imgOptimizer->rescale($src_imagepath, 'gif', $width, $height, $dest_imagepath);
                            }
                        }
                        if ($dest_imagepath !== false && is_file($dest_imagepath)) {
                            $data = file_get_contents($dest_imagepath);
                            if ($data !== false && $data !== '') {
                                return 'data:image/gif;base64,' . base64_encode($data);
                            }
                        }
                        break;
                }
            }
        }

        return false;
    }

    /**
     * @param string $src_imagepath
     * @param string $type
     * @return string
     */
    public function getLQIPPath($src_imagepath, $type)
    {
        $hash_path = substr(sha1(dirname($src_imagepath)), 0, 8);

        $dest_imagedir = "{$this->config->webrootpath}{$this->config->staticdir}/img-lqip/{$hash_path}";
        if (!$this->di->filesystem->makeDir($dest_imagedir)) {
            $this->di->logger->error('Unable to create directory in ' . __METHOD__ . ": $dest_imagedir");
        }

        $src_imagename = pathinfo($src_imagepath, PATHINFO_FILENAME);
        return "{$dest_imagedir}/{$src_imagename}.lqip.{$type}";
    }
}