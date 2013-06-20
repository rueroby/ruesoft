<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 1:26 PM
 * To change this template use File | Settings | File Templates.
 */

require_once '../../vendor/ruesoftAutoload.php';

if (isset($_GET['controller'])){
    $controller = \ruesoft\frmwrk\dependencyInjection\DIContainer::makeController($loader, '\\ruesoft\\src\\spanish\\controller\\', $_GET['controller']);

    if (isset($_GET['action'])){
        $method = $_GET['action'] . 'Action';

        echo $controller->$method();
    }
}
