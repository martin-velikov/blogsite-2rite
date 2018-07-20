<?php

namespace Model;


class UserAuth
{
    public function validLogin($username,$password)
    {
        $class = explode('\\',User::class);
        $class = end($class);

        $connect = new ModelRepository(new DbConnector(), $class);
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
            header('location:..');
        } header('location:..');
    }
}