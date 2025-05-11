<?php
class StockAdjustment extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $adjustment_type;
	public $warehouse_id;
	public $remark;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$adjustment_type,$warehouse_id,$remark,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->adjustment_type=$adjustment_type;
		$this->warehouse_id=$warehouse_id;
		$this->remark=$remark;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustments(name,adjustment_type,warehouse_id,remark,created_at,updated_at)values('$this->name','$this->adjustment_type','$this->warehouse_id','$this->remark','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustments set name='$this->name',adjustment_type='$this->adjustment_type',warehouse_id='$this->warehouse_id',remark='$this->remark',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustments where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,adjustment_type,warehouse_id,remark,created_at,updated_at from {$tx}stock_adjustments");
		$data=[];
		while($stockadjustment=$result->fetch_object()){
			$data[]=$stockadjustment;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,adjustment_type,warehouse_id,remark,created_at,updated_at from {$tx}stock_adjustments $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustment=$result->fetch_object()){
			$data[]=$stockadjustment;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustments $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,adjustment_type,warehouse_id,remark,created_at,updated_at from {$tx}stock_adjustments where id='$id'");
		$stockadjustment=$result->fetch_object();
			return $stockadjustment;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustments");
		$stockadjustment =$result->fetch_object();
		return $stockadjustment->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Adjustment Type:$this->adjustment_type<br> 
		Warehouse Id:$this->warehouse_id<br> 
		Remark:$this->remark<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustment"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustments");
		while($stockadjustment=$result->fetch_object()){
			$html.="<option value ='$stockadjustment->id'>$stockadjustment->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustments $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,adjustment_type,warehouse_id,remark,created_at,updated_at from {$tx}stock_adjustments $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stockadjustment/create","text"=>"New StockAdjustment"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Adjustment Type</th><th>Warehouse Id</th><th>Remark</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Adjustment Type</th><th>Warehouse Id</th><th>Remark</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($stockadjustment=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stockadjustment/show/$stockadjustment->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stockadjustment/edit/$stockadjustment->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stockadjustment/confirm/$stockadjustment->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustment->id</td><td>$stockadjustment->name</td><td>$stockadjustment->adjustment_type</td><td>$stockadjustment->warehouse_id</td><td>$stockadjustment->remark</td><td>$stockadjustment->created_at</td><td>$stockadjustment->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,adjustment_type,warehouse_id,remark,created_at,updated_at from {$tx}stock_adjustments where id={$id}");
		$stockadjustment=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustment Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustment->id</td></tr>";
		$html.="<tr><th>Name</th><td>$stockadjustment->name</td></tr>";
		$html.="<tr><th>Adjustment Type</th><td>$stockadjustment->adjustment_type</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$stockadjustment->warehouse_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$stockadjustment->remark</td></tr>";
		$html.="<tr><th>Created At</th><td>$stockadjustment->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$stockadjustment->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
