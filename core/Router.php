<?php

class Router
{
    public static function route($url){

        //  Controller
        $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
        $controller_name = $controller;
        array_shift($url);

        //  Action
        $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action': 'indexAction';
        $action_name = $action;
        array_shift($url);

        // Params
        $queryParams = $url;

        $disspatch = new $controller($controller_name, $action);
        //$disspatch->registerAction($queryParams) is the same as bellow
        if (method_exists($controller, $action)) {
            call_user_func_array([$disspatch, $action], $queryParams); //calls a callback function with arrays of parameters in it
        }else {
            die('that method does not exist in the controller \"' . $controller_name . '\"');
        }
    }
}