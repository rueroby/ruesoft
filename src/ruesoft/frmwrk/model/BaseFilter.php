<?php
namespace ruesoft\frmwrk\model;

class BaseFilter
{
    protected $tableName;
    protected $columnName;
    protected $filterOp = Criteria::EQUALS;
    protected $value;

    public function getTableName(){
        return $this->tableName;
    }

    public function getColumnName(){
        return $this->columnName;
    }

    public function getFilterOp(){
        return $this->filterOp;
    }

    public function getValue(){
        return $this->value;
    }

    public function setTableName($value){
        $this->tableName = $value;
    }

    public function setColumnName($value){
        $this->columnName = $value;
    }

    public function setFilterOp($value){
        $this->filterOp = !empty($value) ? $value : Criteria::EQUALS;
    }

    public function setValue($value){
        $this->value = $value;
    }

    public function __toString(){
        $columnName = empty($this->tableName) ? $this->columnName : $this->tableName . "." . $this->columnName;

        return $columnName . " " . $this->filterOp . " '". $this->value . "'";
    }
}
