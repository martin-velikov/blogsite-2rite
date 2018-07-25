<?php

    class Posts extends Router
    {
        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction()
        {
            $this->view->render('components/main');
        }

        public function titleAction($title)
        {
            $allPosts = new GetPostByTitle();
            $this->view->render('components/main');
            return $allPosts->getPosts($title);
        }
    }