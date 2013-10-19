<?php
    /**
     * Basic class for all models
     */

    class Master_model
    {
        protected $dataConnection;

        public function __construct($dataConnection)
        {
            $this->dataConnection = $dataConnection;
        }
    }

?>