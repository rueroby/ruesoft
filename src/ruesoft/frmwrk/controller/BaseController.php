<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/1/12
 * Time: 7:03 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\controller;


class BaseController
{
    protected $loader;
    protected $twig;

    public function __construct(){

        \Twig_Autoloader::register();
        $this->loader = new \Twig_Loader_Filesystem("D:\\websites\\ruesoft\\src\\ruesoft\\src\\dev\\view");  // or     $this->loader = new \Twig_Loader_String();
        $this->twig = new \Twig_Environment( $this->loader, array('cache' => 'D:\\websites\\ruesoft\\src\\ruesoft\\app_dev\\cache',
            'auto_reload' => true));
    }

    public function render($str, $params){
        return $this->twig->render($str, $params);
    }
}
