<?php

    /**
     * This file handles teh display of broken pages (404)
     */
    class Common_errors_broken_controller extends Common_master_controller
    {
        public function __construct($config = null)
        {
            parent::__construct($config);

            // This is the specific layout we are using
            $this->layoutController = new Common_layouts_general_controller($config);
        }

        /**
         * Display the broken page
         */
        public function view()
        {
            // ================== Get the view

            $errorsBrokenViewModel = new Common_view_Model('/common/errors/broken');  // Pass the view folder and name to the template

            // ================== Organise the views

            header('HTTP/1.1 404 Not Found');

            parent::displayHeader("Error 404 : page does not exist"); // Page header

            $errorsBrokenViewModel->render(); // Display the vendor view

            parent::displayFooter(); // Page footer
        }
    }

?>