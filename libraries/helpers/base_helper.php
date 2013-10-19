<?php

    /**
     * Display object content properly and die if requested
     * @param $object
     * @param bool $kill
     */
    function pp($object, $kill = false)
    {
        echo ("<pre>");
        print_r($object);
        echo ("</pre>");

        if ($kill)
        {
            die();
        }
    }