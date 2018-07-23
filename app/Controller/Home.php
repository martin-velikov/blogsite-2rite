<?php

    class Home extends Controller {

        public function __construct($controller, $action){
            parent::__construct($controller, $action);
        }

        public function indexAction(){
//            $this->view->render('home/index');
            $this->view->render('header');
            $this->view->render('main');
            $this->view->render('footer');
        }
    }