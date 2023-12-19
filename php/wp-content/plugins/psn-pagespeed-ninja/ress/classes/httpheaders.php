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
 * HTTP Headers class
 */
class Ressio_HttpHeaders implements IRessio_HttpHeaders
{
    /** @var string */
    public $status = 'HTTP/1.1 200 OK';
    /** @var int */
    public $status_code = 200;
    /** @var array */
    public $headers = array();

    /**
     * @param string $line
     * @param bool $override
     * @param ?int $http_response_code
     * @return void
     */
    public function setHeader($line, $override = true, $http_response_code = null)
    {
        if (strpos($line, ':') === false) {
            // status code
            $this->status = $line;
            $this->status_code = $http_response_code;
        } else {
            $prop = strtok($line, ':');
            if ($override || !isset($this->headers[$prop])) {
                $this->headers[$prop] = $line;
            } elseif (is_array($this->headers[$prop])) {
                $this->headers[$prop][] = $line;
            } else {
                $this->headers[$prop] = array($this->headers[$prop], $line);
            }
        }
    }

    /**
     * @param array $headers
     * @return void
     */
    public function setHeaders($headers)
    {
        foreach ($headers as $line) {
            if (is_array($line)) {
                foreach ($line as $header_line) {
                    $this->setHeader($header_line, false);
                }
            } else {
                $this->setHeader($line);
            }
        }
    }

    /** @return void */
    public function clearHeaders()
    {
        $this->status = 'HTTP/1.1 200 OK';
        $this->status_code = 200;
        $this->headers = array();
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /** @return void */
    public function sendHeaders()
    {
        if (headers_sent()) {
            return;
        }

        header($this->status, true, $this->status_code);
        foreach ($this->headers as $line) {
            if (is_array($line)) {
                foreach ($line as $header_line) {
                    header($header_line, false);
                }
            } else {
                header($line);
            }
        }
    }
}
