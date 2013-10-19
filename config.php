<?php

    /**
    * Basic includes and configurations
    */

    // Autoload classes in their respective root directory
    require_once(SERVER_ROOT . 'autoload.php');

    // Base functions
    require_once(SERVER_ROOT . 'libraries/helpers/base_helper.php');

    // Enable error reporting (disable for the live version)
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    // Database connection
    $dataConnection = new MysqlImproved_Driver();
    $dataConnection->connect();


