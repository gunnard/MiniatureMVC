<?php

    /**
     * This file handles the retrieval and serving of vendors
     */
    class Sales_vendor_controller extends Common_master_controller
    {
        private $vendorsModel;

        public function __construct($config)
        {
            parent::__construct($config);

            // This is the specific layout we are using
            $this->layoutController = new Common_layouts_general_controller($this->config);

            // Initialize the models
            $this->vendorsModel = new sales_vendor_model($this->config);
        }

        /**
         * Display the specified vendor information
         * @param $params
         */
        public function view($params)
        {
            if (isset($params[1])) // If the vendorId is sent in parameters
            {
                $vendorId = $params[1];
            }
            else pageBroken();

            // ================== Get the data

            $vendor = $this->vendorsModel->getVendorById($vendorId); // Get a specific vendor from it's ID

            // ================== Get the views and set their variables

            $vendorsAddViewModel = new Common_view_Model('/sales/vendors');  // Pass the view folder and name to the template
            $vendorsAddViewModel->assign('vendorId' , $vendorId); // Assign a variable
            $vendorsAddViewModel->assign('vendor' , $vendor); // Assign a variable

            // ================== Organise the views

            parent::displayHeader($vendor['firstName'] . "'s sales"); // Page header

            $vendorsAddViewModel->render(); // Display the vendor view

            parent::displayFooter(); // Page footer
        }
    }

?>