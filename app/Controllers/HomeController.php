<?php

class HomeController{
    public function index(){
        $data['title'] = "Home Page";
        $data['content'] = "Content of Home Page";
        View::load("home",$data);
    }
}