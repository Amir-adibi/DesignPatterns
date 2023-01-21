<?php

namespace app\core;

class Request
{
    /*
     * we need a function that gets the value of "REQUEST_URI" from
     * $_SERVER super global variable and returns everything before '?'
     * in the string.
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);

    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


}