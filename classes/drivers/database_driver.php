<?php
    /**
     * The Database Library serves as an interface for the database drivers
     */

    abstract class Database_Driver
    {
        abstract protected function connect($connectionInfo);
        abstract protected function disconnect();
        abstract protected function prepare($query, $params = null);
        abstract protected function execute();
        abstract protected function run($query, $params = null);
        abstract protected function fetch($singleResult = false, $type = 'array');
        abstract protected function getLastInsertId();
    }

?>