<?php
    /**
    * The vendors_model will handle all the business logic for the vendors_controller
    */
    class Sales_vendor_model extends Common_master_model
    {
        /**
         * Fetch a vendor from it's id
         * @param string $vendorId
         * @return array $vendor
         */
        public function getVendorById($vendorId)
        {
            $query = "
                        SELECT
                            *
                        FROM
                            `vendors`
                        WHERE
                            `id` = ?
                        ;
                     ";

            // Prepare parameters to bind to the query, they must be in the same order as the query
            $params[] = array("name" => "id", "type" => "i", "value" => $vendorId);

            $this->config['data_connection']->prepare($query, $params); // Prepare query

            $vendor = $this->config['data_connection']->fetch('array', true); // Fetch a single record from the database

            return $vendor;
        }

    }
    ?>