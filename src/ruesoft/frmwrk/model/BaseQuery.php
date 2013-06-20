<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RueRobi
 * Date: 10/7/12
 * Time: 12:15 PM
 * To change this template use File | Settings | File Templates.
 */
namespace ruesoft\frmwrk\model;

class BaseQuery
{
    const COMMA_SPACE_SEPARATOR = ", ";
    const DOT_DELIMITER = ".";
    protected $query = '';

    protected $defaultSelect;
    protected $err_msg = '';
    protected $stmt = "";
    protected $select = array();
    protected $fromClause = "";
    protected $whereClause = "";
    protected $filters = array();
    protected $orderBy = array();

    public function filterBy($columnName, $value, $filterOp = Criteria::EQUALS, $tableName = null){
        $filter = new BaseFilter();
        $filter->setColumnName($columnName);
        $filter->setFilterOp($filterOp);
        $filter->setTableName($tableName);
        $filter->setValue($value);

        array_push($this->filters, $filter);
        return $this;
    }

    public function orderBy($columnName, $tableName = null){
        if ($tableName != null && $columnName != null){
            array_push($this->orderBy, $tableName . "." . $columnName);
        }
        else if ($columnName != null){
            array_push($this->orderBy, $columnName);
        }
    }

    public function select($coll){
        if (is_array($coll)){
            $this->select = $coll;
        }
        return $this;
    }

    protected function getFromClause(){
        return $this->fromClause;
    }

    protected function getSelectedColumns(){
        $str = '';

        $prefix = '';
        foreach($this->select as $column){
            if ($column == "*"){
                $str = $this->defaultSelect;
            }
            else {
                $str .= $prefix . $column;
                $prefix = self::COMMA_SPACE_SEPARATOR;
            }
        }

        return $str;
    }

    protected function getWhereClause(){
        $this->whereClause = "";
        if (count($this->filters) > 0){
            $this->whereClause = " WHERE ";

            $prefix = "";
            foreach($this->filters as $filter){
                $this->whereClause .= $prefix . $filter;
                $prefix = " AND ";
            }
        }

        return $this->whereClause;
    }

    protected function getOrderByClause(){
        if (count($this->orderBy) > 0){
            $orderBy = " ORDER BY " . implode(", ", $this->orderBy);
            return $orderBy;
        }
        return '';
    }

}
