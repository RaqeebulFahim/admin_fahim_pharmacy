<?php
class StockAdjustmentApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock_adjustments"=>StockAdjustment::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock_adjustments"=>StockAdjustment::pagination($page,$perpage),"total_records"=>StockAdjustment::count()]);
	}
	function find($data){
		echo json_encode(["stockadjustment"=>StockAdjustment::find($data["id"])]);
	}
	function delete($data){
		StockAdjustment::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->name=$data["name"];
		$stockadjustment->adjustment_type=$data["adjustment_type"];
		$stockadjustment->warehouse_id=$data["warehouse_id"];
		$stockadjustment->remark=$data["remark"];

		$stockadjustment->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stockadjustment=new StockAdjustment();
		$stockadjustment->id=$data["id"];
		$stockadjustment->name=$data["name"];
		$stockadjustment->adjustment_type=$data["adjustment_type"];
		$stockadjustment->warehouse_id=$data["warehouse_id"];
		$stockadjustment->remark=$data["remark"];
		$stockadjustment->updated_at=$now;

		$stockadjustment->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
