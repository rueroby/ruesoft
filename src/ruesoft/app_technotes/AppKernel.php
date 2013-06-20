<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/24/13
 * Time: 7:49 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\app_technotes;

use \ruesoft\frmwrk\Kernel;
use \ruesoft\frmwrk\dependencyInjection\DependencyInjector;
use \ruesoft\frmwrk\http\RuesoftHttpRequest;

class AppKernel extends Kernel
{
    protected $container;
    protected $config;
    protected $httpRequest;

    public function __construct($config){
        $this->config = \Symfony\Component\Yaml\Yaml::parse($config);
    }

    public function getDIContainer(){
        if ($this->container == null){
            $this->container = new DependencyInjector();
            $this->container->path = __DIR__;
            $this->container->view = '../../src/ruesoft/src/technotes/view';
            $this->container->cache = '../../src/ruesoft/app_technotes/cache';
            $this->container->twigLoader = function($c){
                \Twig_Autoloader::register();
                return new \Twig_Loader_Filesystem($c->path . $c->cache);  // or     $this->loader = new \Twig_Loader_String();
            };
            $this->container->twigEnv = function($c){
                $loader = $c->twigLoader($c);
                return new \Twig_Environment($loader,
                    array('cache' => $c->path . $c->view, 'auto_reload' => true));
            };

            $this->container->httpRequest = $this->container->shared(function($c){
                return new RuesoftHttpRequest();
            });

        }

        return $this->container;
    }

    public function handleRequest(){
        $this->getDIContainer();

        $this->httpRequest = $this->container->httpRequest;
    }
}
