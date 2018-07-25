<?php

    class Home extends Router
    {

        public function __construct($controller, $action)
        {
            parent::__construct($controller, $action);
        }

        public function indexAction()
        {
            $this->view->render('home/index');
        }
    }