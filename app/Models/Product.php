<?php

class Product extends Model {
    private $table = "products";
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }
    public function getAllProducts(){
        return $this->conn->get('products');
    }
    public function insert($data){
        return $this->conn->insert($this->table,$data);
    }
    public function delete($id){
        return $this->conn->where("id" ,$id)->delete($this->table);
    }
    public function getRow($id){
        return $this->conn->where('id',$id)->getOne($this->table);
    }
    public function update($id,$data){
        return $this->conn->where("id" ,$id)->update($this->table,$data);
    }
}