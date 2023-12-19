<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Exec_Popen implements IRessio_Exec
{
    /**
     * @param string $command
     * @param string $output
     * @return int
     * @throws ERessio_Exception
     */
    public function run($command, &$output)
    {
        $process = popen($command, 'rb');
        if (!is_resource($process)) {
            throw new ERessio_Exception(__METHOD__ . " cannot popen command: {$command}");
        }
        $output = stream_get_contents($process);
        $retval = pclose($process);
        return $retval;
    }
}