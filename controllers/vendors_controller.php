<?php
/**
 * This file handles the retrieval and serving of vendors
 */
class Vendors_Controller extends Master_controller
{
    // Name of the main view for this controller
    public $template = 'vendors';

    /**
     * This is the default function that will be called by router.php
     * It will call a function with the name given in the action parameter
     * EX: vendors/view/1 will call Vendors_controller's view function with p1=1
     * @param $params The GET variables (action, p1, p2)
     */
    public function main($params)
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
        $vendorId = $params[1];

        $vendors_model = new Vendors_Model($this->dataConnection);

        // Get a specific vendor from it's ID
        $vendor = $vendors_model->getVendor($vendorId);

        // Pass the view name to the template
        $view_model = new View_Model($this->template);

        // Assign the $vendor variable to the view
        $view_model->assign('vendor' , $vendor);

        // Display the view
        $view_model->render();
    }


}

?>