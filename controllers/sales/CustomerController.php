<?php
class CustomerController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Sales");
	}
	public function create(){
		view("Sales");
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
      global $now;
		if(count($errors)==0){
			$customer=new Customer();
		$customer->name=$data["name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->address=$data["address"];
		$customer->photo=File::upload($file["photo"], "img",$data["id"]);
		$customer->created_at=$now;
		$customer->updated_at=$now;

			$customer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Sales",Customer::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/
		if(count($errors)==0){
			$customer=new Customer();
			$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->address=$data["address"];
		if($file["photo"]["name"]!=""){
			$customer->photo=File::upload($file["photo"], "img",$data["id"]);
		}else{
			$customer->photo=Customer::find($data["id"])->photo;
		}
		$customer->created_at=$now;
		$customer->updated_at=$now;

		$customer->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Sales");
	}
	public function delete($id){
		Customer::delete($id);
		redirect();
	}
	public function show($id){
		view("Sales",Customer::find($id));
	}
}
?>
