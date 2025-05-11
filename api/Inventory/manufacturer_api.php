<?php
class ManufacturerApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["manufacturers"=>Manufacturer::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["manufacturers"=>Manufacturer::pagination($page,$perpage),"total_records"=>Manufacturer::count()]);
	}
	function find($data){
		echo json_encode(["manufacturer"=>Manufacturer::find($data["id"])]);
	}
	function delete($data){
		Manufacturer::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$manufacturer=new Manufacturer();
		$manufacturer->name=$data["name"];
		$manufacturer->email=$data["email"];
		$manufacturer->phone=$data["phone"];
		$manufacturer->website=$data["website"];
		$manufacturer->country=$data["country"];

		$manufacturer->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$manufacturer=new Manufacturer();
		$manufacturer->id=$data["id"];
		$manufacturer->name=$data["name"];
		$manufacturer->email=$data["email"];
		$manufacturer->phone=$data["phone"];
		$manufacturer->website=$data["website"];
		$manufacturer->country=$data["country"];
		$manufacturer->updated_at=$now;

		$manufacturer->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
