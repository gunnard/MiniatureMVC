<?php
    /**
     * Basic class for all models
     */

    class Master_model
    {
        /* @var $dataConnection Mysqlimproved_driver */
        protected $dataConnection;

        public function __construct($dataConnection)
        {
            $this->dataConnection = $dataConnection;
        }
    }

?>