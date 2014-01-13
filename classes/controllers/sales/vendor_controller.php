<?php

    /**
     * This file handles the retrieval and serving of vendors
     */
    class Sales_vendor_controller extends Master_controller
    {
        /* @var $vendorsModel sales_vendor_model */
        private $vendorsModel;

        public function __construct($dataConnection)
        {
            parent::__construct($dataConnection);

            // This is the specific layout we are using
            $this->layoutController = new Layouts_general_controller($this->dataConnection);

            // Initialize the models
            $this->vendorsModel = new sales_vendor_model($this->dataConnection);
        }

        /**
         * This is the default function that will be called by router.php
         * It will call a function with the name given in the action parameter
         * EX: vendors/view/1 will call Vendors_controller's view function with p1=1
         * @param $params The GET variables (action, p1, p2)
         */
        public function callAction($params)
        {
            if ($params['action'])
            {
                $this->{$params['action']}($params);
            }
        }

        /**
         * Display the specified vendor information
         * @param $params
         */
        public function view($params)
        {
            $vendorId = $params[1]; // In this context, the first parameter is the vendorId

            // ================== Get the data

            $vendor = $this->vendorsModel->getVendorById($vendorId); // Get a specific vendor from it's ID

            // ================== Get the views and set their variables

            $vendorsAddViewModel = new View_Model('sales/vendors_view');  // Pass the view folder and name to the template
            $vendorsAddViewModel->assign('vendorId' , $vendorId); // Assign a variable
            $vendorsAddViewModel->assign('vendor' , $vendor); // Assign a variable

            // ================== Organise the views

            parent::displayHeader($vendor['firstName'] . "'s sales"); // Page header

            $vendorsAddViewModel->render(); // Display the vendor view

            parent::displayFooter(); // Page footer
        }
    }

?>