<?php

    /**
     * Autoload classes (controller, model, library and driver)
     * @param $className
     */
    function __autoload($className)
    {
        // Split the suffix from the file name ("sales/vendor" . "model.php")
        list($suffix, $filename) = preg_split('/_/', strrev($className), 2);

        $suffix = strrev($suffix);
        $filename = strrev($filename);

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

        // Generate file name using this logic :
        // "model" . "sales/vendor" . '_' . "model.php"
        $file = $folder . strtolower($filename . '_' . $suffix) . '.php';

        // If there are underscores, the file may contain an underscore OR is in a folder
        // Replace underscores by slashes until we find the file or there are no more underscores
        while (mb_substr_count($filename, "_") >= 1)
        {
            if (file_exists($file))
            {
                break;
            }
            else
            {
                // Replace first underscore found by a slash
                $filename = preg_replace('/_/', '/', $filename, 1);
                $file = $folder . strtolower($filename . '_' . $suffix) . '.php';
            }
        }

        // Include or give the error
        if (file_exists($file))
        {
            require_once($file);
        }
        else
        {
            die("File '$folder$filename' containing class '$className' not found.");
        }
    }