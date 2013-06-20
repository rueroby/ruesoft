<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/23/13
 * Time: 2:18 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\dependencyInjection;

class DIContainer
{
    public static function makeController($loader, $controllerPath, $controller){
        $controllerClass = $controllerPath . $controller . 'Controller';
        try {
            $loader->loadClass($controllerClass);

            return new $controllerClass();
        }
        catch(Exception $error){
            die($error->getMessage());
        }
    }
}
