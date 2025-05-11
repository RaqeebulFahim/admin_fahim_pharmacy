<?php
class SupplierReturnController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("supplier_returns");
	}
	public function create(){
		view("supplier_returns");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_return"])){
		$errors["total_return"]="Invalid total_return";
	}

*/
		if(count($errors)==0){
			$supplierreturn=new SupplierReturn();
		$supplierreturn->supplier_id=$data["supplier_id"];
		$supplierreturn->purchase_id=$data["purchase_id"];
		$supplierreturn->product_id=$data["product_id"];
		$supplierreturn->total_order=$data["total_order"];
		$supplierreturn->total_return=$data["total_return"];

			$supplierreturn->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("supplier_returns",SupplierReturn::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_return"])){
		$errors["total_return"]="Invalid total_return";
	}

*/
		if(count($errors)==0){
			$supplierreturn=new SupplierReturn();
			$supplierreturn->id=$data["id"];
		$supplierreturn->supplier_id=$data["supplier_id"];
		$supplierreturn->purchase_id=$data["purchase_id"];
		$supplierreturn->product_id=$data["product_id"];
		$supplierreturn->total_order=$data["total_order"];
		$supplierreturn->total_return=$data["total_return"];

		$supplierreturn->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("supplier_returns");
	}
	public function delete($id){
		SupplierReturn::delete($id);
		redirect();
	}
	public function show($id){
		view("supplier_returns",SupplierReturn::find($id));
	}
}
?>
