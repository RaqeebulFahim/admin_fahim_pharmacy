<?php
class StockAdjustmentDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("stock_adjustment_details");
	}
	public function create(){
		view("stock_adjustment_details");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["stock_adjustment_id"])){
		$errors["stock_adjustment_id"]="Invalid stock_adjustment_id";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stockadjustmentdetail=new StockAdjustmentDetail();
		$stockadjustmentdetail->stock_adjustment_id=$data["stock_adjustment_id"];
		$stockadjustmentdetail->product_id=$data["product_id"];
		$stockadjustmentdetail->quantity=$data["quantity"];
		$stockadjustmentdetail->price=$data["price"];
		$stockadjustmentdetail->remark=$data["remark"];
		$stockadjustmentdetail->created_at=$now;
		$stockadjustmentdetail->updated_at=$now;

			$stockadjustmentdetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("stock_adjustment_details",StockAdjustmentDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["stock_adjustment_id"])){
		$errors["stock_adjustment_id"]="Invalid stock_adjustment_id";
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stockadjustmentdetail=new StockAdjustmentDetail();
			$stockadjustmentdetail->id=$data["id"];
		$stockadjustmentdetail->stock_adjustment_id=$data["stock_adjustment_id"];
		$stockadjustmentdetail->product_id=$data["product_id"];
		$stockadjustmentdetail->quantity=$data["quantity"];
		$stockadjustmentdetail->price=$data["price"];
		$stockadjustmentdetail->remark=$data["remark"];
		$stockadjustmentdetail->created_at=$now;
		$stockadjustmentdetail->updated_at=$now;

		$stockadjustmentdetail->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("stock_adjustment_details");
	}
	public function delete($id){
		StockAdjustmentDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("stock_adjustment_details",StockAdjustmentDetail::find($id));
	}
}
?>
