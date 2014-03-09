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
        public function callAction($params = null)
        {
            if (isset($params['action']))
            {
                if (method_exists($this, $params['action']))
                {
                    $this->{$params['action']}($params);
                }
                else pageBroken();
            }
            else if ($params) // The param may directly be the action
            {
                if (method_exists($this, $params))
                {
                    $this->{$params}();
                }
                else pageBroken();
            }
<<<<<<< HEAD
            else // If there are no actions, call the index method
=======
            else if ($params) // The param may directly be the action
>>>>>>> f2ba8ff11d8035e660a1476536d7e75ce670e566
            {
                if (method_exists($this, 'index'))
                {
                    $this->index();
                }
                else pageBroken();
            }
            else // If there are no subsections, call the index method
            {
                $this->index();
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
