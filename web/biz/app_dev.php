<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/22/13
 * Time: 5:04 PM
 * To change this template use File | Settings | File Templates.
 */

require_once '../../vendor/ruesoftAutoload.php';

if (isset($_GET['controller'])){
    $controller = \ruesoft\frmwrk\dependencyInjection\DIContainer::makeController($loader, '\\ruesoft\\src\\biz\\controller\\', $_GET['controller']);

    if (isset($_GET['action'])){
        $method = $_GET['action'] . 'Action';

        echo $controller->$method();
    }
}
