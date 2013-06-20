<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 1/22/13
 * Time: 7:26 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\biz\controller;

use ruesoft\frmwrk\controller\BaseController;

class BizController extends BaseController
{
    public function __construct(){
        $this->view = "/../../src/biz/view";
        $this->cache = '/../../app_biz/cache';

        parent::__construct();
    }

    public function indexAction(){
        $params = array();

        $params['welcome'] = "Welcome to RueSoft.biz!";
        $params['purpose'] = "This site contains a catalog of marketing information and materials, for both online and offline marketing. There are also links to catalogs of retail items that can be purchased online.";

        return $this->render('biz/index.html', $params);
    }

    public function joinAction(){
        $params = array();

        return $this->render('biz/join.html', $params);
    }

    public function loginAction(){
        $params = array();

        return $this->render('biz/login.html', $params);
    }

    public function lostpwAction(){
        $params = array();

        return $this->render('biz/lostpw.html', $params);
    }
}
