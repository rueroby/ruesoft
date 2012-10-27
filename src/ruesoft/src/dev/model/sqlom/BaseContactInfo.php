<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 10/20/12
 * Time: 12:25 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

use ruesoft\frmwrk\model\SqlitePDO;

class BaseContactInfo
{
    //const DATABASE = "D:\\websites\\ruesoft\\db\\ruesoft.sqlite";
    const DATABASE = "/Users/rudy/Sites/ruesoft/db/ruesoft.sqlite";
    const TABLE_NAME = 'contact_info';
    const COLUMN_CONTACT_INFO_ID = 'contact_info_id';
    const COLUMN_FIRST_NAME = 'first_name';
    const COLUMN_LAST_NAME = 'last_name';
    const COLUMN_ADDRESS = 'address';
    const COLUMN_CITY = "city";
    const COLUMN_STATE = 'state';
    const COLUMN_ZIPCODE = 'zipcode';

    protected $contactInfoId;
    protected $firstName;
    protected $lastName;
    protected $address;
    protected $city;
    protected $state;
    protected $zipCode;

    public function __construct($firstName = null, $lastName = null, $address = null, $city = null, $state = null, $zipCode = null){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
    }

    public function getContactInfoId(){
        return $this->contactInfoId;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city;
    }

    public function getState(){
        return $this->state;
    }

    public function getZipCode(){
        return $this->zipCode;
    }

    public function setContactInfoId($value){
        $this->contactInfoId = $value;
    }

    public function setFirstName($value){
        $this->firstName = $value;
    }

    public function setLastName($value){
        $this->lastName = $value;
    }

    public function setAddress($value){
        $this->address = $value;
    }

    public function setCity($value){
        $this->city = $value;
    }

    public function setState($value){
        $this->state = $value;
    }

    public function setZipCode($value){
        $this->zipCode = $value;
    }

    public function save(){
        if ($db = SqlitePDO::open(self::DATABASE))
        {
            $stmt = 'CREATE TABLE IF NOT EXIST ';
            $stmt .= self::TABLE_NAME;
            $stmt .= " (contact_info_id int, first_name varchar 120, last_name varchar 120, address varchar 360, city varchar 50, state varchar 50, zipcode char 12, primary key (contact_info_id))";
            $ok = @$db->exec($stmt);
            if ($ok === false){
                print_r($db->errorInfo());
            }

            if (!$this->timeZoneId){
                $stmt = "INSERT INTO ".self::TABLE_NAME;
                $stmt .= " VALUES (". $this->contactInfoId;
                $stmt .= ", '". $this->firstName;
                $stmt .= "', '". $this->lastName;
                $stmt .= "', '". $this->address;
                $stmt .= "', '". $this->city;
                $stmt .= "', '". $this->state;
                $stmt .= "', '". $this->zipCode;
                $stmt .= "');";
                $count = $db->exec($stmt);
                if ($count === false){
                    print_r($db->errorInfo());
                }
            }
            else { // this is an update
                $stmt = "UPDATE ".self::TABLE_NAME." SET ". self::COLUMN_FIRST_NAME ."='". $this->firstName;
                $stmt .= "', ". self::COLUMN_LAST_NAME ."='". $this->lastName;
                $stmt .= "', ". self::COLUMN_ADDRESS ."='". $this->address;
                $stmt .= "', ". self::COLUMN_CITY ."='". $this->city;
                $stmt .= "', ". self::COLUMN_STATE ."='". $this->state;
                $stmt .= "', ". self::COLUMN_ZIPCODE ."='". $this->zipCode;
                $stmt .= "' WHERE ". self::COLUMN_CONTACT_INFO_ID . "=". $this->contactInfoId;
                $stmt .= ";";

                $count = $db->exec($stmt);
                if ($count === false){
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
            if ($db = SqlitePDO::open(self::DATABASE)){
                $stmt = "DELETE FROM ".self::TABLE_NAME." WHERE ".self::COLUMN_CONTACT_INFO_ID."=".$this->contactInfoId . ";";
                $count = $db->exec($stmt, $this->err_msg);
                if ($count === false){
                    print_r($db->errorInfo());
                }
            }

        }
    }
}
