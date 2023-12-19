<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Exec_Procopen implements IRessio_Exec
{
    /**
     * @param string $command
     * @param string $output
     * @return int
     * @throws ERessio_Exception
     */
    public function run($command, &$output)
    {
        $specs = array(1 => array('pipe', 'w'));
        $process = proc_open($command, $specs, $pipes, null, null, array('suppress_errors' => true));
        if (!is_resource($process)) {
            throw new ERessio_Exception(__METHOD__ . " cannot procopen command: {$command}");
        }
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        $retval = proc_close($process);
        return $retval;
    }
}