<?php
   /**
    * The vendors_model will handle all the business logic for the vendors_controller
    */

    class Vendors_model extends Master_model
    {
        /**
         * Fetch a vendor from it's id
         * @param string $vendorId
         * @return array $vendor
         */
        public function getVendor($vendorId)
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

            // Prepare one parameter to be sent with the query
            $params[] = array("name" => "id", "type" => "i", "value" => $vendorId);

            // Prepare query
            $this->dataConnection->prepare($query, $params);

            // Execute query
            $this->dataConnection->execute();

            // Fetch a single record from the database
            $vendor = $this->dataConnection->fetch('array', true);

            return $vendor;
        }

    }
    ?>