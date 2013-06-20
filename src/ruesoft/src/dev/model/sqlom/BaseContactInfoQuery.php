<?php
/**
 * Created by JetBrains PhpStorm.
 * User: rudy
 * Date: 10/20/12
 * Time: 1:39 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\src\dev\model\sqlom;

use ruesoft\frmwrk\model\BaseQuery;
use ruesoft\frmwrk\model\SqlitePDO;
use ruesoft\src\dev\model\ContactInfo;


class BaseContactInfoQuery extends BaseQuery
{
    protected function __construct(){
        $this->stmt = "SELECT";
        $this->select = array("*");
        $this->fromClause = " FROM ".BaseContactInfo::TABLE_NAME;

        $this->defaultSelect .= " ";
//        $this->defaultSelect .= BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_CONTACT_INFO_ID;
        $this->defaultSelect .= BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER ."_ROWID_";
        $prefix = self::COMMA_SPACE_SEPARATOR;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_FIRST_NAME;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_LAST_NAME;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_ADDRESS;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_CITY;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_STATE;
        $this->defaultSelect .= $prefix . BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER .BaseContactInfo::COLUMN_ZIPCODE;
    }

    public static function create() {
        return new BaseContactInfoQuery();
    }

    public function filterByContactInfoId($contactInfoId, $filterOp = null){
        if (!empty($contactInfoId)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_CONTACT_INFO_ID;

            if ($filterOp != null){
                $this->filterBy($column, $contactInfoId, $filterOp);
            }
            else {
                $this->filterBy($column, $contactInfoId);
            }
        }

        return $this;
    }

    public function orderByContactInfoId(){
        $this->orderBy(BaseContactInfo::COLUMN_CONTACT_INFO_ID, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByFirstName($firstName, $filterOp = null){
        if (!empty($firstName)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_FIRST_NAME;

            if ($filterOp != null){
                $this->filterBy($column, $firstName, $filterOp);
            }
            else {
                $this->filterBy($column, $firstName);
            }
        }

        return $this;
    }

    public function orderByFirstName(){
        $this->orderBy(BaseContactInfo::COLUMN_FIRST_NAME, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByLastName($lastName, $filterOp = null){
        if (!empty($lastName)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_LAST_NAME;

            if ($filterOp != null){
                $this->filterBy($column, $lastName, $filterOp);
            }
            else {
                $this->filterBy($column, $lastName);
            }
        }

        return $this;
    }

    public function orderByLastName(){
        $this->orderBy(BaseContactInfo::COLUMN_LAST_NAME, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByAddress($address, $filterOp = null){
        if (!empty($address)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_ADDRESS;

            if ($filterOp != null){
                $this->filterBy($column, $address, $filterOp);
            }
            else {
                $this->filterBy($column, $address);
            }
        }

        return $this;
    }

    public function orderByAddress(){
        $this->orderBy(BaseContactInfo::COLUMN_ADDRESS, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByCity($city, $filterOp = null){
        if (!empty($city)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_CITY;

            if ($filterOp != null){
                $this->filterBy($column, $city, $filterOp);
            }
            else {
                $this->filterBy($column, $city);
            }
        }

        return $this;
    }

    public function orderByCity(){
        $this->orderBy(BaseContactInfo::COLUMN_CITY, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByState($state, $filterOp = null){
        if (!empty($state)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_STATE;

            if ($filterOp != null){
                $this->filterBy($column, $state, $filterOp);
            }
            else {
                $this->filterBy($column, $state);
            }
        }

        return $this;
    }

    public function orderByState(){
        $this->orderBy(BaseContactInfo::COLUMN_STATE, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function filterByZipCode($zipcode, $filterOp = null){
        if (!empty($zipcode)){
            $column = BaseContactInfo::TABLE_NAME . self::DOT_DELIMITER . BaseContactInfo::COLUMN_ZIPCODE;

            if ($filterOp != null){
                $this->filterBy($column, $zipcode, $filterOp);
            }
            else {
                $this->filterBy($column, $zipcode);
            }
        }

        return $this;
    }

    public function orderByZipCode(){
        $this->orderBy(BaseContactInfo::COLUMN_ZIPCODE, BaseContactInfo::TABLE_NAME);

        return $this;
    }

    public function find(){
        if ($db = SqlitePDO::open(BaseContactInfo::DATABASE)){
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
                    $contactInfo = new ContactInfo();
                    $contactInfo->setContactInfoId($row[BaseContactInfo::COLUMN_CONTACT_INFO_ID]);
//                    $contactInfo->setContactInfoId($row["rowid"]);
                    $contactInfo->setFirstName($row[BaseContactInfo::COLUMN_FIRST_NAME]);
                    $contactInfo->setLastName($row[BaseContactInfo::COLUMN_LAST_NAME]);
                    $contactInfo->setAddress($row[BaseContactInfo::COLUMN_ADDRESS]);
                    $contactInfo->setCity($row[BaseContactInfo::COLUMN_CITY]);
                    $contactInfo->setState($row[BaseContactInfo::COLUMN_STATE]);
                    $contactInfo->setZipCode($row[BaseContactInfo::COLUMN_ZIPCODE]);

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
        $this->filterByContactInfoId($pk);

        $coll = $this->find();
        if ($coll) return $coll[0];
        return null;
    }

}
