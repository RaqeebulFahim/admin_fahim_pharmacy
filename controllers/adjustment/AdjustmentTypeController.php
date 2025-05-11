<?php
class AdjustmentTypeController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("adjustment");
	}
	public function create(){
		view("adjustment");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["factor"])){
		$errors["factor"]="Invalid factor";
	}

*/
		if(count($errors)==0){
			$adjustmenttype=new AdjustmentType();
		$adjustmenttype->name=$data["name"];
		$adjustmenttype->factor=$data["factor"];
		$adjustmenttype->created_at=$now;
		$adjustmenttype->updated_at=$now;

			$adjustmenttype->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("adjustment",AdjustmentType::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["factor"])){
		$errors["factor"]="Invalid factor";
	}

*/
		if(count($errors)==0){
			$adjustmenttype=new AdjustmentType();
			$adjustmenttype->id=$data["id"];
		$adjustmenttype->name=$data["name"];
		$adjustmenttype->factor=$data["factor"];
		$adjustmenttype->created_at=$now;
		$adjustmenttype->updated_at=$now;

		$adjustmenttype->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("adjustment");
	}
	public function delete($id){
		AdjustmentType::delete($id);
		redirect();
	}
	public function show($id){
		view("adjustment",AdjustmentType::find($id));
	}
}
?>
