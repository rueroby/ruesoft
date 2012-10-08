<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/7/12
 * Time: 11:41 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

use ruesoft\frmwrk\model\BaseQuery;
use ruesoft\src\dev\model\UtcOlsonMap;

class BaseUtcOlsonMapQuery extends BaseQuery
{
    protected function __construct(){
        $this->stmt = "SELECT";
        $this->select = array("*");
        $this->fromClause = " FROM ".BaseUtcOlsonMap::TABLE_NAME;

        $this->defaultSelect .= " ";
        $this->defaultSelect .= BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER .BaseUtcOlsonMap::COLUMN_UTC_OLSON_MAP_ID;
        $prefix = self::COMMA_SPACE_SEPARATOR;
        $this->defaultSelect .= $prefix . BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER .BaseUtcOlsonMap::COLUMN_COUNTRY;
        $this->defaultSelect .= $prefix . BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER .BaseUtcOlsonMap::COLUMN_OLSON_CODE;
        $this->defaultSelect .= $prefix . BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER .BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE;
        $this->defaultSelect .= $prefix . BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER .BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE_MAP;
    }

    public static function create() {
        return new BaseUtcOlsonMapQuery();
    }

    const COLUMN_OLSON_CODE = 'olson_code';
    const COLUMN_GMT_TIME_ZONE_MAP = 'gmt_time_zone_map';

    public function filterByUtcOlsonMapId($utcOlsonMapId, $filterOp = null){
        if (!empty($utcOlsonMapId)){
            $column = BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER . BaseUtcOlsonMap::COLUMN_UTC_OLSON_MAP_ID;

            if ($filterOp != null){
                $this->filterBy($column, $utcOlsonMapId, $filterOp);
            }
            else {
                $this->filterBy($column, $utcOlsonMapId);
            }
        }

        return $this;
    }

    public function filterByCountry($country, $filterOp = null){
        if (!empty($country)){
            $column = BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER . BaseUtcOlsonMap::COLUMN_COUNTRY;

            if ($filterOp != null){
                $this->filterBy($column, $country, $filterOp);
            }
            else {
                $this->filterBy($column, $country);
            }
        }

        return $this;
    }

    public function filterByOlsonCode($olsonCode, $filterOp = null){
        if (!empty($olsonCode)){
            $column = BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER . BaseUtcOlsonMap::COLUMN_OLSON_CODE;

            if ($filterOp != null){
                $this->filterBy($column, $olsonCode, $filterOp);
            }
            else {
                $this->filterBy($column, $olsonCode);
            }
        }

        return $this;
    }

    public function filterByGMTTimeZone($gmtTimeZone, $filterOp = null){
        if (!empty($gmtTimeZone)){
            $column = BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER . BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE;

            if ($filterOp != null){
                $this->filterBy($column, $gmtTimeZone, $filterOp);
            }
            else {
                $this->filterBy($column, $gmtTimeZone);
            }
        }

        return $this;
    }

    public function filterByGMTTimeZoneMap($gmtTimeZoneMap, $filterOp = null){
        if (!empty($gmtTimeZoneMap)){
            $column = BaseUtcOlsonMap::TABLE_NAME . self::DOT_DELIMITER . BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE_MAP;

            if ($filterOp != null){
                $this->filterBy($column, $gmtTimeZoneMap, $filterOp);
            }
            else {
                $this->filterBy($column, $gmtTimeZoneMap);
            }
        }

        return $this;
    }

    public function find(){
        if ($db = new \SQLiteDatabase(BaseTimeZone::DATABASE, BaseTimeZone::DB_MODE, $this->err_msg)){
            $this->query = $this->stmt . $this->getSelectedColumns() . $this->fromClause . $this->getWhereClause();
            $result = $db->query($this->query, SQLITE_ASSOC, $this->err_msg);
            if ($result === false){
                die("ERROR! QUERY FAILED - $this->err_msg");
            }

            $utcOlsonMapColl = array();

            /* @var $result SQLiteResult */
            $rows = $result->fetchAll();
            foreach($rows as $row){
                $utcOlsonMap = new UtcOlsonMap();
                $utcOlsonMap->setUtcOlsonMapId($row[BaseUtcOlsonMap::COLUMN_UTC_OLSON_MAP_ID]);
                $utcOlsonMap->setCountry($row[BaseUtcOlsonMap::COLUMN_COUNTRY]);
                $utcOlsonMap->setGmtTimeZone($row[BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE]);
                $utcOlsonMap->setGmtTimeZoneMap($row[BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE_MAP]);

                array_push($utcOlsonMapColl, $utcOlsonMap);
            }

            return $utcOlsonMapColl;
        }
        else {
            die("ERROR! $this->err_msg");
        }

        return null;
    }

    public function findPk($pk){
        $this->filterByUtcOlsonMapId($pk);

        return $this->find();
    }
}
