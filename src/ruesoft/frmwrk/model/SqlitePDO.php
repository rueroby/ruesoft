<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 10/20/12
 * Time: 12:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\model;

class SqlitePDO
{
//    private $database;
//
//    public function __construct($database){
//
//    }

    public static function open($database){
        return new \PDO('sqlite:'.$database);
    }

    public static function ifTableExists($db, $tableName){
        return self::ifExists($db, 'table', $tableName);
    }

    public static function ifExists($db, $type, $tableName){
        if ($tableName == null || db == null)
        {
            return false;
        }

        $stmt = "SELECT COUNT(*) FROM sqlite_master WHERE type = '". $type . "' AND name = '" . $tableName . "';";
        $count = $db->querySingle($stmt);


        return $count > 0;
    }
}
