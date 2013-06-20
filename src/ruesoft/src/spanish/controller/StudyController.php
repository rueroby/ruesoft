<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\spanish\controller;

use ruesoft\frmwrk\controller\BaseController;
use ruesoft\src\spanish\model\Words;
use ruesoft\src\spanish\manager\WordsManager;

class StudyController extends BaseController {
    /* @var $contactInfoManager ContactInfoManager */
    protected $wordsManager;

    public function __construct(){
        $this->view = "/../../src/spanish/view";
        $this->cache = '/../../app_spanish/cache';

        parent::__construct();
    }

    private function getWordsManager() {
        if (!$this->wordsManager){
            $this->wordsManager = WordsManager::getInstance();
        }

        return $this->wordsManager;
    }

    public function indexAction(){
        $params = array();

        $params['words'] = $this->getWordsManager()->getWords();

        return $this->render('study/index.html', $params);
    }

    public function flashAction(){
        $params = array();

        $params['words'] = $this->getWordsManager()->getWords();

        return $this->render('study/flash.html', $params);

    }

}