<?php
class StatuController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("status");
	}
	public function create(){
		view("status");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
		if(count($errors)==0){
			$statu=new Statu();
		$statu->name=$data["name"];
		$statu->created_at=$now;
		$statu->updated_at=$now;

			$statu->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("status",Statu::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/
		if(count($errors)==0){
			$statu=new Statu();
			$statu->id=$data["id"];
		$statu->name=$data["name"];
		$statu->created_at=$now;
		$statu->updated_at=$now;

		$statu->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("status");
	}
	public function delete($id){
		Statu::delete($id);
		redirect();
	}
	public function show($id){
		view("status",Statu::find($id));
	}
}
?>
