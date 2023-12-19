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
defined('ABSPATH') || die();

/** @var array $config */
/** @var string $prev_version */
/** @var string $version */

// fix: set correct permissions for /s files
$staticDir = rtrim(ABSPATH, '/') . $config['staticdir'];
$perms = @fileperms($staticDir) & 0666;
$files = scandir($staticDir, SCANDIR_SORT_NONE);
foreach ($files as $file) {
    if ($file[0] !== '.') {
        $fullname = $staticDir . '/' . $file;
        if (is_file($fullname)) {
            @chmod($fullname, $perms);
        }
    }
}
