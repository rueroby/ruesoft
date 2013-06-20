<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 4:26 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\spanish\manager;

use ruesoft\src\spanish\model\Words;
use ruesoft\src\spanish\model\WordsQuery;


class WordsManager
{
    private static $instance = null;
    private function __construct(){}

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new WordsManager();
        }

        return self::$instance;
    }

    public function getWords(){
        return WordsQuery::create()->find();
    }

    public function getWordForId($id){
        return WordsQuery::create()->findPk($id);
    }

    public function saveWords(&$word){
        if ($word != null && $word instanceof Words){
            $word->save();
        }
    }
}