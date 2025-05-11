<?php
class SaleApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["sales"=>Sale::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["sales"=>Sale::pagination($page,$perpage),"total_records"=>Sale::count()]);
	}
	function find($data){
		echo json_encode(["sale"=>Sale::find($data["id"])]);
	}
	function delete($data){
		Sale::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$sale=new Sale();
		$sale->customer_name=$data["customer_name"];
		$sale->customer_contact=$data["customer_contact"];
		$sale->sale_date=$data["sale_date"];
		$sale->customer_id=$data["customer_id"];

		$sale->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$sale=new Sale();
		$sale->id=$data["id"];
		$sale->customer_name=$data["customer_name"];
		$sale->customer_contact=$data["customer_contact"];
		$sale->sale_date=$data["sale_date"];
		$sale->customer_id=$data["customer_id"];
		$sale->updated_at=$now;

		$sale->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
