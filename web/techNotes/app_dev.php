<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/28/13
 * Time: 10:15 PM
 * To change this template use File | Settings | File Templates.
 */

require_once '../../vendor/ruesoftAutoload.php';

$kernel = new \ruesoft\app_technotes\AppKernel('../../src/ruesoft/app_technotes/config/config.yml');

//if (isset($_GET['controller'])){
//    $controller = \ruesoft\frmwrk\dependencyInjection\DependencyInjector::makeController($loader, '\\ruesoft\\src\\technotes\\controller\\', $_GET['controller']);
//
//    if (isset($_GET['action'])){
//        $method = $_GET['action'] . 'Action';
//
//        echo $controller->$method();
//    }
//}

$kernel->handleRequest();

var_dump($kernel);