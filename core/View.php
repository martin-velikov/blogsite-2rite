<?php

    class View
    {
        protected $_head, $_body, $_siteTitle = SITE_TTTLE, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

        public function __construct()
        {

        }
        //in case of a different OS we switch the seperator
        public function render($viewName)
        {
            $viewAry = explode('/', $viewName);
            $viewString = implode(DS, $viewAry);

            if (file_exists(ROOT . DS . 'app' . DS . 'View' . DS . $viewString . '.php'))
            {
                include (ROOT . DS . 'app' . DS . 'View' . DS . $viewString . '.php');
               //include (ROOT . DS . 'app' . DS . 'Views' . DS . 'layouts'. DS . $this->_layout . '.php');
            } else {
                die('The view \"' . $viewName . '\" does not exist');
            }
        }

        public function content($type)
        {
            if($type == 'head') {
                return $this->_head;
            } else if($type == 'body'){
                return $this->_body;
            }
            return false;
        }

        public function start($type)
        {
            //stores in if its head or body
            $this->_outputBuffer = $type;
            ob_start();
        }
        public function end()
        {
            if ($this->_outputBuffer == 'head'){
                $this->_head = ob_get_clean();
            } else if($this->_outputBuffer == 'body') {
                $this->_body = ob_get_clean();
            } else {
                die('You must first run the start method');
            }
        }

        public function siteTitle()
        {
           return $this->_siteTitle;
        }
        public function setSiteTitle($title)
        {
            $this->_siteTitle = $title;
        }
        public function setLayout($path)
        {
            $this->_layout = $path;
        }
    }