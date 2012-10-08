<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/6/12
 * Time: 9:55 AM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\controller;

use ruesoft\frmwrk\controller\BaseController;

class PromotionController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function showAction(){
        $params = array();
        return $this->render('promotion/index.html', $params);
    }
}
