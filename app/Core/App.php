<?php

/*
front end controller
 */



class App{
    protected $controller = "HomeController";
    protected $action = "index";

    protected $params = [];


    /*
    constructor
    */
    public function __construct()
    {
        $this->prepareURL();
        $this->redner();
    }


    /*
    function to extract controller , actions and parameters
    */

    private function prepareURL()
    {
    $url = $_SERVER['QUERY_STRING'];
    if (!empty($url)) {
        $url = trim($url, "/");
        $url = explode("/", $url);
        $this->controller = isset($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";
        $this->action = isset($url[1]) ? $url[1] : "index";
        unset($url[0], $url[1]);
        $this->params = !empty($url) ? array_values($url) : [];
        }
    }


    private function redner(){
        if(class_exists($this->controller)){
            $controller = new $this->controller;
            if(method_exists($controller,$this->action)){
                call_user_func_array([$controller,$this->action],$this->params);
            }
            else{
                echo "this method doesn't exists";
            }
        }
        else{
            echo "this controller doesn't exists";
        }
    }


}