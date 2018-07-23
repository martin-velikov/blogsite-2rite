<?php
    session_start();
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__FILE__));

    $url = isset($_SERVER['REQUEST_URI']) ? explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) : [];
    require_once (ROOT . DS . 'core' . DS . 'bootstrap.php');
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