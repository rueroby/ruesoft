<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/1/12
 * Time: 7:03 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\controller;

use ruesoft\frmwrk\http\RuesoftHttpRequest;
class BaseController
{
    protected $loader;
    protected $twig;
    protected $request;
    protected $response;
    protected $session;

    public function __construct(){

        \Twig_Autoloader::register();
        $this->loader = new \Twig_Loader_Filesystem(__DIR__."/../../src/dev/view");  // or     $this->loader = new \Twig_Loader_String();
        $this->twig = new \Twig_Environment( $this->loader, array('cache' => __DIR__.'/../../app_dev/cache',
            'auto_reload' => true));

        $this->request = new RuesoftHttpRequest();
    }

    public function get($var){
        switch($var){
            case 'request':
                return $this->request;
            case 'response':
                return $this->response;
            case 'session':
                return $this->session;
        }

        return array();
    }

    public function set($var, $value){
        switch($var){
            case 'request':
                $this->request = $value;
                break;
            case 'response':
                $this->response = $value;
                break;
            case 'session':
                $this->session = $value;
                break;
        }
    }

    public function render($str, $params){
        return $this->twig->render($str, $params);
    }
}
