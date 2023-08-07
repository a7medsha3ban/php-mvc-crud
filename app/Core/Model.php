<?php

require_once (LIBS."DB/MysqliDb.php");

class Model{
    protected $database;

    public function connect(){
        $db = new MysqliDb (HOST, USER, PASSWORD, DBNAME);
        if(!$db->connect()){
            $this->database = $db;
            return $this->database;
        }
        else{
            echo "error";
        }
    }
}