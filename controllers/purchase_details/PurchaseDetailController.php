<?php
class PurchaseDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("purchase_details");
	}
	public function create(){
		view("purchase_details");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
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
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$purchasedetail=new PurchaseDetail();
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->quantity=$data["quantity"];
		$purchasedetail->price=$data["price"];
		$purchasedetail->discount=$data["discount"];
		$purchasedetail->total_price=$data["total_price"];
		$purchasedetail->created_at=$now;
		$purchasedetail->updated_at=$now;

			$purchasedetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("purchase_details",PurchaseDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["purchase_id"])){
		$errors["purchase_id"]="Invalid purchase_id";
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
	if(!preg_match("/^[\s\S]+$/",$data["total_price"])){
		$errors["total_price"]="Invalid total_price";
	}

*/
		if(count($errors)==0){
			$purchasedetail=new PurchaseDetail();
			$purchasedetail->id=$data["id"];
		$purchasedetail->purchase_id=$data["purchase_id"];
		$purchasedetail->product_id=$data["product_id"];
		$purchasedetail->quantity=$data["quantity"];
		$purchasedetail->price=$data["price"];
		$purchasedetail->discount=$data["discount"];
		$purchasedetail->total_price=$data["total_price"];
		$purchasedetail->created_at=$now;
		$purchasedetail->updated_at=$now;

		$purchasedetail->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("purchase_details");
	}
	public function delete($id){
		PurchaseDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("purchase_details",PurchaseDetail::find($id));
	}
}
?>
