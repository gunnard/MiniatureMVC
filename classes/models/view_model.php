<?php
/**
 * Handles the view functionality of our MVC framework
 */
class View_Model
{
    /**
     * Holds variables assigned to template
     */
    private $data = array();

    /**
     * Holds render status of view.
     */
    private $render = FALSE;

    /**
     * Accepts a template to load
     */
    public function __construct($view)
    {
        $file = 'views/' . strtolower($view . '_' . 'view') . '.php';

        if (file_exists($file))
        {
            $this->render = $file;
        }
    }

    /**
     * Receive assignments from controller and stores in local data array
     * @param $variable
     * @param $value
     */
    public function assign($variable , $value)
    {
        $this->data[$variable] = $value;
    }

    /**
     * Render the output directly to the page, or optionally, return the generated output to caller.
     * @param bool $direct_output
     * @return string
     */
    public function render($direct_output = TRUE)
    {
        // Turn output buffering on, capturing all output
        if ($direct_output !== TRUE)
        {
            ob_start();
        }

        // Parse data variables into local variables
        $data = $this->data;

        // Get view
        include($this->render);

        // Get the contents of the buffer and return it
        if ($direct_output !== TRUE)
        {
            return ob_get_clean();
        }
    }
}

?>