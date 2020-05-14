<?php

namespace App\Models;

abstract class Model
{

    abstract function getWhere($conditions = array(), $fields = array());

    abstract function create($fields);

    abstract function updateWhere($conditions);

    abstract function deleteWhere($conditions);

    abstract function getAll($fields = array());

    public function getById($id)
    {
        return $this->getWhere([$this->getIdField() => $id]);
    }

    public function updateById($id)
    {
        return $this->updateWhere([$this->getIdField => $id]);
    }

    public function deleteById($id)
    {
        $this->deleteWhere([$this->getIdField => $id]);
    }

    public function getIdField()
    {
        return "id";
    }
}