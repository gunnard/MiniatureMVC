<?php
    /**
     * Contains the configuration variables
     */
    class Common_config_model
    {
        private $config;

        public function __construct()
        {
            $this->setDataConnection();
        }

        /**
         * Return the prepared config variables
         * @return array
         */
        public function getConfig()
        {
            return $this->config;
        }

        /**
         * Placeholder
         */
        private function setVariables()
        {
            //$this->config['constant1'] = x; // Add constants and paths here
        }

        /**
         * Set connection information
         */
        private function setDataConnection()
        {
            $connectionInfo = array(
                "host" => "127.0.0.1",
                "user" => "root",
                "password" => "root",
                "database" => "miniatureMVC",
                "port" => null,
                "socket" => null
            );

            $dataConnection = new MysqlImproved_Driver();
            $dataConnection->connect($connectionInfo);

            $this->config['data_connection'] = $dataConnection;
        }
    }

?>