<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 9/1/12
 * Time: 7:06 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\controller;

use ruesoft\frmwrk\controller\BaseController;

class TaskController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function showTwigAction(){
        //return $this->render('Hello {{ name }}', array('name' => 'Rudy'));
        $params = array();

        $rows = array();
        array_push($rows, array('apple', 'banana', 'currants'));
        array_push($rows, array('Audi', 'Bentley', 'Cadillac'));
        array_push($rows, array('Apple', 'Google', 'FaceBook'));
        $params['rows'] = $rows;
        $params['name'] = 'Rudy';

        return $this->render('task/index.html', $params);
    }
}
