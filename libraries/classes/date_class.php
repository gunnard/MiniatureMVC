<?php

    /**
     * Provides extended methods in relation to dates
     */
    class Date_Class
    {
        protected $defaultDateFormat = "Y-m-d";

        /**
         * Return the date using the default format
         * @return date
         */
        public function getCurrentDate()
        {
            return date($this->defaultDateFormat);
        }
    }

?>