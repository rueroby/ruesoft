<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 1:23 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\app_spanish;
use \ruesoft\frmwrk\dependencyInjection\DependencyInjector;

require_once '../vendor/ruesoftAutoload.php';
require_once './config/config.php';

class AppKernel {
    protected $container;

    public function __construct(){
        $this->container = new DependencyInjector($config);
        $this->container->view = "";
        $this->container->cache = "";

        \Twig_Autoloader::register();
        $this->loader = new \Twig_Loader_Filesystem(__DIR__.$this->view);  // or     $this->loader = new \Twig_Loader_String();
        $this->twig = new \Twig_Environment( $this->loader, array('cache' => __DIR__.$this->cache,
            'auto_reload' => true));

        $this->request = new RuesoftHttpRequest();
    }
}