<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/6/12
 * Time: 10:15 AM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\controller;

use ruesoft\frmwrk\controller\BaseController;
use ruesoft\src\dev\manager\TimeZoneManager;

class TimezoneController extends BaseController
{
    /**
     * This file contains the array of olson codes from Venues that were not associated with
     * a GMT timezone in the time_zone table.
     */
    public static $aegOlsonCodes = array("America/Anchorage",
        "America/Chicago",
        "America/Dawson_Creek",
        "America/Denver",
        "America/Detroit",
        "America/Edmonton",
        "America/Edmonton",
        "America/Halifax",
        "America/Indianapolis",
        "America/Kentucky/Louisville",
        "America/Los_Angeles",
        "America/Mexico_City",
        "America/Montreal",
        "America/New_York",
        "America/North_Dakota/Center",
        "America/Phoenix",
        "America/Puerto_Rico",
        "America/Regina",
        "America/Toronto",
        "America/Vancouver",
        "America/Winnipeg",
        "Asia/Calcutta",
        "Asia/Dubai",
        "Asia/Jerusalem",
        "Asia/Kuala_Lumpur",
        "Asia/Phnom_Penh",
        "Asia/Qatar",
        "Asia/Shanghai",
        "Asia/Tokyo",
        "Australia/Adelaide",
        "Australia/Brisbane",
        "Australia/Darwin",
        "Australia/Hobart",
        "Australia/Perth",
        "Australia/Sydney",
        "Europe/Amsterdam",
        "Europe/Athens",
        "Europe/Belgrade",
        "Europe/Berlin",
        "Europe/Brussels",
        "Europe/Bucharest",
        "Europe/Copenhagen",
        "Europe/Dublin",
        "Europe/Helsinki",
        "Europe/Lisbon",
        "Europe/Madrid",
        "Europe/Monaco",
        "Europe/Oslo",
        "Europe/Prague",
        "Europe/Rome",
        "Europe/Stockholm",
        "Europe/Vienna",
        "Europe/Warsaw",
        "Europe/Zurich",
        "Pacific/Auckland",
        "Pacific/Honolulu");

    public static $gmtMapping = array(
        array("", "(GMT +00:00) Greenwich Mean Time"),
        array("Europe/Dublin", "(GMT +00:00) Greenwich Mean Time"),
        array("Europe/Lisbon", "(GMT +00:00) Greenwich Mean Time"),
        array("Europe/London", "(GMT +00:00) Greenwich Mean Time"),
        array("Europe/Amsterdam", "(GMT +01:00) Central European Time"),
        array("Europe/Berlin", "(GMT +01:00) Central European Time"),
        array("Europe/Brusseels", "(GMT +01:00) Central European Time"),
        array("Europe/Budapest", "(GMT +01:00) Central European Time"),
        array("Europe/Andorra", "(GMT +01:00) Central European Time"),
        array("Europe/Gibraltar", "(GMT +01:00) Central European Time"),
        array("Europe/Monaco", "(GMT +01:00) Central European Time"),
        array("Europe/Oslo", "(GMT +01:00) Central European Time"),
        array("Europe/Tirane", "(GMT +01:00) Central European Time"),
        array("Europe/Zurich", "(GMT +01:00) Central European Time"),
        array("Europe/Monaco", "(GMT +01:00) Central European Time"),
        array("Europe/Oslo", "(GMT +01:00) Central European Time"),
        array("Europe/Zurich", "(GMT +01:00) Central European Time"),
        array("Europe/Belgrade", "(GMT +01:00) Central European Time"),
        array("Europe/Prague", "(GMT +01:00) Central European Time"),
        array("Europe/Prague", "(GMT +01:00) Central European Time"),
        array("Africa/Ceuta", "(GMT +01:00) Central European Time"),
        array("Europe/Copenhagen", "(GMT +01:00) Central European Time"),
        array("Europe/Luxembourg", "(GMT +01:00) Central European Time"),
        array("Europe/Madrid", "(GMT +01:00) Central European Time"),
        array("Europe/Malta", "(GMT +01:00) Central European Time"),
        array("Europe/Paris", "(GMT +01:00) Central European Time"),
        array("Europe/Rome", "(GMT +01:00) Central European Time"),
        array("Europe/Stockholm", "(GMT +01:00) Central European Time"),
        array("Europe/Vienna", "(GMT +01:00) Central European Time"),
        array("Europe/Warsaw", "(GMT +01:00) Central European Time"),
        array("Europe/Athens", "(GMT +02:00) Eastern European Time"),
        array("Europe/Burcharest", "(GMT +02:00) Eastern European Time"),
        array("Europe/Chisinau", "(GMT +02:00) Eastern European Time"),
        array("Europe/Istanbul", "(GMT +02:00) Eastern European Time"),
        array("Europe/Kiev", "(GMT +02:00) Eastern European Time"),
        array("Europe/Uzhgorod", "(GMT +02:00) Eastern European Time"),
        array("Europe/Helsink", "(GMT +02:00) Eastern European Time"),
        array("Asia/Jerusalem", "(GMT +02:00) Eastern European Time"),
        array("Europe/Riga", "(GMT +02:00) Eastern European Time"),
        array("Europe/Sofia", "(GMT +02:00) Eastern European Time"),
        array("Europe/Tallinn", "(GMT +02:00) Eastern European Time"),
        array("Europe/Vilnius", "(GMT +02:00) Eastern European Time"),
        array("Europe/Kaliningrad", "(GMT +03:00) Kaliningrad"),
        array("Europe/Minsk", "(GMT +03:00) Minsk"),
        array("Asia/Qatar", "(GMT +03:00) Arabia Time"),
        array("Asia/Dubai", "(GMT +04:00) Gulf Time"),
        array("Europe/Moscow", "(GMT +04:00) Moscow Time"),
        array("Europe/Samara", "(GMT +04:00) Samara Time"),
        array("Asia/Calcutta", "(GMT +05:30) India Time"),
        array("Asia/Phnom_Penh", "(GMT +07:00) Indochina Time"),
        array("Asia/Shanghai", "(GMT +08:00) China Time"),
        array("Asia/Kuala_Lumpur", "(GMT +08:00) Malaysia Time"),
        array("Australia/Perth", "(GMT +08:00) Western Time (AUS)"),
        array("Asia/Tokyo", "(GMT +09:00) Japan Time"),
        array("Australia/Adelaide", "(GMT +09:30) Central Time (AUS)"),
        array("Australia/Darwin", "(GMT +09:30) Central Time (AUS)"),
        array("Australia/Brisbane", "(GMT +10:00) Eastern Time (AUS)"),
        array("Australia/Hobart", "(GMT +10:00) Eastern Time (AUS)"),
        array("Australia/Sydney", "(GMT +10:00) Eastern Time (AUS)"),
        array("Pacific/Auckland", "(GMT +12:00) New Zealand Time"),
        array("Pacific/Wake", "(GMT +12:00) Wake Time"),
        array("America/St_Johns", "(GMT -03:30) Newfoundland Time"),
        array("America/Puerto_Rico", "(GMT -04:00) Atlantic Time"),
        array("America/Halifax", "(GMT -04:00) Atlantic Time"),
        array("America/New_York", "(GMT -05:00) Eastern Time"),
        array("America/Detroit", "(GMT -05:00) Eastern Time"),
        array("America/Indianapolis", "(GMT -05:00) Eastern Time"),
        array("America/Kentucky/Louisville", "(GMT -05:00) Eastern Time"),
        array("America/New_York", "(GMT -05:00) Eastern Time"),
        array("America/Iqaluit", "(GMT -05:00) Eastern Time"),
        array("America/Montreal", "(GMT -05:00) Eastern Time"),
        array("America/Toronto", "(GMT -05:00) Eastern Time"),
        array("America/Chicago", "(GMT -06:00) Central Time"),
        array("America/Mexico_City", "(GMT -06:00) Central Time"),
        array("America/North_Dakota/Center", "(GMT -06:00) Central Time"),
        array("America/Regina", "(GMT -06:00) Central Time"),
        array("America/Winnipeg", "(GMT -06:00) Central Time"),
        array("America/Denver", "(GMT -07:00) Mountain Time"),
        array("America/Phoenix", "(GMT -07:00) Mountain Time - Arizona"),
        array("America/Dawson_Creek", "(GMT -07:00) Mountain Time"),
        array("America/Edmonton", "(GMT -07:00) Mountain Time"),
        array("America/Yellowknife", "(GMT -07:00) Mountain Time"),
        array("America/Los_Angeles", "(GMT -08:00) Pacific Time"),
        array("America/Vancouver", "(GMT -08:00) Pacific Time"),
        array("America/Whitehorse", "(GMT -08:00) Pacific Time"),
        array("America/Anchorage", "(GMT -09:00) Alaska Time"),
        array("Pacific/Honolulu", "(GMT -10:00) Hawaii Time"),
        array("Pacific/Midway", "(GMT -11:00) Samoa Time"));

    public static $gmtToFilteredOlsonCode = array("(GMT -09:00) Alaska Time" => "America/Anchorage",
        "(GMT -04:00) Atlantic Time" => "America/Halifax",
        "(GMT +01:00) Central European Time" => "Europe/Paris",
        "(GMT -06:00) Central Time" => "America/Chicago",
        "(GMT +02:00) Eastern European Time" => "Europe/Istanbul",
        "(GMT -05:00) Eastern Time" => "America/New_York",
        "(GMT +00:00) Greenwich Mean Time" => "Europe/London",
        "(GMT -10:00) Hawaii Time" => "Pacific/Honolulu",
        "(GMT +03:00) Minsk Time" => "Europe/Minsk",
        "(GMT +04:00) Moscow Time" => "Europe/Moscow",
        "(GMT +09:30) Central Time (AUS)" => "Australia/Darwin",
        "(GMT +10:00) Eastern Time (AUS)" => "Australia/Sydney",
        "(GMT +08:00) Western Time (AUS)" => "Australia/Perth",
        "(GMT +05:30) India Time" => "Asia/Calcutta",
        "(GMT +04:00) Gulf Time" => "Asia/Dubai",
        "(GMT +08:00) Malaysia Time" => "Asia/Kuala_Lumpur",
        "(GMT +07:00) Indochina Time" => "Asia/Phnom_Penh",
        "(GMT +03:00) Arabia Time" => "sia/Qatar",
        "(GMT +08:00) China Time" => "Asia/Shanghai",
        "(GMT +09:00) Japan Time" => "Asia/Tokyo",
        "(GMT -07:00) Mountain Time" => "America/Denver",
        "(GMT -07:00) Mountain Time - Arizona" => "America/Phoenix",
        "(GMT -03:30) Newfoundland Time" => "America/St_Johns",
        "(GMT -08:00) Pacific Time" => "America/Los_Angeles",
        "(GMT -11:00) Samoa Time" => "Pacific/Midway",
        "(GMT +12:00) Wake Time" => "Pacific/Wake");

    protected $timezoneMgr = null;

    public function getTimeZoneManager(){
        if ($this->timezoneMgr == null){
            $this->timezoneMgr = TimeZoneManager::getInstance();
        }

        return $this->timezoneMgr;
    }

    public function __construct(){
        parent::__construct();
    }

    public function listAction(){
        $params = array();
        $params['mappings'] = $this->getTimeZoneManager()->getUtcOlsonMap();;
        return $this->render('timezones/list.html', $params);
    }

    public function showAction(){
        $params = array();
        $rows = array();
        for($i = 0; $i < count(TimezoneController::$aegOlsonCodes); $i++){
            $columns = array();
            $columns[] = TimezoneController::$aegOlsonCodes[$i];
            $gmtValue = $this->lookupGMTTimezone(TimezoneController::$aegOlsonCodes[$i]);
            $columns[] = $gmtValue;
            $columns[] = $this->mapGMTToFilteredOlsonCode($gmtValue);
            array_push($rows, $columns);
        }
        $params['rows'] = $rows;
        return $this->render('timezones/index.html', $params);
    }

    public function insertAction(){
        $params = array();
        return $this->render('timezones/insert.html', $params);
    }

    private function lookupGMTTimezone($olsonCode){
        foreach(TimezoneController::$gmtMapping as $map ){
            if ($map[0] == $olsonCode){ return $map[1]; }
        }
        return '';
    }

    private function mapGMTToFilteredOlsonCode($gmtValue){
        foreach(TimezoneController::$gmtToFilteredOlsonCode as $key => $value){
            //$ok = stripos($gmtValue, $key);
            if ($gmtValue == $key){
                return $value;
            }
        }
        return '';
    }
}
