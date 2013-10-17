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

