<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 12:42 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\spanish\model\sqlom;

use ruesoft\frmwrk\model\SqlitePDO;

class BaseWords {
    //const DATABASE = "D:\\websites\\ruesoft\\db\\ruesoft.sqlite";
    const DATABASE = "/Users/rudy/Sites/ruesoft/db/ruesoft.sqlite";
    const TABLE_NAME = 'words';
    const COLUMN_WORD_ID = 'word_id';
    const COLUMN_SPANISH = 'spanish';
    const COLUMN_ENGLISH = 'english';

    protected $wordId;
    protected $spanish;
    protected $english;

    public function __construct($spanish = null, $english = null){
        $this->spanish = $spanish;
        $this->english = $english;
    }

    public function getWordId(){
        return $this->wordId;
    }

    public function getSpanish(){
        return $this->spanish;
    }

    public function getEnglish(){
        return $this->english;
    }


    public function setWordId($value){
        $this->wordId = $value;
    }

    public function setSpanish($value){
        $this->spanish = $value;
    }

    public function setEnglish($value){
        $this->english = $value;
    }

    public function save(){
        if ($db = SqlitePDO::open(self::DATABASE))
        {
            $stmt = 'CREATE TABLE IF NOT EXISTS ';
            $stmt .= self::TABLE_NAME;
            $stmt .= " (word_id int, spanish varchar (180), english varchar (180), primary key (word_id))";
            $ok = $db->exec($stmt);
            if ($ok === false){
                print_r("SQL stmt: " . $stmt);
                print_r($db->errorInfo());
                exit();
            }

            if (!$this->contactInfoId){
                $stmt = "INSERT INTO ".self::TABLE_NAME;
                $stmt .= " VALUES (NULL";
                $stmt .= ", '". $this->spanish;
                $stmt .= "', '". $this->english;
                $stmt .= "');";
                $count = $db->exec($stmt);
                if ($count === false){
                    print_r('Exec stmt: '.$stmt);
                    print_r($db->errorInfo());
                }
            }
            else { // this is an update
                $stmt = "UPDATE ".self::TABLE_NAME." SET ". self::COLUMN_SPANISH ."='". $this->spanish;
                $stmt .= "', ". self::COLUMN_ENGLISH ."='". $this->english;
                $stmt .= "' WHERE ". self::COLUMN_WORD_ID . "=". $this->wordId;
                $stmt .= ";";

                $count = $db->exec($stmt);
                if ($count === false){
                    print_r('Exec stmt: '.$stmt);
                    print_r($db->errorInfo());
                }
            }
        }
        else {
            print_r($db->errorInfo());
        }
    }

    public function delete(){
        if (is_int($this->contactInfoId)){
            if ($db = SqlitePDO::open(self::DATABASE))
            {
                $stmt = "DELETE FROM ".self::TABLE_NAME." WHERE ".self::COLUMN_WORD_ID."=".$this->wordId . ";";
                $count = $db->exec($stmt, $this->err_msg);
                if ($count === false){
                    print_r($db->errorInfo());
                }
            }

        }
    }
}