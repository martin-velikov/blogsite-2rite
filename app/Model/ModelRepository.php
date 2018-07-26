<?php

class ModelRepository
{
    private $dbConnector;
    private $className;

    public function __construct($className)
    {
        $this->dbConnector = DbConnector::getInstance();
        $this->className = $className;
        $class = explode('\\', $className);
        $this->table = strtolower(end($class)) . 's';
    }

    public function getById($id)
    {
        return $this->fetch('SELECT * FROM ? where id=? LIMIT 1', 'si', $this->table, $id);
    }

    public function fetch($sql, ...$params) {
        $result = $this->dbConnector->executeQuery($sql, ...$params);

        if (!$result) {
            return null;
        }

        $properties = $result->fetch_assoc();
        $object = new $this->className();

        foreach ($properties as $property=>$value) {
            $object->{$this->getSetter($property)}($value);
        }
        return $object;
    }

    public function fetchArray($sql, ...$params) {
        $result = $this->dbConnector->executeQuery($sql, ...$params);

        if (!$result) {
            return null;
        }

        $objects = [];
        while ($properties = $result->fetch_assoc()) {
            $object = new $this->className();
            foreach ($properties as $property=>$value) {
                $object->{$this->getSetter($property)}($value);
            }
            $objects[] = $object;
        }
        return $objects;
    }

    private function getSetter($snakeCase)
    {
        return array_reduce(explode('_', $snakeCase), function ($carry, $word) {
            return $carry .= ucfirst($word);
        },'set');
    }
}