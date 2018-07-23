<?php

include_once "app/Model/ModelRepository.php";
include_once "app/Model/DbConnector.php";
include_once "app/Model/UserHandlers/UserAuth.php";


class Login extends Controller
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function indexAction()
    {
        if (isset($_POST['login']) && $_POST['passCode'] === 'secret') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = new \Model\UserAuth();
            $user->validLogin($username,$password);
        }
    }
}