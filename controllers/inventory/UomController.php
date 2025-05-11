<?php
class UomController{
    function index(){
        view("inventory");
    }

    function create(){
        view("inventory");
    }
    
    function save(){
        print_r($_POST);
        // view("uom");
    }
    function display(){
       // print_r($_POST);
    }

}

   
