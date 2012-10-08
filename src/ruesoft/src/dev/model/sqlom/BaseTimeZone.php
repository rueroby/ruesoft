<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/6/12
 * Time: 4:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

class BaseTimeZone
{
    const DATABASE = "D:\\websites\\ruesoft\\db\\ruesoft.sqlite";
    const DB_MODE = "0666";
    const TABLE_NAME = 'time_zone';
    const COLUMN_TIME_ZONE_ID = 'time_zone_id';
    const COLUMN_OLSON_CODE = 'olson_code';
    const COLUMN_GMT_TIME_ZONE = 'gmt_time_zone';

    protected $timeZoneId;
    protected $olsonCode;
    protected $gmtTimeZone;
    protected $err_msg;

    public function __construct($timeZoneId = null, $olsonCode = null, $gmtTimeZone = null){
        $this->timeZoneId = $timeZoneId;
        $this->olsonCode = $olsonCode;
        $this->gmtTimeZone = $gmtTimeZone;
    }

    public function getTimeZoneId(){
        return $this->timeZoneId;
    }

    public function setTimeZoneId($value){
        $this->timeZoneId = $value;
    }

    public function getOlsonCode(){
        return $this->olsonCode;
    }

    public function setOlsonCode($value){
        $this->olsonCode = $value;
    }

    public function getGMTTimeZone(){
        return $this->gmtTimeZone;
    }

    public function setGMTTimeZone($value){
        $this->gmtTimeZone = $value;
    }

    public function save(){
        if ($db = new \SQLiteDatabase(self::DATABASE, self::DB_MODE, $this->err_msg)){
            $stmt = "CREATE TABLE IF NOT EXIST ".self::TABLE_NAME." (time_zone_id int, olson_code varchar 200, gmt_time_zone varchar 200, primary key (time_zone_id))";
            $ok = @$db->queryExec($stmt, $this->err_msg);
            if (!$ok){
                die("ERROR! CREATE TABLE FAILED - $this->err_msg");
            }

            if (!$this->timeZoneId){
                $stmt = "INSERT INTO ".self::TABLE_NAME." VALUES (". $this->timeZoneId .", '". $this->olsonCode . "', '". $this->gmtTimeZone."')";
                $ok = $db->queryExec($stmt, $this->err_msg);
                if (!$ok){
                    die("ERROR! INSERT FAILED - $this->err_msg");
                }
            }
            else { // this is an update
                $stmt = "UPDATE ".self::TABLE_NAME." SET ". self::COLUMN_OLSON_CODE ."='". $this->olsonCode .
                    "', ". self::COLUMN_GMT_TIME_ZONE ."='". $this->gmtTimeZone."' WHERE ". self::COLUMN_TIME_ZONE_ID . "=". $this->timeZoneId;
                $ok = $db->queryExec($stmt, $this->err_msg);
                if (!$ok){
                    die("ERROR! UPDATE FAILED - $this->err_msg");
                }
            }
        }
        else {
            die("ERROR! OPEN DATABASE FAILED - $this->err_msg");
        }
    }

    public function delete(){
        if (is_int($this->timeZoneId)){
            if ($db = new \SQLiteDatabase(self::DATABASE, self::DB_MODE, $this->err_msg)){
                $stmt = "DELETE FROM ".self::TABLE_NAME." WHERE ".self::COLUMN_TIME_ZONE_ID."=".$this->timeZoneId;
                $ok = $db->queryExec($stmt, $this->err_msg);
                if (!$ok){
                    die("ERROR! Delete Failed - $this->err_msg");
                }
            }

        }
    }
}
