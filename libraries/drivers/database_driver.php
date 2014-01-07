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
        abstract protected function fetch($type = 'array', $singleResult = false);
        abstract protected function getLastInsertId();
    }

?>