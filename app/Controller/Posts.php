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

            $repo = new CategoryRepository();
            $allCategories = $repo->getAllCategories();

            $this->view->render('home/index',
                [
                    'allPosts' => $allPosts,
                    'categories' => $allCategories
                ]);
        }

        public function titleAction($title)
        {
            $repo = new PostsRepository();
            $allPosts = $repo->getPostsByTitle($title);

            $repo = new CategoryRepository();
            $allCategories = $repo->getAllCategories();

            $this->view->render('home/index',
                [
                    'allPosts' => $allPosts,
                    'categories' => $allCategories
                ]);
        }

        public function categoryAction($category)
        {
            $repo = new PostsRepository();
            $allPosts = $repo->getPostsByCategory($category);

            $repo = new CategoryRepository();
            $allCategories = $repo->getAllCategories();

            $this->view->render('home/index',
                [
                    'allPosts' => $allPosts,
                    'categories' => $allCategories
                ]);
        }
    }