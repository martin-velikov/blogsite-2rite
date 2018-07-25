<?php
    include_once "app/Model/User.php";
    session_start();
    require "core/Application.php";
    $app = new Application();
    $app->run();