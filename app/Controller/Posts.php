<?php

    class Posts extends Router
    {
        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction()
        {
            $repo = new PostsRepository();
            $allPosts = $repo->getAllPosts();

            $this->view->render('blog/showblogs',
                [
                    'allPosts' => $allPosts
                ]);
        }

        public function titleAction($title)
        {
            $repo = new PostsRepository();
            $allPosts = $repo->getPostsByTitle($title);

            $this->view->render('home/index',
                [
                'allPosts' => $allPosts
                ]);
        }
    }