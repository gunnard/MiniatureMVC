<?php

    /**
    * Entry point of the application and basic configuration
    */

    // Defines in which folder we are inside www
    define('ROOT_URL', "/MiniatureMVC");

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();

    // Set the relevant timezone
    date_default_timezone_set('America/Montreal');

    require_once('autoload.php'); // Autoload classes in their respective root directory
    require_once('classes/helpers/base_helper.php'); // Base functions

    // Get the config (including the database connection
    $configModel = new Common_config_model();
    $config = $configModel->getConfig();

    require_once('router.php'); // Call the router to redirect to the proper page
?>
