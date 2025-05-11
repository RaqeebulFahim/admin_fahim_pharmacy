<?php
class PurchaseController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("purchases");
	}
	public function create(){
		view("purchases");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_discount"])){
		$errors["total_discount"]="Invalid total_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaidAmount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStatus"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShippingAddress"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_order=$data["total_order"];
		$purchase->Purchase_date=date("Y-m-d",strtotime($data["Purchase_date"]));
		$purchase->total_discount=$data["total_discount"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->status=$data["status"];
		$purchase->shipping_address=$data["shipping_address"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

			$purchase->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("purchases",Purchase::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_discount"])){
		$errors["total_discount"]="Invalid total_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPaidAmount"])){
		$errors["paid_amount"]="Invalid paid_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStatus"])){
		$errors["status"]="Invalid status";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtShippingAddress"])){
		$errors["shipping_address"]="Invalid shipping_address";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
			$purchase->id=$data["id"];
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_order=$data["total_order"];
		$purchase->Purchase_date=date("Y-m-d",strtotime($data["Purchase_date"]));
		$purchase->total_discount=$data["total_discount"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->status=$data["status"];
		$purchase->shipping_address=$data["shipping_address"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

		$purchase->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("purchases");
	}
	public function delete($id){
		Purchase::delete($id);
		redirect();
	}
	public function show($id){
		view("purchases",Purchase::find($id));
	}
}
?>
