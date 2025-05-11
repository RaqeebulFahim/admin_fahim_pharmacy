<?php
class StockAdjustmentDetail extends Model implements JsonSerializable{
	public $id;
	public $stock_adjustment_id;
	public $product_id;
	public $quantity;
	public $price;
	public $remark;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$stock_adjustment_id,$product_id,$quantity,$price,$remark,$created_at,$updated_at){
		$this->id=$id;
		$this->stock_adjustment_id=$stock_adjustment_id;
		$this->product_id=$product_id;
		$this->quantity=$quantity;
		$this->price=$price;
		$this->remark=$remark;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_details(stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at)values('$this->stock_adjustment_id','$this->product_id','$this->quantity','$this->price','$this->remark','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_details set stock_adjustment_id='$this->stock_adjustment_id',product_id='$this->product_id',quantity='$this->quantity',price='$this->price',remark='$this->remark',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at from {$tx}stock_adjustment_details");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustment_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at from {$tx}stock_adjustment_details where id='$id'");
		$stockadjustmentdetail=$result->fetch_object();
			return $stockadjustmentdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustment_details");
		$stockadjustmentdetail =$result->fetch_object();
		return $stockadjustmentdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Stock Adjustment Id:$this->stock_adjustment_id<br> 
		Product Id:$this->product_id<br> 
		Quantity:$this->quantity<br> 
		Price:$this->price<br> 
		Remark:$this->remark<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustmentDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustment_details");
		while($stockadjustmentdetail=$result->fetch_object()){
			$html.="<option value ='$stockadjustmentdetail->id'>$stockadjustmentdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustment_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stockadjustmentdetail/create","text"=>"New StockAdjustmentDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Stock Adjustment Id</th><th>Product Id</th><th>Quantity</th><th>Price</th><th>Remark</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Stock Adjustment Id</th><th>Product Id</th><th>Quantity</th><th>Price</th><th>Remark</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($stockadjustmentdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stockadjustmentdetail/show/$stockadjustmentdetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stockadjustmentdetail/edit/$stockadjustmentdetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stockadjustmentdetail/confirm/$stockadjustmentdetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustmentdetail->id</td><td>$stockadjustmentdetail->stock_adjustment_id</td><td>$stockadjustmentdetail->product_id</td><td>$stockadjustmentdetail->quantity</td><td>$stockadjustmentdetail->price</td><td>$stockadjustmentdetail->remark</td><td>$stockadjustmentdetail->created_at</td><td>$stockadjustmentdetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,stock_adjustment_id,product_id,quantity,price,remark,created_at,updated_at from {$tx}stock_adjustment_details where id={$id}");
		$stockadjustmentdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustmentDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustmentdetail->id</td></tr>";
		$html.="<tr><th>Stock Adjustment Id</th><td>$stockadjustmentdetail->stock_adjustment_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$stockadjustmentdetail->product_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$stockadjustmentdetail->quantity</td></tr>";
		$html.="<tr><th>Price</th><td>$stockadjustmentdetail->price</td></tr>";
		$html.="<tr><th>Remark</th><td>$stockadjustmentdetail->remark</td></tr>";
		$html.="<tr><th>Created At</th><td>$stockadjustmentdetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$stockadjustmentdetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
