<?php

class Category
{
    private $id;
    private $CategoryName;

    /**
     * Category constructor.
     * @param $id
     * @param $CategoryName
     */
    public function __construct($id = null, $CategoryName = null)
    {
        $this->id = $id;
        $this->CategoryName = $CategoryName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->CategoryName;
    }

    /**
     * @param mixed $CategoryName
     */
    public function setCategoryName($CategoryName): void
    {
        $this->CategoryName = $CategoryName;
    }


}