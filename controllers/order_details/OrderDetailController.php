<?php
class OrderDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("order_details");
	}
	public function create(){
		view("order_details");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$orderdetail=new OrderDetail();
		$orderdetail->order_id=$data["order_id"];
		$orderdetail->product_id=$data["product_id"];
		$orderdetail->quantity=$data["quantity"];
		$orderdetail->price=$data["price"];
		$orderdetail->discount=$data["discount"];
		$orderdetail->vat=$data["vat"];
		$orderdetail->total_price=$data["total_price"];
		$orderdetail->created_at=$now;
		$orderdetail->updated_at=$now;

			$orderdetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("order_details",OrderDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["vat"])){
		$errors["vat"]="Invalid vat";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$orderdetail=new OrderDetail();
			$orderdetail->id=$data["id"];
		$orderdetail->order_id=$data["order_id"];
		$orderdetail->product_id=$data["product_id"];
		$orderdetail->quantity=$data["quantity"];
		$orderdetail->price=$data["price"];
		$orderdetail->discount=$data["discount"];
		$orderdetail->vat=$data["vat"];
		$orderdetail->total_price=$data["total_price"];
		$orderdetail->created_at=$now;
		$orderdetail->updated_at=$now;

		$orderdetail->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("order_details");
	}
	public function delete($id){
		OrderDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("order_details",OrderDetail::find($id));
	}
}
?>
