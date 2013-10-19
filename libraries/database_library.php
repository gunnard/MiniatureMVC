<?php
    /**
     * The Database Library serves as an interface for the database drivers
     */

    abstract class Database_Library
    {
        abstract protected function connect();
        abstract protected function disconnect();
        abstract protected function prepare($query, $params = null);
        abstract protected function execute($fetch = true);
        abstract protected function fetch($type = 'object', $singleResult = false);
    }

?>