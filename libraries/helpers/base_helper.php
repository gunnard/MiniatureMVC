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

    /**
     * Return yes if the string contains the substring
     * @param $string
     * @param $substring
     * @return bool
     */
    function stringContains($string, $substring)
    {
        if (strpos($string, $substring) !== false)
        {
            return true;
        }
        else
        {
            return false;
        }
    }