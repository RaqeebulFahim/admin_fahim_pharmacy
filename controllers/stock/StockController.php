<?php
class StockController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("stock");
	}
	public function create(){
		view("stock");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["transaction_type_id"])){
		$errors["transaction_type_id"]="Invalid transaction_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stock=new Stock();
		$stock->product_id=$data["product_id"];
		$stock->quantity=$data["quantity"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->remark=$data["remark"];
		$stock->created_at=$now;
		$stock->updated_at=$now;

			$stock->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("stock",Stock::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["product_id"])){
		$errors["product_id"]="Invalid product_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["transaction_type_id"])){
		$errors["transaction_type_id"]="Invalid transaction_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stock=new Stock();
			$stock->id=$data["id"];
		$stock->product_id=$data["product_id"];
		$stock->quantity=$data["quantity"];
		$stock->transaction_type_id=$data["transaction_type_id"];
		$stock->warehouse_id=$data["warehouse_id"];
		$stock->remark=$data["remark"];
		$stock->created_at=$now;
		$stock->updated_at=$now;

		$stock->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("stock");
	}
	public function delete($id){
		Stock::delete($id);
		redirect();
	}
	public function show($id){
		view("stock",Stock::find($id));
	}
}
?>
