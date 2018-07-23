<?php

namespace Model;

include_once "app/Model/ModelRepository.php";
include_once "app/Model/DbConnector.php";

class PostsRepository
{
    private $class;
    private $connect;

    /**
     * PostsRepository constructor.
     * @param $class
     * @param $connect
     */
    public function __construct()
    {
        $this->class = explode('\\',Post::class);
        $this->class = end($this->class);
        $this->connect = new ModelRepository(new DbConnector(), $this->class);
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return ModelRepository
     */
    public function getConnect(): ModelRepository
    {
        return $this->connect;
    }

    public function displayPosts($allPosts)
    {
        foreach ($allPosts as $post) {
            echo
                "<div class='blog-post' id=\"blog-post\">
                <div class='post__head'>
                    <h2 class='post__title'>".$post->getTitle()."</h2>
                    <span>Posted by <a href='#'>".$post->getUsername()."</a><br /> on ".$post->getDate()."</span><br />
                    <span>Category: <a href='#'>".$post->getCategoryName()."</a></span>
                </div><!-- /.post__head -->
                 
                 <div class='post__body'>
                    <p>".$post->getPostContent()."</p>
                 </div><!-- /.post__body -->
             </div><!-- /.blog-post -->";
        }
    }


}