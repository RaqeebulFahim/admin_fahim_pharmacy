<?php
class ManufacturerController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("manufacturer");
	}
	public function create(){
		view("manufacturer");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_website($data["website"])){
		$errors["website"]="Invalid website";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCountry"])){
		$errors["country"]="Invalid country";
	}

*/
		if(count($errors)==0){
			$manufacturer=new Manufacturer();
		$manufacturer->name=$data["name"];
		$manufacturer->email=$data["email"];
		$manufacturer->phone=$data["phone"];
		$manufacturer->website=$data["website"];
		$manufacturer->country=$data["country"];
		$manufacturer->created_at=$now;
		$manufacturer->updated_at=$now;

			$manufacturer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("manufacturer",Manufacturer::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_website($data["website"])){
		$errors["website"]="Invalid website";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCountry"])){
		$errors["country"]="Invalid country";
	}

*/
		if(count($errors)==0){
			$manufacturer=new Manufacturer();
			$manufacturer->id=$data["id"];
		$manufacturer->name=$data["name"];
		$manufacturer->email=$data["email"];
		$manufacturer->phone=$data["phone"];
		$manufacturer->website=$data["website"];
		$manufacturer->country=$data["country"];
		$manufacturer->created_at=$now;
		$manufacturer->updated_at=$now;

		$manufacturer->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("manufacturer");
	}
	public function delete($id){
		Manufacturer::delete($id);
		redirect();
	}
	public function show($id){
		view("manufacturer",Manufacturer::find($id));
	}
}
?>
