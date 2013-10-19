<?php

    /**
     * Class overloading, does not check for files inside folders (controllers/folder/file)
     */

    /**
     * Autoload the controller, model, library and driver files
     * @param $className
     */
    function __autoload($className)
    {
        // Parse out filename where class should be located
        // This supports names like 'Example_Model' as well as 'Example_Two_Model'
        list($suffix, $filename) = preg_split('/_/', strrev($className), 2);

        $filename = strrev($filename);
        $suffix = strrev($suffix);

        // Select the folder where class should be located based on suffix
        switch (strtolower($suffix))
        {
            case 'controller':

                $folder = 'controllers/';
                break;

            case 'model':

                $folder = 'models/';
                break;

            case 'library':

                $folder = 'libraries/';
                break;

            case 'driver':

                $folder = 'libraries/drivers/';
                break;
        }

        // Create the path using folder and filename
        $file = SERVER_ROOT . $folder . strtolower($filename . '_' . $suffix) . '.php';

        // Include or die
        if (file_exists($file))
        {
            require_once($file);
        }
        else
        {
            die("File '$filename' containing class '$className' not found in '$folder'.");
        }
    }