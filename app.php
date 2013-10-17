<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 9/10/13
 * Time: 12:00 PM
 * To change this template use File | Settings | File Templates.
 */

$config = array(
    '/dev/task/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Task&action=showTwig',
    '/dev/task/demo/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Task&action=demo',
    '/dev/task/demo2' => 'http://localhost:8200/web/dev/app_dev.php?controller=Task&action=demo2',
    '/dev/task/edit' => 'http://localhost:8200/web/dev/app_dev.php?controller=Task&action=edit',
    '/dev/timezone/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Timezone&action=show',
    '/dev/timezone/insert/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Timezone&action=insert',
    '/dev/timezone/list/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Timezone&action=list',
    '/dev/promotion/' => 'http://localhost:8200/web/dev/app_dev.php?controller=Promotion&action=show',
    '/spanish/' => 'http://localhost:8200/web/spanish/app_spanish.php?controller=Study&action=index',
    '/biz/' => 'http://localhost:8200/web/biz/app_dev.php?controller=Biz&action=index'
);

$requestURI = $_SERVER['REQUEST_URI'];

foreach($config as $key=>$value){
    if ($key == $requestURI || $key == $requestURI . "/"){
        header('location: ' . $value);
    }
}

//var_dump($_SERVER);

