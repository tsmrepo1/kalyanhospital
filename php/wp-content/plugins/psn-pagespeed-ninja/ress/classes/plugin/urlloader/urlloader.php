<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Plugin_UrlLoader extends Ressio_Plugin
{
    /** @var int */
    protected $filehashsize = 12;
    /** @var string */
    protected $targetDir;

    /**
     * @param Ressio_DI $di
     * @param ?stdClass $params
     */
    public function __construct($di, $params = null)
    {
        $params = $this->loadConfig(__DIR__ . '/config.json', $params);

        parent::__construct($di, $params);

        $this->targetDir = "{$this->config->webrootpath}{$this->config->staticdir}/loaded";
        if (!$di->filesystem->isDir($this->targetDir)) {
            $di->filesystem->makeDir($this->targetDir);
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagIMGBefore($event, $optimizer, $node)
    {
        if (!$this->params->loadimg || $optimizer->nodeIsDetached($node)) {
            return;
        }

        if ($node->hasAttribute('src')) {
            $url = $node->getAttribute('src');
            $url = $this->loadUrl($url);
            if ($url !== null) {
                $node->setAttribute('src', $url);
            }
        }

        if ($node->hasAttribute('srcset')) {
            $srcset = $node->getAttribute('srcset');
            $srclist = $this->parseSrcset($srcset);
            $updated = false;
            foreach ($srclist as &$srcitem) {
                $split = preg_split('/\s+/', trim($srcitem), 2);
                $url = $this->loadUrl($split[0]);
                if ($url !== null) {
                    $srcitem = isset($split[1]) ? "$url {$split[1]}" : $url;
                    $updated = true;
                }
            }
            if ($updated) {
                $node->setAttribute('srcset', implode(', ', $srclist));
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

        if (!$this->params->loadscript || $optimizer->nodeIsDetached($node)) {
            return;
        }
        if ($this->config->js->rules_merge_exclude && $optimizer->matchExcludeRule($node, $this->config->js->rules_merge_exclude)) {
            return;
        }

        if ($node->hasAttribute('src')) {
            $url = $node->getAttribute('src');
            $url = $this->loadUrl($url, 'js');
            if ($url !== null) {
                $node->setAttribute('src', $url);
            }
        } elseif ($this->params->googleanalytics) {
            $content = $optimizer->nodeGetInnerText($node);
            $modified = false;

            // process legacy GA code
            if (preg_match_all(
                '#\(function\(\)\s*\{\s*var\s+ga\s*=\s*document\.createElement\(\'script\'\);\s*ga\.type\s*=\s*\'text/javascript\';\s*ga\.async\s*=\s*true;\s*ga\.src\s*=\s*\(\'https:\'\s*==\s*document\.location\.protocol\s*\?\s*\'https://ssl\'\s*:\s*\'http://www\'\)\s*\+\s*\'\.google-analytics\.com/ga\.js\';\s*var\s+s\s*=\s*document\.getElementsByTagName\(\'script\'\)\[0\];\s*s\.parentNode\.insertBefore\(ga,\s*s\);\s*\}\)\(\);#',
                $content, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE)
            ) {
                $https = !empty($_SERVER['HTTPS']) && (strcasecmp($_SERVER['HTTPS'], 'off') !== 0);
                $url = $https ? 'https://ssl.google-analytics.com/ga.js' : 'http://www.google-analytics.com/ga.js';
                $localUrl = $this->loadUrl($url, 'js');
                if ($localUrl !== null) {
                    $modified = true;
                    $optimizer->appendScript($localUrl, array('async' => true));
                    $offset_shift = 0;
                    foreach ($matches as $match) {
                        $offset = $match[0][1];
                        $length = strlen($match[0][0]);
                        $content = substr($content, 0, $offset_shift + $offset) . substr($content, $offset_shift + $offset + $length);
                        $offset_shift -= $length;
                    }
                }
            }

            // process modern GA code
            if (preg_match_all(
                '#\(function\(i,s,o,g,r,a,m\)\{i\[\'GoogleAnalyticsObject\'\]=r;i\[r\]=i\[r\]\|\|function\(\)\{\s*\(i\[r\]\.q=i\[r\]\.q\|\|\[\]\)\.push\(arguments\)\},i\[r\]\.l=1\*new\s+Date\(\);a=s\.createElement\(o\),\s*m=s\.getElementsByTagName\(o\)\[0\];a\.async=1;a\.src=g;m\.parentNode\.insertBefore\(a,m\)\s*\}\)\(window,document,\'script\',\'//www\.google-analytics\.com/analytics\.js\',\'ga\'\);#',
                $content, $matches, PREG_SET_ORDER | PREG_OFFSET_CAPTURE)
            ) {
                $url = 'https://www.google-analytics.com/analytics.js';
                $localUrl = $this->loadUrl($url, 'js');
                if ($localUrl !== null) {
                    $modified = true;
                    $optimizer->appendScript($localUrl, array('async' => true));
                    $offset_shift = 0;
                    $code = 'window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;';
                    foreach ($matches as $match) {
                        $offset = $match[0][1];
                        $length = strlen($match[0][0]);
                        $content = substr($content, 0, $offset_shift + $offset) . $code . substr($content, $offset_shift + $offset + $length);
                        $offset_shift += strlen($code) - $length;
                    }
                }
            }

            if ($modified) {
                $optimizer->nodeSetInnerText($node, $content);
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param IRessio_HtmlOptimizer $optimizer
     * @param IRessio_HtmlNode $node
     * @return void
     */
    public function onHtmlIterateTagLINKBefore($event, $optimizer, $node)
    {
        if (!$this->params->loadcss || $optimizer->nodeIsDetached($node)) {
            return;
        }
        if ($this->config->css->rules_merge_exclude && $optimizer->matchExcludeRule($node, $this->config->css->rules_merge_exclude)) {
            return;
        }

        if ($node->hasAttribute('rel') && $node->hasAttribute('href') && $node->getAttribute('rel') === 'stylesheet') {
            $url = $node->getAttribute('href');
            $url = $this->loadUrl($url, 'css', true);
            if ($url !== null) {
                $node->setAttribute('href', $url);
            }
        }
    }

    /**
     * @param Ressio_Event $event
     * @param string $buffer
     * @param string[] $saved
     * @return void
     */
    public function onCssRelocatorBefore($event, &$buffer, &$saved)
    {
        foreach ($saved as $key => $value) {
            if ($key[2] !== 'u') {
                continue;
            }
            $url = substr($value, 4, -1);
            if ($url !== '' && ($url[0] === '"' || $url[1] === "'")) {
                $url = substr($url, 1, -1);
            }
            $url = stripslashes($url);
            // TODO: check URL doesn't match local file
            // TODO: support hash tags (for legacy svg fonts)
            $pos = strrpos($url, '.');
            $ext = ($pos === false) ? '' : substr($url, $pos + 1);
            $newurl = null;
            switch (strtolower($ext)) {
                case 'css':
                    if ($this->params->loadcss) {
                        $newurl = $this->loadUrl($url, 'css', true);
                    }
                    break;
                case 'jpg':
                case 'jpeg':
                case 'gif':
                case 'png':
                case 'webp':
                case 'avif':
                case 'svg':
                    if ($this->params->loadimg) {
                        $newurl = $this->loadUrl($url);
                    }
                    break;
                case 'ttf':
                case 'otf':
                case 'woff':
                case 'woff2':
                case 'eot':
                    if ($this->params->loadfont) {
                        $newurl = $this->loadUrl($url);
                    }
                    break;
            }
            if ($newurl !== null) {
                if (strpbrk($url, ' "\'()')) {
                    $saved[$key] = 'url("' . addcslashes($newurl, '"') . '")';
                } else {
                    $saved[$key] = "url($newurl)";
                }
            }
        }
    }

    /**
     * @param string $url
     * @param string|null $defaultExt
     * @param bool $cssRebase
     * @return ?string
     */
    protected function loadUrl($url, $defaultExt = null, $cssRebase = false)
    {
        if (strncmp($url, '//', 2) === 0) {



            $url = 'http:' . $url;
        } elseif (strpos($url, '://') === false) {
            return null;
        }

        $url = html_entity_decode($url);

        $parsed = @parse_url($url);
        $host = $parsed['host'];
        if (!in_array($host, $this->params->allowedhosts, true)) {
            return null;
        }
        if (!$this->params->loadqueue && isset($parsed['queue']) && $parsed['queue'] !== '') {
            return null;
        }
        if (!$this->params->loadphp && substr_compare($parsed['path'], '.php', -4, 4) === 0) {
            return null;
        }

        /** @var string[] $deps */
        $deps = array(
            'plugin_urlloader',
            $url
        );

        $cache = $this->di->cache;
        $cache_id = $cache->id($deps, 'file');
        $result = $cache->getOrLock($cache_id);

        if ($result === false) {
            return null;
        }

        // cache structure:
        //     string|false filename (initially unknown because of unknown mime for images)
        //     int          expiration
        //     string       lastModified
        //     string       ETag

        // actor params:
        //     string    $url
        //     string    $dest_path (without extension)
        //     ?string   $default_ext
        //     bool      $css_relocate
        //     ?stdClass $cache_params
        //     string    $cache_id

        if ($result === true) {
            // locked successfully
            // save a dummy cache entry
            $cached_data = new stdClass();
            $cache->storeAndUnlock($cache_id, json_encode($cached_data));
        } else {
            // check expiration
            $cached_data = json_decode($result);
            if (!isset($cached_data->filename) || $cached_data->filename === false) {
                // not loaded yet
                return null;
            }
            if (isset($cached_data->expiration) && time() < $cached_data->expiration) {
                return $this->di->urlRewriter->filepathToUrl($cached_data->filename);
            }
        }

        // request loading
        $actor_params = array(
            'url' => $url,
            'dest_path' => $this->targetDir . '/' . substr(sha1($url), 0, $this->filehashsize),
            'default_ext' => $defaultExt,
            'css_relocate' => $cssRebase,
            'cache_id' => $cache_id
        );
        if ($this->config->worker->enabled) {
            $actor_params['cache_params'] = $cache->getParams();
        }
        if (!empty($this->params->useragent)) {
            $actor_params['headers'] = array(
                'User-Agent: ' . $this->params->useragent
            );
        }
        $this->di->worker->runTask('urlDownload', $actor_params);
        if ($this->config->worker->enabled && !is_string($result)) {
            return null;
        }

        $result = $cache->getOrLock($cache_id);
        if (is_string($result)) {
            $cached_data = json_decode($result);
            if (!empty($cached_data->filename)) {
                return $this->di->urlRewriter->filepathToUrl($cached_data->filename);
            }
        } elseif ($result) {
            $cache->delete($cache_id);
        }

        return null;
    }

    /**
     * Parse srcset attribute
     * @param string $srcset
     * @return array
     */
    protected function parseSrcset($srcset)
    {
        $prev = strspn($srcset, "\n\r\t\f ");
        $result = array();
        while (preg_match('/\s/', $srcset, $matches, PREG_OFFSET_CAPTURE, $prev)) {
            $pos = $matches[0][1];
            $comma = strpos($srcset, ',', max(0, $pos - 1));
            if ($comma === false) {
                break;
            }
            $result[] = rtrim(substr($srcset, $prev, $comma - $prev));
            $prev = $comma + 1;
            $prev += strspn($srcset, "\n\r\t\f ", $prev);
        }
        $result[] = rtrim(substr($srcset, $prev));
        return $result;
    }
}
