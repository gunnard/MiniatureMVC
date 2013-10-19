<?php

    /**
    * Creator: Dany Caissy
    * Created on : 13-10-03
    * Description : Add all configuration here
    */

    $section = $_GET['section'];

    $params = null;
    if (isset($_GET["action"]))
    {
        $params['action'] = $_GET["action"];
    }

    $currentParam = 1;
    while (isset($_GET["p" . $currentParam]))
    {
        $params[$currentParam] = $_GET["p" . $currentParam];
        $currentParam++;
    }

    // Get the name of the controller class
    $myClassName = $section . "_controller";

    // Instantiate the class with the dynamic class name
    $controller = new $myClassName($dataConnection);

    // Once we have the controller instantiated, execute the default function
    // Pass any GET variables to the main method
    $controller->main($params);
?>