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

    public function orderByUtcOlsonMapId(){
        $this->orderBy(BaseUtcOlsonMap::COLUMN_UTC_OLSON_MAP_ID, BaseUtcOlsonMap::TABLE_NAME);

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

    public function orderByCountry(){
        $this->orderBy(BaseUtcOlsonMap::COLUMN_COUNTRY, BaseUtcOlsonMap::TABLE_NAME);

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

    public function orderByOlsonCode(){
        $this->orderBy(BaseUtcOlsonMap::COLUMN_OLSON_CODE, BaseUtcOlsonMap::TABLE_NAME);

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

    public function orderByGMTTimeZone(){
        $this->orderBy(BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE, BaseUtcOlsonMap::TABLE_NAME);

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

    public function orderByGMTTimeZoneMap(){
        $this->orderBy(BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE_MAP, BaseUtcOlsonMap::TABLE_NAME);

        return $this;
    }

    public function find(){
        if ($db = new \PDO('sqlite:'.BaseTimeZone::DATABASE)){
            $this->query = $this->stmt . $this->getSelectedColumns() . $this->getFromClause() . $this->getWhereClause() . $this->getOrderByClause();

            $result = $db->query($this->query);
            if ($result === false){
                print_r($db->errorInfo());
            }

            $utcOlsonMapColl = array();

            /* @var $result PDOStatement */
            $rows = $result->fetchAll();
            foreach($rows as $row){
                $utcOlsonMap = new UtcOlsonMap();
                $utcOlsonMap->setUtcOlsonMapId($row[BaseUtcOlsonMap::COLUMN_UTC_OLSON_MAP_ID]);
                $utcOlsonMap->setCountry($row[BaseUtcOlsonMap::COLUMN_COUNTRY]);
                $utcOlsonMap->setOlsonCode($row[BaseUtcOlsonMap::COLUMN_OLSON_CODE]);
                $utcOlsonMap->setGmtTimeZone($row[BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE]);
                $utcOlsonMap->setGmtTimeZoneMap($row[BaseUtcOlsonMap::COLUMN_GMT_TIME_ZONE_MAP]);

                array_push($utcOlsonMapColl, $utcOlsonMap);
            }

            return $utcOlsonMapColl;
        }
        else {
            print_r($db->errorInfo());
        }

        return null;
    }

    public function findPk($pk){
        $this->filterByUtcOlsonMapId($pk);

        return $this->find();
    }
}
