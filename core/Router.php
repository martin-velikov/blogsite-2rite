<?php

    class Router extends Application {
        protected  $_controller, $_action, $connect;
        public $view;

        public function __construct($controller, $action){
            parent::__construct(); //construct Application and fire the app->construct method
            $this->_controller = $controller;
            $this->_action = $action;
            $this->view = new View();
            $this->connect = DbConnector::getInstance();
        }
    }