<?php
class CategoryController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("category");
	}
	public function create(){
		view("category");
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
			$category=new Category();
		$category->name=$data["name"];
		$category->created_at=$now;
		$category->updated_at=$now;

			$category->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("category",Category::find($id));
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
			$category=new Category();
			$category->id=$data["id"];
		$category->name=$data["name"];
		$category->created_at=$now;
		$category->updated_at=$now;

		$category->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("category");
	}
	public function delete($id){
		Category::delete($id);
		redirect();
	}
	public function show($id){
		view("category",Category::find($id));
	}
}
?>
