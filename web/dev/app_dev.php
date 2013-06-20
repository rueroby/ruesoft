<?php

require_once '../../vendor/ruesoftAutoload.php';
//require_once '../../src/ruesoft/frmwrk/dependencyinjection/DIContainer.php';

if (isset($_GET['controller'])){
    $controller = \ruesoft\frmwrk\dependencyinjection\DIContainer::makeController($loader, '\\ruesoft\\src\\dev\\controller\\', $_GET['controller']);

    if (isset($_GET['action'])){
        $method = $_GET['action'] . 'Action';

        echo $controller->$method();
    }
}


//if (isset($_GET['controller'])){
//    $controller = $_GET['controller'];
//
//    if (isset($_GET['action'])){
//        $action = $_GET['action'];
//
//        $controllerClass = '\\ruesoft\\src\\dev\\controller\\' . $controller . 'Controller';
//        try {
//            $loader->loadClass($controllerClass);
//
//            $instance = new $controllerClass();
//
//            $method = $action . 'Action';
//
//            echo $instance->$method();
//        }
//        catch(Exception $error){
//            die($error->getMessage());
//        }
//    }
//    else {
//        die('Invalid or missing action');
//    }
//}
//else {
//    die('Invalid or missing controller name!');
//}

