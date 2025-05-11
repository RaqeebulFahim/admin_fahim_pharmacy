<?php
class ContactApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["contacts"=>Contact::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["contacts"=>Contact::pagination($page,$perpage),"total_records"=>Contact::count()]);
	}
	function find($data){
		echo json_encode(["contact"=>Contact::find($data["id"])]);
	}
	function delete($data){
		Contact::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$contact=new Contact();
		$contact->name=$data["name"];
		$contact->email=$data["email"];
		$contact->phone=$data["phone"];
		$contact->message=$data["message"];
         if ($data["name"] != "") {
			$contact->save();
		 }
		
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$contact=new Contact();
		$contact->id=$data["id"];
		$contact->name=$data["name"];
		$contact->email=$data["email"];
		$contact->phone=$data["phone"];
		$contact->message=$data["message"];

		$contact->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
