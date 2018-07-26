<?php

    class Home extends Router
    {

        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction()
        {
            $repo = new PostsRepository();
            $allPosts = $repo->getAllPosts();
            $this->view->render('home/index',
                [
                    'allPosts' => $allPosts
                ]);
        }
    }