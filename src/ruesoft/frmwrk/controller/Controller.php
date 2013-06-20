<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/30/13
 * Time: 11:22 AM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\controller;

class Controller
{
    protected $twig;
    protected $request;
    protected $response;
    protected $session;
    protected $container; // dependency injector

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

    public function setTwig($twig){
        $this->twig = $twig;
    }

    public function setContainer($c){
        $this->container = $c;
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


