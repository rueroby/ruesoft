<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/6/12
 * Time: 6:42 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

use ruesoft\frmwrk\model\BaseQuery;
use ruesoft\src\dev\model\TimeZone;

class BaseTimeZoneQuery extends BaseQuery
{


    protected function __construct(){
        $this->stmt = "SELECT";
        $this->select = array("*");
        $this->fromClause = " FROM ".BaseTimeZone::TABLE_NAME;

        $this->defaultSelect .= " ";
        $this->defaultSelect .= BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER .BaseTimeZone::COLUMN_TIME_ZONE_ID;
        $prefix = self::COMMA_SPACE_SEPARATOR;
        $this->defaultSelect .= $prefix . BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER .BaseTimeZone::COLUMN_OLSON_CODE;
        $this->defaultSelect .= $prefix . BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER .BaseTimeZone::COLUMN_GMT_TIME_ZONE;
    }

    public static function create() {
        return new BaseTimeZoneQuery();
    }

    public function filterByTimeZoneId($id, $filterOp = null){
        if (!empty($id)){
            $column = BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER . BaseTimeZone::COLUMN_TIME_ZONE_ID;

            if ($filterOp != null){
                $this->filterBy($column, $id, $filterOp);
            }
            else {
                $this->filterBy($column, $id);
            }
        }

        return $this;
    }

    public function filterByGMTTimeZone($gmtTimeZone, $filterOp = null){
        if (!empty($gmtTimeZone)){
            $column = BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER . BaseTimeZone::COLUMN_GMT_TIME_ZONE;

            if ($filterOp != null){
                $this->filterBy($column, $gmtTimeZone, $filterOp);
            }
            else {
                $this->filterBy($column, $gmtTimeZone);
            }
        }

        return $this;
    }

    public function filterByOlsonCode($olsonCode, $filterOp = null){
        if (!empty($olsonCode)){
            $column = BaseTimeZone::TABLE_NAME . self::DOT_DELIMITER . BaseTimeZone::COLUMN_OLSON_CODE;

            if ($filterOp != null){
                $this->filterBy($column, $olsonCode, $filterOp);
            }
            else {
                $this->filterBy($column, $olsonCode);
            }
        }
        return $this;
    }

    public function find(){
        if ($db = new PDO('sqlite:'.BaseTimeZone::DATABASE)){
            $this->query = $this->stmt . $this->getSelectedColumns() . $this->fromClause . $this->getWhereClause();
            var_dump($this->query); exit();
            $result = $db->query($this->query, SQLITE_ASSOC, $this->err_msg);
            if ($result === false){
                print_r($db->errorInfo());
            }

            $timeZoneColl = array();

            /* @var $result PDOStatement */
            $rows = $result->fetchAll();
            foreach($rows as $row){
                $timeZone = new TimeZone();
                $timeZone->setTimeZoneId($row[BaseTimeZone::COLUMN_TIME_ZONE_ID]);
                $timeZone->setOlsonCode($row[BaseTimeZone::COLUMN_OLSON_CODE]);
                $timeZone->setGMTTimeZone($row[BaseTimeZone::COLUMN_GMT_TIME_ZONE]);

                array_push($timeZoneColl, $timeZone);
            }

            return $timeZoneColl;
        }
        else {
            print_r($db->errorInfo());
        }

        return null;
    }

    public function findPk($pk){
        $this->filterByTimeZoneId($pk);

        return $this->find();
    }
}
