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

    public function convertAction(){
        $request = $this->request;

        $params = array();
        $params['field1'] = 'enter something here!';
        $params['field2'] = '';

        if ($request->getMethod() == 'POST'){
            $params['field2'] = htmlspecialchars($request->getPostVar('field1'));
        }

        return $this->render('task/page.html', $params);
    }

    public function editAction(){
        $request = $this->request;

        $params = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $request->getPost();
            //var_dump($data);exit();
        }

        return $this->render('task/edit.html', $params);
    }

    public function demoAction(){
        $request = $this->request;

        $params = array();

        $content = '<h2>TinyMCE Editor Demo</h2>';
        $content .= '<p>This text is used to initialize the textarea that will be converted by TinyMCE.</p>';
        $content .= '<ul>';
        $content .= '<li>List Item 1</li>';
        $content .= '<li>List Item 2</li>';
        $content .= '<li>List Item 3</li>';
        $content .= '</ul>';
        $content .= '<p>This is the last line.<strong>This sentence is highlighted.</strong></p>';

        $params['content'] = $content;

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $request->getPost();
            var_dump($data['editor']);exit();
        }

        return $this->render('task/demo.html', $params);
    }

    public function demo2Action(){
        $request = $this->request;
        $params = array();

        $content = '<h2>TinyMCE Editor Demo</h2>';
        $content .= '<p>This text is used to initialize the textarea that will be converted by TinyMCE.</p>';
        $content .= '<ul>';
        $content .= '<li>List Item 1</li>';
        $content .= '<li>List Item 2</li>';
        $content .= '<li>List Item 3</li>';
        $content .= '</ul>';
        $content .= '<p>This is the last line.<strong>This sentence is highlighted.</strong></p>';

        $params['content'] = $content;

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $request->getPost();
            var_dump($data['editor']);exit();
        }

        return $this->render('task/demo2.html', $params);
    }
}
