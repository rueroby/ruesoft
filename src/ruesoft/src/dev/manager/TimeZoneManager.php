<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/6/12
 * Time: 7:28 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\manager;

use ruesoft\src\dev\model\TimeZone;
use ruesoft\src\dev\model\TimeZoneQuery;
use ruesoft\src\dev\model\UtcOlsonMap;
use ruesoft\src\dev\model\UtcOlsonMapQuery;

class TimeZoneManager
{
    private static $instance = null;
    private function __construct(){}

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new TimeZoneManager();
        }

        return self::$instance;
    }

    public function getTimeZones(){
        return TimeZoneQuery::create()->find();
    }

    public function getTimeZone($pk){
        return TimeZoneQuery::create()->findPk($pk);
    }

    public function getUtcOlsonMap(){
        return UtcOlsonMapQuery::create()
            ->orderByCountry()
            ->find();
    }
}
