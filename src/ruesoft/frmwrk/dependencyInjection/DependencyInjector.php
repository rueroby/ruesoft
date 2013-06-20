<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/24/13
 * Time: 12:06 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\dependencyInjection;

class DependencyInjector extends DIContainer
{
    protected $values = array();

//    public static function makeController($loader, $controllerPath, $controller){
//        $controllerClass = $controllerPath . $controller . 'Controller';
//        try {
//            $loader->loadClass($controllerClass);
//
//            return new $controllerClass();
//        }
//        catch(Exception $error){
//            die($error->getMessage());
//        }
//    }

    public function __construct(){}

    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    public function __get($key){
        if (is_callable($this->values[$key])){
            return $this->values[$key]($this);
        }
        else {
            return $this->values[$key];
        }
    }

    public function shared($func){
        return function($this) use($func){
            static $instance;

            if (is_null($instance)){
                $instance = $func($this);
            }

            return $instance;
        };
    }
}
