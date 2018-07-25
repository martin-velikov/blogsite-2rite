<?php

    class BaseController
    {
        //Grab our url
        public function route($url)
        {

            //  Router
            // we grab our controller from the first index of our array
            // we make sure its set and is capitalized, if it isnt set, we load the
            // default one
            //after that we passed it to another paramater
            // and shift the array so we can grab our next param. which is the action!
            $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
            $controller_name = $controller;
            array_shift($url);


            //  Action
            //  Grabs the first index and adds to it the word "Action"  thus making a function
            //  That are used in a controller. If no action is set, then it loads the default one
            //  Again we pass it to another variable and shift the array
            $action = (isset($url[0]) && $url[0] != '') ? $url[0] . 'Action': 'indexAction';
            $action_name = $action;
            array_shift($url);


            // Params
            // Any parameter will be passed to the Action
            $queryParams = $url;
            // We create a new object with our controller name and we pass in controller name and action
            $disspatch = new $controller($controller_name, $action);
            //$disspatch->registerAction($queryParams) is the same as bellow

            //Calls the indexAction and the router passes the query params
            if (method_exists($controller, $action)) {
                call_user_func_array([$disspatch, $action], $queryParams); //calls a callback function with arrays of parameters in it
            }else {
                die('that method does not exist in the controller \"' . $controller_name . '\"');
            }

        }
    }