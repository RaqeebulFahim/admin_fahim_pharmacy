<?php
class Stock extends Model implements JsonSerializable{
	public $id;
	public $product_id;
	public $quantity;
	public $transaction_type_id;
	public $warehouse_id;
	public $remark;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$product_id,$quantity,$transaction_type_id,$warehouse_id,$remark,$created_at,$updated_at){
		$this->id=$id;
		$this->product_id=$product_id;
		$this->quantity=$quantity;
		$this->transaction_type_id=$transaction_type_id;
		$this->warehouse_id=$warehouse_id;
		$this->remark=$remark;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock(product_id,quantity,transaction_type_id,warehouse_id,remark)values('$this->product_id','$this->quantity','$this->transaction_type_id','$this->warehouse_id','$this->remark')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock set product_id='$this->product_id',quantity='$this->quantity',transaction_type_id='$this->transaction_type_id',warehouse_id='$this->warehouse_id',remark='$this->remark',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,product_id,quantity,transaction_type_id,warehouse_id,remark,created_at,updated_at from {$tx}stock");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,product_id,quantity,transaction_type_id,warehouse_id,remark,created_at,updated_at from {$tx}stock $criteria limit $top,$perpage");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function count_stock($criteria=""){
		global $db,$tx;
		$result =$db->query("select sum(quantity) count from {$tx}stock $criteria ");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,product_id,quantity,transaction_type_id,warehouse_id,remark,created_at,updated_at from {$tx}stock where id='$id'");
		$stock=$result->fetch_object();
			return $stock;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock");
		$stock =$result->fetch_object();
		return $stock->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Product Id:$this->product_id<br> 
		Quantity:$this->quantity<br> 
		Transaction Type Id:$this->transaction_type_id<br> 
		Warehouse Id:$this->warehouse_id<br> 
		Remark:$this->remark<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStock"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock");
		while($stock=$result->fetch_object()){
			$html.="<option value ='$stock->id'>$stock->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stock $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;

		// SELECT s.product_id ,p.name , sum(s.quantity) qty   FROM stock s join products p on p.id = s.product_id   group by product_id;

		$result=$db->query("select s.id, p.name product_id ,sum(s.quantity) quantity,transaction_type_id,warehouse_id,remark,s.created_at,s.updated_at from {$tx}stock s  join {$tx}products p on p.id = s.product_id group by s.product_id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stock/create","text"=>"New Stock"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Product</th><th>Quantity</th><th>Transaction Type Id</th><th>Warehouse Id</th><th>Remark</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Product</th><th>Quantity</th><th>Transaction Type Id</th><th>Warehouse Id</th><th>Remark</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($stock=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stock/show/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stock/edit/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stock/confirm/$stock->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stock->id</td><td>$stock->product_id</td><td>$stock->quantity</td><td>$stock->transaction_type_id</td><td>$stock->warehouse_id</td><td>$stock->remark</td><td>$stock->created_at</td><td>$stock->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,product_id,quantity,transaction_type_id,warehouse_id,remark,created_at,updated_at from {$tx}stock where id={$id}");
		$stock=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Stock Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stock->id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$stock->product_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$stock->quantity</td></tr>";
		$html.="<tr><th>Transaction Type Id</th><td>$stock->transaction_type_id</td></tr>";
		$html.="<tr><th>Warehouse Id</th><td>$stock->warehouse_id</td></tr>";
		$html.="<tr><th>Remark</th><td>$stock->remark</td></tr>";
		$html.="<tr><th>Created At</th><td>$stock->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$stock->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
