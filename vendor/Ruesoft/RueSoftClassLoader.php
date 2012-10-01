<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/2/12
 * Time: 10:29 AM
 * To change this template use File | Settings | File Templates.
 */
class RueSoftClassLoader
{
    protected $registeredNamespaces;

    function __construct(){
        $this->registeredNameSpaces = array();
    }

    public function register(){
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function registerNamespace($name, $path){
        $this->registeredNamespaces[$name] = $path;
    }

    public function loadClass($className){
        $className = ltrim($className, '\\');
        $fileName = '';
        $namespace = '';

        $lastSepPos = strripos($className, '\\');
        if ($lastSepPos === false){
            $namespace = $this->getNamespaceForClass($className);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        else {
            $namespace = $this->filterNamespace($className, $lastSepPos);
            $className = substr($className, $lastSepPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className).'.php';

        require $fileName;
    }

    private function getNamespaceForClass($className){
        $namespace = '';
        foreach($this->registeredNamespaces as $name => $path){
            if (substr_compare($className, $name, 0, strlen($name)) == 0){
                $namespace = $path;
                break;
            }
        }
        return $namespace;
    }

    private function filterNamespace($className, $lastSepPos){
        $namespace = substr($className, 0, $lastSepPos);
        foreach($this->registeredNamespaces as $name => $path){
            if (substr_compare($namespace, $name, 0, strlen($name)) == 0){
                $namespace = $path . DIRECTORY_SEPARATOR . $namespace;
                break;
            }
        }
        return $namespace;
    }
}
