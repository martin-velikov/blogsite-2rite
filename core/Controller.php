<?php

    class Controller extends Application
    {
        protected  $_controller, $_action;
        public $view;

        public function __construct($controller, $action)
        {
            parent::__construct(); //construct Application and fire the app->construct method
            $this->_controller = $controller;
            $this->_action = $action;
            $this->view = new View();
        }

    }