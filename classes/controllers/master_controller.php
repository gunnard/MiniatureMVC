<?php
    /**
     * Basic class for all controllers
     */

    class Master_controller
    {
        // Defines the layout of the page (header and footer)
        // If not applicable, don't set it in the constructor
        protected $layoutController;

        protected $dataConnection;

        public function __construct($dataConnection)
        {
            $this->dataConnection = $dataConnection;
        }

        /**
         * Display header if available and the method exists
         */
        protected function displayHeader($title)
        {
            if ($this->layoutController && method_exists($this->layoutController, 'header'))
            {
                $this->layoutController->header($title);
            }
        }

        /**
         * Display footer if available
         */
        protected function displayFooter()
        {
            if ($this->layoutController && method_exists($this->layoutController, 'footer'))
            {
                $this->layoutController->footer();
            }
        }
    }

?>