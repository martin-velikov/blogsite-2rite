<?php

namespace Model;
include_once "DbConnector.php";

class ModelRepository
{
    private $dbConnector;
    private $className;

    public function __construct(DbConnector $dbConnector, $className)
    {
        $this->dbConnector = $dbConnector;
        $this->className = $className;
    }

    public function getById($id)
    {

        return $this->fetch("$this->className",'SELECT * FROM ' . strtolower($this->className) . 's where id=? LIMIT 1', 'i', $id);
    }

    public function fetch($className,...$params)
    {
//        $obj = $params;
        file_put_contents('debug.txt', print_r($params, true));
        return $this->dbConnector->fetchObject("Model\\$className",...$params);
    }
}