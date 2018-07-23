<?php

include_once "app/Model/PostHandlers/GetAllPosts.php";
include_once "app/Model/PostHandlers/GetPostByTitle.php";

    class Posts extends Controller
    {

        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction()
        {
            $allPosts = new \Model\PostHandlers\GetAllPosts();
            $allPosts->getPosts();
        }

        public function titleAction($title)
        {
            $allPosts = new \Model\PostHandlers\GetPostByTitle();
            $allPosts->getPosts($title);
        }
    }