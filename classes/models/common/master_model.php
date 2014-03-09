<?php
    /**
     * Basic class for all models
     */
    class Common_master_model
    {
        protected $config;

        /* @var $dbCon MysqlImproved_Driver */
        protected $dbCon;

        public function __construct($config)
        {
            $this->config = $config;
            if (isset($config['data_connection'])) // Simplifies query lines by letting you use $this->dbCon
            {
                $this->dbCon = $config['data_connection'];
            }
        }
    }

?>