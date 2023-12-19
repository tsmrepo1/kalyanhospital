<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

interface IRessio_Actor
{
    /**
     * @param array $params
     * @return void
     */
    public function run($params);

    /**
     * @param array $params
     * @return void
     */
    public function fail($params);
}
