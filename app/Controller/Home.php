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

            $repo = new CategoryRepository();
            $allCategories = $repo->getAllCategories();

            $this->view->render('home/index',
                [
                    'allPosts' => $allPosts,
                    'categories' => $allCategories
                ]);
        }
    }