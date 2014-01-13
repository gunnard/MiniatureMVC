<?php

    /**
    * Basic includes and configurations
    */

    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once('autoload.php'); // Autoload classes in their respective root directory
    require_once('classes/helpers/base_helper.php'); // Base functions

    // Database connection
    $connectionInfo = array(
        "host" => "127.0.0.1",
        "user" => "root",
        "password" => "root",
        "database" => "miniatureMVC",
        "port" => null,
        "socket" => null
    );

    $dataConnection = new MysqlImproved_Driver();
    $dataConnection->connect($connectionInfo);


