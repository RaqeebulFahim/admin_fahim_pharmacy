<?php
class AdjustmentTypeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["Adjustment_types"=>AdjustmentType::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["Adjustment_types"=>AdjustmentType::pagination($page,$perpage),"total_records"=>AdjustmentType::count()]);
	}
	function find($data){
		echo json_encode(["adjustmenttype"=>AdjustmentType::find($data["id"])]);
	}
	function delete($data){
		AdjustmentType::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$adjustmenttype=new AdjustmentType();
		$adjustmenttype->name=$data["name"];
		$adjustmenttype->factor=$data["factor"];

		$adjustmenttype->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$adjustmenttype=new AdjustmentType();
		$adjustmenttype->id=$data["id"];
		$adjustmenttype->name=$data["name"];
		$adjustmenttype->factor=$data["factor"];
		$adjustmenttype->updated_at=$now;

		$adjustmenttype->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
