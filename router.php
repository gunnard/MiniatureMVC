<?php

    // If this is the initial root page
    if (!isset($_GET['section']))
    {
        // Redirect to your login page here
    }

    // There's no subsection
    if (!isset($_GET['subsection']))
    {
        pageBroken();
    }

    $section = $_GET['section'];
    $subSection = $_GET['subsection'];

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
    $myClassName = $section . '_' . $subSection .  "_controller";

    /* @var $controller common_master_controller */
    // Instantiate the class with the dynamic class name
    $controller = new $myClassName($config);

    // Once we have the controller instantiated, execute the default function
    // Pass any GET variables to the main method
    $controller->callAction($params);

?>