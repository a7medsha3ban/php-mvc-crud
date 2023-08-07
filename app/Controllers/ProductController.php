<?php

class ProductController{
    public function index(){
        //instance of product model
        $product = new Product();
        $data['products'] = $product->getAllProducts();
        //load products view and send data as params
        View::load("product/index",$data);
    }

    // function to load add view
    public function add(){
        View::load("product/add");
    }


    // function to store new product in db
    public function store(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $data = array(
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "quantity" => $quantity
            );
            $product = new Product();
            if($product->insert($data)){
                View::load("product/add",["success" => "product added successfully"]);
            }
            else{
                View::load("product/add" , ["error" => "product add failed"]);
            }
        }
    }


    // function to delete product
    public function delete($id){
        $product = new Product();
        if($product->delete($id)){
            View::load("product/delete",["success" => "product deleted successfully"]);
        }
        View::load("product/delete",["error" => "product deletion failed"]);
    }

    public function edit($id){
        $product = new Product();
        if($product->getRow($id)){
            $data['row'] = $product->getRow($id);
            View::load("product/edit",$data);
        }
    }

    public function update($id){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $data = array(
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "quantity" => $quantity
            );
            $product = new Product();
            if($product->update($id,$data)){
                View::load("product/edit",["success" => "product updated successfully","row" => $product->getRow($id)]);
            }
            else{
                View::load("product/edit" , ["error" => "product update failed","row" => $product->getRow($id)]);
            }
        }
    }

}