<?php

    /**
     * This file handles the serving of layout views
     */
    class Layouts_general_controller extends Master_controller
    {
        /**
         * Display the header
         * @param $title
         */
        public function header($title)
        {
            $vendorsAddViewModel = new View_Model('layouts/general_header');

            $vendorsAddViewModel->assign('title' , $title);

            $vendorsAddViewModel->render();
        }

        /**
         * Display the footer
         */
        public function footer()
        {
            $vendorsAddViewModel = new View_Model('layouts/general_footer');

            // Get the current date from the date class
            $dateClass = new date_class();
            $currentDate = $dateClass->getCurrentDate();
            $vendorsAddViewModel->assign('current_date' , $currentDate);

            $vendorsAddViewModel->render();
        }
    }

?>