<?php

class PostsRepository extends ModelRepository
{
    private $class;

    public function __construct()
    {
        $this->class = explode('\\',Post::class);
        $this->class = end($this->class);
        parent::__construct($this->getConnect(), $this->class);
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    public function getConnect()
    {
        return $connect = DbConnector::getInstance();
    }
}