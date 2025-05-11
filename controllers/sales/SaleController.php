<?php
class SaleController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("sales");
	}
	public function create(){
		view("sales");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCustomerName"])){
		$errors["customer_name"]="Invalid customer_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCustomerContact"])){
		$errors["customer_contact"]="Invalid customer_contact";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_amount"])){
		$errors["discount_amount"]="Invalid discount_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["net_amount"])){
		$errors["net_amount"]="Invalid net_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}

*/
		if(count($errors)==0){
			$sale=new Sale();
		$sale->customer_name=$data["customer_name"];
		$sale->customer_contact=$data["customer_contact"];
		$sale->total_amount=$data["total_amount"];
		$sale->discount_amount=$data["discount_amount"];
		$sale->net_amount=$data["net_amount"];
		$sale->sale_date=date("Y-m-d",strtotime($data["sale_date"]));
		$sale->customer_id=$data["customer_id"];
		$sale->created_at=$now;
		$sale->updated_at=$now;

			$sale->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("sales",Sale::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCustomerName"])){
		$errors["customer_name"]="Invalid customer_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtCustomerContact"])){
		$errors["customer_contact"]="Invalid customer_contact";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_amount"])){
		$errors["discount_amount"]="Invalid discount_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["net_amount"])){
		$errors["net_amount"]="Invalid net_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}

*/
		if(count($errors)==0){
			$sale=new Sale();
			$sale->id=$data["id"];
		$sale->customer_name=$data["customer_name"];
		$sale->customer_contact=$data["customer_contact"];
		$sale->total_amount=$data["total_amount"];
		$sale->discount_amount=$data["discount_amount"];
		$sale->net_amount=$data["net_amount"];
		$sale->sale_date=date("Y-m-d",strtotime($data["sale_date"]));
		$sale->customer_id=$data["customer_id"];
		$sale->created_at=$now;
		$sale->updated_at=$now;

		$sale->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("sales");
	}
	public function delete($id){
		Sale::delete($id);
		redirect();
	}
	public function show($id){
		view("sales",Sale::find($id));
	}
}
?>
