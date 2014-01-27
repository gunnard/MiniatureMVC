<?php

    /**
    * Basic includes and configurations
    */

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once('autoload.php'); // Autoload classes in their respective root directory
    require_once('classes/helpers/base_helper.php'); // Base functions

    // Get the config (including the database connection
    $configModel = new Common_config_model();
    $config = $configModel->getConfig();

