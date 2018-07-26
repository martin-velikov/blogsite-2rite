<?php
    define('DEBUG', true);
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__DIR__));

    //DB config
    define('DB_HOST' , '172.26.11.68');
    define('DB_NAME' , 'vagrant');
    define('DB_USER' , 'root');
    define('DB_PASSWORD' , 'vagrant');

    define('DEFAULT_CONTROLLER', 'Home'); //Calls DEFAULT_CONTROLLER if there isn't one called
    define('DEFAULT_LAYOUT' , 'default'); //If no layout is set in the controller, use this one;

    define('PROOT', '/'); //set this to '/' for a live server
    define('SITE_TTTLE', 'blogsite3rite-def'); //Will be used if a title is not set