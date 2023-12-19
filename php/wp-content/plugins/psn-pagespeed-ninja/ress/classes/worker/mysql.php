<?php
/*
 * RESSIO Responsive Server Side Optimizer
 * https://github.com/ressio/
 *
 * @copyright   Copyright (C) 2013-2023 Kuneri Ltd. / Denis Ryabov, PageSpeed Ninja Team. All rights reserved.
 * @license     GNU General Public License version 2
 */

defined('RESSIO_PATH') || die();

class Ressio_Worker_MySQL extends Ressio_Worker
{
    /** @var string */
    protected $table;

    /**
     * @param Ressio_DI $di
     * @throws ERessio_UnknownDiKey
     */
    public function __construct($di)
    {
        parent::__construct($di);
        $this->table = $di->config->worker->db->tablename;
    }

    /** @return void */
    protected function initializeStorage()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->table}` ("
            . '  `hash` BINARY(16) NOT NULL,'
            . '  `action` CHAR(16) NOT NULL,'
            . '  `params` TEXT NOT NULL,'
            . '  `added` INTEGER NOT NULL,'
            . '  `pid` INTEGER NOT NULL,'
            . '  `counter` INTEGER NOT NULL,'
            . '  UNIQUE (`hash`),'
            . '  INDEX (`pid`, `counter`)'
            . ') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin';
        $this->di->db->query($sql);
    }

    /**
     * @return bool
     */
    protected function isInitializedStorage()
    {
        $sql = "SHOW TABLES LIKE '{$this->table}'";
        $row = $this->di->db->loadRow($sql);
        return ($row !== null);
    }

    /**
     * @param string $hash
     * @param string $action
     * @param string $params
     * @param int $added
     * @return void
     */
    protected function addTaskToStorage($hash, $action, $params, $added)
    {
        $db = $this->di->db;
        $hash = $db->quote($hash);
        $action = $db->quote($action);
        $params = $db->quote($params);
        $added = (int)$added;

        $sql = "INSERT IGNORE INTO `{$this->table}`"
            . ' (`hash`, `action`, `params`, `added`, `pid`, `counter`)'
            . ' VALUES'
            . " (UNHEX({$hash}), {$action}, {$params}, {$added}, 0, 0)";
        $db->query($sql);
    }

    /**
     * @return bool
     */
    protected function pickTaskFromStorage()
    {
        $db = $this->di->db;

        $sql = "UPDATE `{$this->table}` SET `pid`={$this->pid}, `counter`=`counter`+1 WHERE `pid`=0 AND `counter`<5 LIMIT 1";
        $db->query($sql);
        $sql = "SELECT RTRIM(`action`) AS `action`, `params` FROM `{$this->table}` WHERE `pid`={$this->pid} LIMIT 1";
        $row = $db->loadRow($sql);

        if ($row === null) {
            return false;
        }
        $this->action = $row->action;
        $this->params = (array)json_decode($row->params);
        return true;
    }

    /** @return void */
    protected function setTaskDoneInStorage()
    {
        // remove task from database
        $sql = "DELETE FROM `{$this->table}` WHERE `pid`={$this->pid}";
        $this->di->db->query($sql);

        $this->action = null;
        $this->params = null;
    }

    /**
     * @return int[]
     */
    protected function getWorkersListFromStorage()
    {
        $sql = "SELECT DISTINCT `pid` FROM `{$this->table}`";
        $pids = $this->di->db->loadColumn($sql);
        foreach ($pids as $i => $pid) {
            $pids[$i] = (int)$pid;
        }
        return $pids;
    }

    /**
     * @param int $pid
     * @return void
     */
    protected function cleanupWorkerInStorage($pid)
    {
        $sql = "UPDATE `{$this->table}` SET `pid`=0 WHERE `pid`={$pid}";
        $this->di->db->query($sql);
    }

    /**
     * @return int
     */
    public function getTasksCount()
    {
        $sql = "SELECT COUNT(*) FROM `{$this->table}`";
        return $this->di->db->loadValue($sql);
    }

    /**
     * @return int
     */
    public function getRunningTasksCount()
    {
        $sql = "SELECT COUNT(*) FROM `{$this->table}` WHERE `pid`>0";
        return $this->di->db->loadValue($sql);
    }

    /**
     * @return stdClass[]
     */
    public function getTasksList()
    {
        $sql = "SELECT HEX(`hash`) AS `hash`, RTRIM(`action`) AS `action`, `params`, `added`, `pid`, `counter` FROM `{$this->table}`";
        return $this->di->db->loadRows($sql);
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function removeTask($hash)
    {
        $sql = "DELETE FROM `{$this->table}` WHERE `hash`=UNHEX(" . $this->di->db->quote($hash) . ')';
        $this->di->db->query($sql);
        return true;
    }

    /**
     * @param string $hash
     * @return bool
     */
    public function restartTask($hash)
    {
        $sql = "UPDATE `{$this->table}` SET `counter`=0 WHERE `hash`=UNHEX(" . $this->di->db->quote($hash) . ')';
        $this->di->db->query($sql);
        return true;
    }
}