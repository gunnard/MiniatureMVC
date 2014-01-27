<?php

    /**
     * This file handles the serving of layout views
     */
    class Common_layouts_general_controller extends Common_master_controller
    {
        /**
         * Display the header
         * @param $title
         */
        public function header($title)
        {
            $vendorsAddViewModel = new Common_view_Model('/common/layouts/general_header');

            $vendorsAddViewModel->assign('title' , $title);

            $vendorsAddViewModel->render();
        }

        /**
         * Display the footer
         */
        public function footer()
        {
            $vendorsAddViewModel = new Common_view_Model('/common/layouts/general_footer');

            // Get the current date from the date class
            $dateHelper = new date_helper();
            $currentDate = $dateHelper->getCurrentDate();
            $vendorsAddViewModel->assign('current_date' , $currentDate);

            $vendorsAddViewModel->render();
        }
    }

?>