<?php

namespace Controller;

include_once "../Model/DbConnector.php";
include_once "../Model/ModelRepository.php";

use Model\DbConnector;
use Model\ModelRepository;
use Model\User;

class Login
{
    public function validLogin($username,$password)
    {
        $class = explode('\\',User::class);
        $class = end($class);

        $connect = new DbConnector();
        $id = $connect->fetchObject(
            "Model\\$class",
            $sql ='Select id,username,password from '.strtolower($class).'s where username=? and password=?',
            'ss',
            $username,
            $password)->getId();
        if ($id != null)
        {

            $conn = new ModelRepository(new DbConnector(),"$class");
            $user = $conn->getById($id);
            session_start();
            $_SESSION['User'] = $user;
            header('location:../index.php');
        } else echo "УЖАС";
    }
}

$username = $_POST['username'];
$password = $_POST['password'];
$user = new Login();
$user->validLogin($username,$password);

