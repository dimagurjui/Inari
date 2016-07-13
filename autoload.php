<?php

function getFile ($object, $location)
{
    $filename = $object . '.php';
    return ROOT . DS . $location . DS . $filename;
}

function __autoload($object) 
{
        $locations = ['components', 'controllers', 'models'];
        foreach ($locations as $location)
        {
            $file = getFile($object, $location);
            $result = file_exists($file) ? require_once ($file) : false;
        }
        return $result;
}
