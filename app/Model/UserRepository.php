<?php

class UserRepository extends ModelRepository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function getUserByCredentials($username,$password)
    {
        return $this->fetch(
                'Select * from '.$this->table.' where username=? and password=?',
                'ss',
                $username,
                $password
            );
    }
}