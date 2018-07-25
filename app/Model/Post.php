<?php

    class Post
{
    public $username;
    public $date;
    public $title;
    public $postContent;
    public $categoryName;

    /**
     * Post constructor.
     * @param $username
     * @param $date
     * @param $title
     * @param $postContent
     * @param $categoryName
     */
    public function __construct($username = null, $date = null, $title = null, $postContent = null, $categoryName = null)
    {
        $this->username = $username;
        $this->date = $date;
        $this->title = $title;
        $this->postContent = $postContent;
        $this->categoryName = $categoryName;
    }

    /**
     * @return null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param null $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }
    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName): void
    {
        $this->categoryName = $categoryName;
    }
    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }
    /**
     * @return mixed
     */
    public function getPostContent()
    {
        return $this->postContent;
    }
    /**
     * @param mixed $postContent
     */
    public function setBlogContent($postContent): void
    {
        $this->postContent = $postContent;
    }
}