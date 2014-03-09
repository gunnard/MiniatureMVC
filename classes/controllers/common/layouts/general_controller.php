<?php

    /**
     * This file handles the serving of layout views
     */
    class Common_layouts_general_controller extends Common_master_controller
    {
        function __construct($config)
        {
            parent::__construct($config);
        }

        /**
         * Display the header
         * @param $title
         */
        public function header($title)
        {
            $generalHeaderViewModel = new Common_view_model('/common/layouts/general_header');

            $generalHeaderViewModel->assign('title' , $title);

            $generalHeaderViewModel->render();
        }

        /**
         * Display the footer
         */
        public function footer()
        {
            $generalFooterViewModel = new Common_view_model('/common/layouts/general_footer');

            // Get the current date from the date class
            $dateHelper = new date_helper();
            $currentDate = $dateHelper->getCurrentDate();
            $generalFooterViewModel->assign('current_date' , $currentDate);

            $generalFooterViewModel->render();
        }
    }

?>