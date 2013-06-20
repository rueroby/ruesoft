<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 5/26/13
 * Time: 12:54 PM
 * To change this template use File | Settings | File Templates.
 */

namespace ruesoft\src\spanish\model\sqlom;
namespace ruesoft\src\spanish\model\sqlom;

use ruesoft\frmwrk\model\BaseQuery;
use ruesoft\frmwrk\model\SqlitePDO;
use ruesoft\src\spanish\model\Words;


class BaseWordsQuery extends BaseQuery {
    protected function __construct(){
        $this->stmt = "SELECT";
        $this->select = array("*");
        $this->fromClause = " FROM ".BaseWords::TABLE_NAME;

        $this->defaultSelect .= " ";
//        $this->defaultSelect .= BaseWords::TABLE_NAME . self::DOT_DELIMITER .BaseWords::COLUMN_WORD_ID;
        $this->defaultSelect .= BaseWords::TABLE_NAME . self::DOT_DELIMITER ."_ROWID_";
        $prefix = self::COMMA_SPACE_SEPARATOR;
        $this->defaultSelect .= $prefix . BaseWords::TABLE_NAME . self::DOT_DELIMITER .BaseWords::COLUMN_SPANISH;
        $this->defaultSelect .= $prefix . BaseWords::TABLE_NAME . self::DOT_DELIMITER .BaseWords::COLUMN_ENGLISH;
    }

    public static function create() {
        return new BaseWordsQuery();
    }

    public function filterByWordId($wordId, $filterOp = null){
        if (!empty($wordId)){
            $column = BaseWords::TABLE_NAME . self::DOT_DELIMITER . BaseWords::COLUMN_WORD_ID;

            if ($filterOp != null){
                $this->filterBy($column, $wordId, $filterOp);
            }
            else {
                $this->filterBy($column, $wordId);
            }
        }

        return $this;
    }

    public function orderByWordId(){
        $this->orderBy(BaseWords::COLUMN_WORD_ID, BaseWords::TABLE_NAME);

        return $this;
    }

    public function filterBySpanish($spanish, $filterOp = null){
        if (!empty($spanish)){
            $column = BaseWords::TABLE_NAME . self::DOT_DELIMITER . BaseWords::COLUMN_SPANISH;

            if ($filterOp != null){
                $this->filterBy($column, $spanish, $filterOp);
            }
            else {
                $this->filterBy($column, $spanish);
            }
        }

        return $this;
    }

    public function orderBySpanish(){
        $this->orderBy(BaseWords::COLUMN_SPANISH, BaseWords::TABLE_NAME);

        return $this;
    }

    public function filterByEnglish($english, $filterOp = null){
        if (!empty($english)){
            $column = BaseWords::TABLE_NAME . self::DOT_DELIMITER . BaseWords::COLUMN_ENGLISH;

            if ($filterOp != null){
                $this->filterBy($column, $english, $filterOp);
            }
            else {
                $this->filterBy($column, $english);
            }
        }

        return $this;
    }

    public function orderByEnglish(){
        $this->orderBy(BaseWords::COLUMN_ENGLISH, BaseWords::TABLE_NAME);

        return $this;
    }


    public function find(){
        if ($db = SqlitePDO::open(BaseWords::DATABASE)){
            $this->query = $this->stmt . $this->getSelectedColumns() . $this->getFromClause() . $this->getWhereClause() . $this->getOrderByClause();

            $result = $db->query($this->query);
            if ($result === false){
                print_r($db->errorInfo());
            }
            else {
                $coll = array();

                /* @var $result PDOStatement */
                $rows = $result->fetchAll();
//                var_dump($rows);
                foreach($rows as $row){
                    $contactInfo = new Words();
                    $contactInfo->setWordId($row[BaseWords::COLUMN_WORD_ID]);
                    $contactInfo->setSpanish($row[BaseWords::COLUMN_SPANISH]);
                    $contactInfo->setEnglish($row[BaseWords::COLUMN_ENGLISH]);

                    array_push($coll, $contactInfo);
                }

                return $coll;
            }
        }
        else {
            print_r($db->errorInfo());
        }

        return null;
    }

    public function findPk($pk){
        $this->filterByWordId($pk);

        $coll = $this->find();
        if ($coll) return $coll[0];
        return null;
    }
}