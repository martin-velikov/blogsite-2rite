<?php

class Login extends Router
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
            $repo = new UserRepository();
            $user = $repo->getUserByCredentials($username, $password);
            $_SESSION['User'] = $user;
        }

        header('location:..');
        exit;
    }
}
