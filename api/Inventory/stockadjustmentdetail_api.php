<?php
class StockAdjustmentDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stock_adjustment_details"=>StockAdjustmentDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stock_adjustment_details"=>StockAdjustmentDetail::pagination($page,$perpage),"total_records"=>StockAdjustmentDetail::count()]);
	}
	function find($data){
		echo json_encode(["stockadjustmentdetail"=>StockAdjustmentDetail::find($data["id"])]);
	}
	function delete($data){
		StockAdjustmentDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stockadjustmentdetail=new StockAdjustmentDetail();
		$stockadjustmentdetail->stock_adjustment_id=$data["stock_adjustment_id"];
		$stockadjustmentdetail->product_id=$data["product_id"];
		$stockadjustmentdetail->quantity=$data["quantity"];
		$stockadjustmentdetail->remark=$data["remark"];

		$stockadjustmentdetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stockadjustmentdetail=new StockAdjustmentDetail();
		$stockadjustmentdetail->id=$data["id"];
		$stockadjustmentdetail->stock_adjustment_id=$data["stock_adjustment_id"];
		$stockadjustmentdetail->product_id=$data["product_id"];
		$stockadjustmentdetail->quantity=$data["quantity"];
		$stockadjustmentdetail->remark=$data["remark"];
		$stockadjustmentdetail->updated_at=$now;

		$stockadjustmentdetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
