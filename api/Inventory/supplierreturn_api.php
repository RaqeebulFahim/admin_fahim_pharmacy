<?php
class SupplierReturnApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["supplier_returns"=>SupplierReturn::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["supplier_returns"=>SupplierReturn::pagination($page,$perpage),"total_records"=>SupplierReturn::count()]);
	}
	function find($data){
		echo json_encode(["supplierreturn"=>SupplierReturn::find($data["id"])]);
	}
	function delete($data){
		SupplierReturn::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$supplierreturn=new SupplierReturn();
		$supplierreturn->supplier_id=$data["supplier_id"];
		$supplierreturn->purchase_id=$data["purchase_id"];
		$supplierreturn->product_id=$data["product_id"];

		$supplierreturn->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$supplierreturn=new SupplierReturn();
		$supplierreturn->id=$data["id"];
		$supplierreturn->supplier_id=$data["supplier_id"];
		$supplierreturn->purchase_id=$data["purchase_id"];
		$supplierreturn->product_id=$data["product_id"];

		$supplierreturn->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
