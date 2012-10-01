<?php

require_once '../../vendor/ruesoftAutoload.php';


if (isset($_GET['controller'])){
    $controller = $_GET['controller'];

    if (isset($_GET['action'])){
        $action = $_GET['action'];

        $controllerClass = '\\ruesoft\\src\\dev\\controller\\' . $controller . 'Controller';
        try {
            $loader->loadClass($controllerClass);

            $instance = new $controllerClass();

            $method = $action . 'Action';

            echo $instance->$method();
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
    else {
        die('Invalid or missing action');
    }
}
else {
    die('Invalid or missing controller name!');
}

