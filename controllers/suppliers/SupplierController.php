<?php
class SupplierController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("suppliers");
	}
	public function create(){
		view("suppliers");
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
		if(count($errors)==0){
			$supplier=new Supplier();
		$supplier->name=$data["name"];
		$supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		$supplier->website=$data["website"];
		$supplier->address=$data["address"];
		$supplier->photo=File::upload($file["photo"], "img",$data["id"]);
		$supplier->created_at=$now;
		$supplier->updated_at=$now;

			$supplier->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("suppliers",Supplier::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
		if(count($errors)==0){
			$supplier=new Supplier();
			$supplier->id=$data["id"];
		$supplier->name=$data["name"];
		$supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		$supplier->website=$data["website"];
		$supplier->address=$data["address"];
		if($file["photo"]["name"]!=""){
			$supplier->photo=File::upload($file["photo"], "img",$data["id"]);
		}else{
			$supplier->photo=Supplier::find($data["id"])->photo;
		}
		$supplier->created_at=$now;
		$supplier->updated_at=$now;

		$supplier->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("suppliers");
	}
	public function delete($id){
		Supplier::delete($id);
		redirect();
	}
	public function show($id){
		view("suppliers",Supplier::find($id));
	}
}
?>
