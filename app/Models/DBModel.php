<?php


namespace App\Models;

use App\MysqlConnection as Connection;

class DBModel extends Model
{
    protected $table;
    protected $db;
    protected $selectFields = "";
    protected $join = "";
    protected $groupBy;

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    function getWhere($conditions = array(), $fields = array())
    {
        $this->setSelect($fields);
        if (is_array($conditions) && !empty($conditions)) {
        }
    }

    function create($fields, $tableName = "")
    {
        $val = $placeholder = "";
        foreach ($fields as $k => $v) {
            $val .= $k . ",";
            $placeholder .= ":" . $k . ",";
        }
        $val = substr($val, 0, -1);
        $placeholder = substr($placeholder, 0, -1);
        $tableName = $this->getTableName($tableName);
        $query = "INSERT INTO " . $tableName . " (" . $val . ") VALUES (" . $placeholder . ")";
        $this->db->getConnection()->prepare($query)->execute($fields);
        return $this->db->getConnection()->lastInsertId();
    }

    function updateWhere($conditions)
    {
        echo __METHOD__;
    }

    function deleteWhere($conditions)
    {
        echo __METHOD__;
    }

    function getAll($fields = array())
    {
        $this->setSelect($fields, $this->table);
        return $this;
    }

    public function groupBy($field, $tableName = "")
    {
        $tableName = $this->getTableName($tableName);
        $this->groupBy = " GROUP BY " . $tableName . "." . $field;
        return $this;
    }

    public function concat($field, $tableName = "", $as = "")
    {
        $tableName = $this->getTableName($tableName);
        if (!empty($as)) {
            $as = " AS " . $as;
        }
        $this->selectFields .= " group_concat(" . $tableName . "." . $field . ") " . $as . ",";
        return $this;
    }

    public function leftJoin($fieldHost, $foreignTable, $foreignField, $select = array(), $leftTable = "")
    {
        $leftTable = $this->getTableName($leftTable);

        $this->setSelect($select, $foreignTable);
        $this->join .= " LEFT JOIN `{$foreignTable}` ON $leftTable." . "$fieldHost = $foreignTable." . "$foreignField";
        return $this;
    }

    public function get()
    {
        $this->prepareSelect();
        $query = "SELECT" . $this->selectFields . " FROM " . $this->table . $this->join . $this->groupBy;
        $query = $this->db->getConnection()->query($query);
        return $query->fetchAll(\PDO::FETCH_CLASS);
    }

    private function setSelect($fields, $tableName)
    {
        if (is_array($fields) && !empty($fields)) {
            foreach ($fields as $field) {
                $this->selectFields .= " " . $tableName . "." . $field . ",";
            }
        } else {
            if (empty($this->selectFields)) {
                $this->selectFields = " *";
            }
        }

        return $this;
    }

    private function prepareSelect()
    {
        if ($this->selectFields != " *") {
            $this->selectFields = substr($this->selectFields, 0, -1);
        }
        return $this;
    }

    private function getTableName($name)
    {
        if (empty($name)) {
            return $this->table;
        }
        return $name;
    }

}