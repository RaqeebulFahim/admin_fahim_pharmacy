<?php
class StatusController{

    function index(){
        view("status");
    }
    function create(){
        view("status");
    }

    function save(){
        if(isset($_POST["submit"])){
            $id=$_POST["id"];
            $name=$_POST["name"];

            $status= new status($id,$name);
            $status->save();

            redirect ("index");
        }
    }

    function edit(){
        view("status" );
    }

    function update(){
        if(isset($_POST["update"])){
            $id=$_POST["id"];
            $name=$_POST["name"];

            $status= new status($id,$name);
            $status->update();

            redirect ("index");
        }

    
    }

    function delete(){
        $id=$_GET["id"];
        view("status",Status::search($id));
    }

    function confirm_delete(){
        if(isset($_POST['delete'])){
            $id=  $_POST['id'];
            Status::delete($id);
           
        }
        redirect ("index");
    }
    }

