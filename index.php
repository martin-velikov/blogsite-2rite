<?php
include_once "app/Model/User.php";

    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__FILE__));

    $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];

// load configuration and helper functions
require_once(ROOT . DS . 'config' . DS . 'config.php');
require_once(ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php');

// Autoload Classes
function autoload($className) {
    if (file_exists(ROOT . DS . 'core' . DS . $className . '.php')) {
        require_once (ROOT . DS . 'core' . DS . $className . '.php');
    }elseif (file_exists(ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php')) {
        require_once (ROOT . DS . 'app'. DS . 'Controller' . DS . $className . '.php');
    }elseif (file_exists(ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php')) {
        require_once (ROOT . DS . 'app'. DS . 'Model' . DS . $className . '.php');
    }
}

spl_autoload_register('autoload');
session_start();

//Route the request
Router::route($url);



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>Blog2rite</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css"/>

    <script src="css/js/jquery.min.js"></script>
</head>
<body>

</body>
</html>