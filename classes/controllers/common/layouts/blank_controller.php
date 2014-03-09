<?php

    /**
     * This file handles the serving of layout views
     */
    class Common_layouts_blank_controller extends Common_master_controller
    {
        /**
         * Display the header
         * @param $title
         */
        public function header($title)
        {
            $layoutHeaderViewModel = new Common_view_model('/common/layouts/blank_header');

            $layoutHeaderViewModel->assign('title' , $title);

            $layoutHeaderViewModel->render();
        }

        /**
         * Display the footer
         */
        public function footer()
        {
            $layoutFooterViewModel = new Common_view_model('/common/layouts/blank_footer');

            $layoutFooterViewModel->render();
        }
    }

?>