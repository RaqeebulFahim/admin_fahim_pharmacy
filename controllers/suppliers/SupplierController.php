
<?php

class SupplierController{

function index(){
    view("suppliers");
}

function create(){
    view("suppliers");
}

function save(){
    if(isset($_POST['submit'])){
        $id=  $_POST['id'];
        $name= $_POST['name'];
        $address= $_POST['address'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
        $photo= $_POST['photo'];

        $supplier = new supplier( $id, $name, $address, $phone, $email, $photo);
        $supplier->save();

        redirect ("index");
    }
}


function edit($id){
    view("suppliers",Supplier::search($id));
}



function update(){
    if(isset($_POST['update'])){
        $id=  $_POST['id'];
        $name= $_POST['name'];
        $address= $_POST['address'];
        $phone= $_POST['phone'];
        $email= $_POST['email'];
        $photo= $_POST['photo'];

        $supplier = new supplier( $id, $name, $address, $phone, $email, $photo);
        $supplier->update();

        redirect ("index");
    }
}

function delete($id){
    view("suppliers",Supplier::search($id));
}
function confirm_delete(){
    if(isset($_POST['delete'])){
        $id=  $_POST['id'];
        Supplier::delete($id);
       
    }
    redirect ("index");
}


}
