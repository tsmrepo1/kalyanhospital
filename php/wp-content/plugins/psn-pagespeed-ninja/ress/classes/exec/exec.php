<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Exec_Exec implements IRessio_Exec
{
    /**
     * @param string $command
     * @param string $output
     * @return int
     * @throws ERessio_Exception
     */
    public function run($command, &$output)
    {
        if (exec($command, $output, $retval) === false) {
            throw new ERessio_Exception(__METHOD__ . " cannot exec command: {$command}");
        }
        $output = implode("\n", $output);
        return $retval;
    }
}