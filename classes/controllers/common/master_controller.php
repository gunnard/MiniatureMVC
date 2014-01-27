<?php
    /**
     * Basic class for all controllers
     */

    class Common_master_controller
    {
        // Defines the layout of the page (header and footer)
        // If not applicable, don't set it in the constructor
        protected $layoutController;

        protected $config; // Contains the config and the database connection

        public function __construct($config = null)
        {
            $this->config = $config;
        }

        /**
         * This is the default function that will be called by router.php
         * It will call a function with the name given in the action parameter
         * EX: vendors/view/1 will call Vendors_controller's view function with p1=1
         * @param $params
         */

        public function callAction($params)
        {
            if (isset($params['action']))
            {
                $this->{$params['action']}($params);
            }
            else // The param may directly be the action
            {
                $this->{$params}();
            }
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