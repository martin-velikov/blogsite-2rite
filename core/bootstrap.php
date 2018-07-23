<?php
    // load configuration and helper functions
    require_once(ROOT . DS . 'config' . DS . 'config.php');
    require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

    // Autoload Classes
    function __autoload($className) {
        if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
            require_once (ROOT . DS . 'core' . DS . $className . '.php');
        }else if (file_exists(ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php')) {
            require_once (ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php');
        }else if (file_exists(ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php')) {
            require_once (ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php');
        }
    }

    //Route the request
    Router::route($url);

