<?php
    /**
     * Basic class for all controllers
     */

    class Master_controller
    {
        protected $dataConnection;

        public function __construct($dataConnection)
        {
            $this->dataConnection = $dataConnection;
        }
    }

?>