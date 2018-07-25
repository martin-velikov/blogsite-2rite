<?php

class UserAuth extends UserRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function validLogin($username,$password)
    {
        $class = explode('\\',User::class);
        $class = end($class);

        $id = $this->fetchObject(
            "Model\\$class",
            $sql ='Select id,username,password from '.strtolower($class).'s where username=? and password=?',
            'ss',
            $username,
            $password)->getId();
        if ($id != null)
        {
            $user = $this->getById($id);
            session_start();
            $_SESSION['User'] = $user;
            header('location:..');
        } header('location:..');
    }
}