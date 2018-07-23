<?php

namespace Controller;
include_once "../Model/DbConnector.php";
include_once "../Model/ModelRepository.php";
include_once "../Model/UserHandlers/UserAuth.php";

use Model\UserAuth;

$username = $_POST['username'];
$password = $_POST['password'];
$user = new UserAuth();
$user->validLogin($username,$password);