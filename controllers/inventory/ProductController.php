<?php

class ProductController{
    function index(){
        view("products");
    }

    function create(){
        view("products");
    }
    
    function save(){
        // print_r($_POST);
        // view("products");
        if(isset($_POST['submit'])){
            $id=  $_POST['id'];
            $name= $_POST['name'];
            $quantity= $_POST['quantity'];
            $price= $_POST['price'];
            $discount= $_POST['discount'];
            $final_price= $_POST['final_price'];
            $category_id= $_POST['category_id'];
            $uom_id= $_POST['uom_id'];
            $barcode= $_POST['barcode'];
            $sku= $_POST['sku'];
            $manufacturer_id= $_POST['manufacturer_id'];
            $description= $_POST['description'];
    
            $product = new product( $id, $name, $quantity, $price, $discount, $final_price, $category_id, $uom_id, $barcode, $sku, $manufacturer_id, $description );
            $product->save();
    
            redirect ("index");
        }
    }

    function edit($id){
        view("products",Product::search($id));
    }

    function update(){
        // print_r($_POST);
        // view("products");
        if(isset($_POST['update'])){
            $id=  $_POST['id'];
            $name= $_POST['name'];
            $quantity= $_POST['quantity'];
            $price= $_POST['price'];
            $discount= $_POST['discount'];
            $final_price= $_POST['final_price'];
            $category_id= $_POST['category_id'];
            $uom_id= $_POST['uom_id'];
            $barcode= $_POST['barcode'];
            $sku= $_POST['sku'];
            $manufacturer_id= $_POST['manufacturer_id'];
            $description= $_POST['description'];
    
            $product = new product( $id, $name, $quantity, $price, $discount, $final_price, $category_id, $uom_id, $barcode, $sku, $manufacturer_id, $description );
            $product->update();
    
            redirect ("index");
        }
    }


    function delete($id){
        view("products",Product::search($id));
    }
    
    function confirm_delete(){
        if(isset($_POST['delete'])){
            $id=  $_POST['id'];
            Product::delete($id);
           
        }
        redirect ("index");
    }


};
