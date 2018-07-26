<?php

class Logout extends Router
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function indexAction()
    {
        if (isset($_POST['logout'])) {
            session_destroy();
            header('location:..');
        }
    }
}
