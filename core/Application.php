<?php
    include_once '/app/web/config/config.php';

    class Application
    {
        //this construct method will be fired when the Application object or his children
        //are instanced
        public function __construct()
        {
            $this->init();
        }

        public function run()
        {
            self::init();
            self::autoload();
            self::dispatch();
        }

        private function init()
        {
            if (DEBUG) {
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
            } else{
                error_reporting(E_ALL);
                ini_set('display_errors', 0);
                ini_set('log_errors', 1);
                ini_set('error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'errors.log');
            }

            // Comentari
            if (ini_get('register_globals')) {
                $globalAry = ['_SESSION', '_COOKIE', '_POST', '_GET', '_REQUEST', '_SERVER', '_ENV', '_FILES'];
                foreach ($globalAry as $g) {
                    foreach ($GLOBALS[$g] as $k => $v ) {
                        if ($GLOBALS[$k] == $v){
                            unset($GLOBALS[$k]);
                        }
                    }
                }
            }
        }

        // Autoload Classes
        private function autoload()
        {
            spl_autoload_register(array(__CLASS__,'load'));
        }

        private function load($className) {
            // load configuration and helper functions

            require_once(ROOT . DS . 'config'. DS . 'config.php');
            require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

            if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
                require_once (ROOT . DS . 'core' . DS . $className . '.php');
            } else if (file_exists(ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php')) {
                require_once (ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php');
            } else if (file_exists(ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php')) {
                require_once (ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php');
            } else if (file_exists(ROOT . DS . 'app'. DS . 'Model' . DS .'PostHandlers'. DS . $className . '.php')) {
                require_once (ROOT . DS . 'app'. DS . 'Model' . DS .'PostHandlers'. DS . $className . '.php');
            } else if (file_exists(ROOT . DS . 'app'. DS . 'Model' . DS .'UserHandlers'. DS . $className . '.php')) {
                require_once (ROOT . DS . 'app'. DS . 'Model' . DS .'UserHandlers'. DS . $className . '.php');
            }
        }

        private function dispatch()
        {
            $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
            //Route the request
            $baseController = new BaseController();
            $baseController->route($url);
        }
    }
