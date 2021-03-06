<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/7/12
 * Time: 12:34 AM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

class BaseUtcOlsonMap
{
    //const DATABASE = "D:\\websites\\ruesoft\\db\\ruesoft.sqlite";
    const DATABASE = "/Users/rudy/Sites/ruesoft/db/ruesoft.sqlite";
    const DB_MODE = "0666";
    const TABLE_NAME = 'utc_olson_map';
    const COLUMN_UTC_OLSON_MAP_ID = 'utc_olson_map_id';
    const COLUMN_COUNTRY = 'country';
    const COLUMN_OLSON_CODE = 'olson_code';
    const COLUMN_GMT_TIME_ZONE = 'gmt_time_zone';
    const COLUMN_GMT_TIME_ZONE_MAP = 'gmt_time_zone_map';


    protected $utcOlsonMapId = null;
    protected $country;
    protected $olsonCode;
    protected $gmtTimezone;
    protected $gmtTimezoneMap;

    public function getUtcOlsonMapId(){
        return $this->utcOlsonMapId;
    }

    public function getCountry(){
        return $this->country;
    }

    public function getOlsonCode(){
        return $this->olsonCode;
    }

    public function getGmtTimeZone(){
        return $this->gmtTimezone;
    }

    public function getGmtTimeZoneMap(){
        return $this->gmtTimezoneMap;
    }

    public function setUtcOlsonMapId($value){
        $this->utcOlsonMapId = $value;
    }

    public function setCountry($value){
        $this->country = $value;
    }

    public function setOlsonCode($value){
        $this->olsonCode = $value;
    }

    public function setGmtTimeZone($value){
        $this->gmtTimezone = $value;
    }

    public function setGmtTimeZoneMap($value){
        $this->gmtTimezoneMap = $value;
    }

    public function save(){
        if ($db = new PDO('sqlite:'.self::DATABASE)){
//            $stmt = "CREATE TABLE IF NOT EXIST ".self::TABLE_NAME." (utc_olson_map_id int, country varchar 75, olson_code varchar 200, gmt_time_zone varchar 200, gmt_time_zone_map varchar 200, primary key (utc_olson_map_id))";
//            $ok = @$db->exec($stmt);
//            if ($ok === false){
//                print_r($db->errorInfo());
//            }

            if (!$this->timeZoneId){
                $stmt = "INSERT INTO ".self::TABLE_NAME." VALUES (". $this->utcOlsonMapId .", '". $this->country ."', '". $this->olsonCode . "', '". $this->gmtTimeZone ."', '". $this->gmtTimezoneMap."')";
                $count = $db->exec($stmt);
                if ($count === false){
                    print_r($db->errorInfo());
                }
            }
            else { // this is an update
                $stmt = "UPDATE ".self::TABLE_NAME." SET ". self::COLUMN_COUNTRY ."='". $this->country .
                    "', ". self::COLUMN_OLSON_CODE ."='". $this->olsonCode.
                    "', ". self::COLUMN_GMT_TIME_ZONE ."='". $this->gmtTimeZone.
                    "', ". self::COLUMN_GMT_TIME_ZONE_MAP ."='". $this->gmtTimezoneMap.
                    "' WHERE ". self::COLUMN_UTC_OLSON_MAP_ID . "=". $this->utcOlsonMapId;
                $ok = $db->exec($stmt);
                if (!$ok){
                    print_r($db->errorInfo());
                }
            }
        }
        else {
            print_r($db->errorInfo());
        }
    }

    public function delete(){
        if (is_int($this->timeZoneId)){
            if ($db = new PDO('sqlite:'.self::DATABASE)){
                $stmt = "DELETE FROM ".self::TABLE_NAME." WHERE ".self::COLUMN_TIME_ZONE_ID."=".$this->timeZoneId;
                $ok = $db->exec($stmt);
                if ($ok == false){
                    print_r($db->errorInfo());
                }
            }

        }
    }
}
