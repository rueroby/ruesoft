<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 10/20/12
 * Time: 4:54 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\http;

class RuesoftHttpRequest
{
    protected $_data = array();
    protected $_post = array();
    protected $_get = array();
    protected $_cookie = array();
    protected $_method;

    public function __construct(){
        $this->_data = array_merge($this->_data, $_REQUEST);
        $this->_post = array_merge($this->_post, $_POST);
        $this->_get = array_merge($this->_get, $_GET);
        $this->_cookie = array_merge($this->_cookie, $_COOKIE);

        $this->_method = $_SERVER['REQUEST_METHOD'];
    }

    public function getMethod(){
        return $this->_method;
    }

    public function getQuery(){
        return $this->_get;
    }

    public function getPost(){
        return $this->_post;
    }

    public function getQueryVar($var){
        if (isset($this->_get[$var])){
            return $this->_get[$var];
        }

        return null;
    }

    public function getPostVar($var){
        if (isset($this->_post[$var])){
            return $this->_post[$var];
        }

        return null;
    }
}
