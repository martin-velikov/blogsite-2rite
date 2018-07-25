<?php

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
        return $this->fetchObject("$className",...$params);
    }

    public function fetchObject($className, ...$params) {
        $result = $this->dbConnector->executeQuery($params[0],...$params);
        $className = explode("\\",$className);
        $className = end($className);

        if (!$result) {
            return null;
        }

        $properties = $result->fetch_assoc();
        $object = new $className();

        foreach ($properties as $property=>$value) {
            $object->{$this->getSetter($property)}($value);
        }
        return $object;
    }

    public function fetchArray($className, ...$params){
        $result = $this->dbConnector->executeQuery($params[0],...$params);
        $className = explode("\\",$className);
        $className = end($className);

        if (!$result) {
            return null;
        }

        $objects[] = null;
        while ($properties = $result->fetch_assoc()) {
            $object = new $className();
            foreach ($properties as $property=>$value) {
                $object->{$this->getSetter($property)}($value);
            }
            array_push($objects,$object);
        }
        array_shift($objects);
        return $objects;
    }

    private function getSetter($snakeCase)
    {
        return array_reduce(explode('_', $snakeCase), function ($carry, $word) {
            return $carry .= ucfirst($word);
        },'set');
    }
}