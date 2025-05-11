<?php
class StockAdjustmentController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("stock_adjustment");
	}
	public function create(){
		view("stock_adjustment");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["adjustment_type"])){
		$errors["adjustment_type"]="Invalid adjustment_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stockadjustment=new StockAdjustment();
		$stockadjustment->name=$data["name"];
		$stockadjustment->adjustment_type=$data["adjustment_type"];
		$stockadjustment->warehouse_id=$data["warehouse_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->created_at=$now;
		$stockadjustment->updated_at=$now;

			$stockadjustment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("stock_adjustment",StockAdjustment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["adjustment_type"])){
		$errors["adjustment_type"]="Invalid adjustment_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["warehouse_id"])){
		$errors["warehouse_id"]="Invalid warehouse_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRemark"])){
		$errors["remark"]="Invalid remark";
	}

*/
		if(count($errors)==0){
			$stockadjustment=new StockAdjustment();
			$stockadjustment->id=$data["id"];
		$stockadjustment->name=$data["name"];
		$stockadjustment->adjustment_type=$data["adjustment_type"];
		$stockadjustment->warehouse_id=$data["warehouse_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->created_at=$now;
		$stockadjustment->updated_at=$now;

		$stockadjustment->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("stock_adjustment");
	}
	public function delete($id){
		StockAdjustment::delete($id);
		redirect();
	}
	public function show($id){
		view("stock_adjustment",StockAdjustment::find($id));
	}
}
?>
