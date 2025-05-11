<?php
class OrderController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("order");
	}
	public function create(){
		view("order");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_discount"])){
		$errors["total_discount"]="Invalid total_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat_amount"])){
		$errors["vat_amount"]="Invalid vat_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
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
			$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->total_order=$data["total_order"];
		$order->total_discount=$data["total_discount"];
		$order->vat_amount=$data["vat_amount"];
		$order->total_amount=$data["total_amount"];
		$order->paid_amount=$data["paid_amount"];
		$order->status=$data["status"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->created_at=$now;
		$order->updated_at=$now;

			$order->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("order",Order::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_order"])){
		$errors["total_order"]="Invalid total_order";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_discount"])){
		$errors["total_discount"]="Invalid total_discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat_amount"])){
		$errors["vat_amount"]="Invalid vat_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["paid_amount"])){
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
			$order=new Order();
			$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->total_order=$data["total_order"];
		$order->total_discount=$data["total_discount"];
		$order->vat_amount=$data["vat_amount"];
		$order->total_amount=$data["total_amount"];
		$order->paid_amount=$data["paid_amount"];
		$order->status=$data["status"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_date=date("Y-m-d",strtotime($data["order_date"]));
		$order->delivery_date=date("Y-m-d",strtotime($data["delivery_date"]));
		$order->created_at=$now;
		$order->updated_at=$now;

		$order->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("order");
	}
	public function delete($id){
		Order::delete($id);
		redirect();
	}
	public function show($id){
		view("order",Order::find($id));
	}
}
?>
