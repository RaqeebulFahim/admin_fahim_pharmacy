<?php
class Purchase extends Model implements JsonSerializable{
	public $id;
	public $supplier_id;
	public $total_order;
	public $Purchase_date;
	public $total_discount;
	public $total_amount;
	public $paid_amount;
	public $status;
	public $shipping_address;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$supplier_id,$total_order,$Purchase_date,$total_discount,$total_amount,$paid_amount,$status,$shipping_address,$created_at,$updated_at){
		$this->id=$id;
		$this->supplier_id=$supplier_id;
		$this->total_order=$total_order;
		$this->Purchase_date=$Purchase_date;
		$this->total_discount=$total_discount;
		$this->total_amount=$total_amount;
		$this->paid_amount=$paid_amount;
		$this->status=$status;
		$this->shipping_address=$shipping_address;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}purchases(supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at)values('$this->supplier_id','$this->total_order','$this->Purchase_date','$this->total_discount','$this->total_amount','$this->paid_amount','$this->status','$this->shipping_address','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}purchases set supplier_id='$this->supplier_id',total_order='$this->total_order',Purchase_date='$this->Purchase_date',total_discount='$this->total_discount',total_amount='$this->total_amount',paid_amount='$this->paid_amount',status='$this->status',shipping_address='$this->shipping_address',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}purchases where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at from {$tx}purchases");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}purchases $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}

	public static function revenue($criteria=""){
		global $db,$tx;
		$result =$db->query("select sum(total_amount) count from {$tx}purchases $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at from {$tx}purchases where id='$id'");
		$purchase=$result->fetch_object();
			return $purchase;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchases");
		$purchase =$result->fetch_object();
		return $purchase->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Supplier Id:$this->supplier_id<br> 
		Total Order:$this->total_order<br> 
		Purchase Date:$this->Purchase_date<br> 
		Total Discount:$this->total_discount<br> 
		Total Amount:$this->total_amount<br> 
		Paid Amount:$this->paid_amount<br> 
		Status:$this->status<br> 
		Shipping Address:$this->shipping_address<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPurchase"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchases");
		while($purchase=$result->fetch_object()){
			$html.="<option value ='$purchase->id'>$purchase->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}purchases $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"purchase/create","text"=>"New Purchase"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Total Order</th><th>Purchase Date</th><th>Total Discount</th><th>Total Amount</th><th>Paid Amount</th><th>Status</th><th>Shipping Address</th><th>Action</th></tr>";
			
// 			<th>Created At</th><th>Updated At</th>

		}else{
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Total Order</th><th>Purchase Date</th><th>Total Discount</th><th>Total Amount</th><th>Paid Amount</th><th>Status</th><th>Shipping Address</th></tr>";
			
// 			<th>Created At</th><th>Updated At</th>
			
		}
		while($purchase=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"purchase/show/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"purchase/edit/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"purchase/confirm/$purchase->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$purchase->id</td><td>$purchase->supplier_id</td><td>$purchase->total_order</td><td>$purchase->Purchase_date</td><td>$purchase->total_discount</td><td>$purchase->total_amount</td><td>$purchase->paid_amount</td><td>$purchase->status</td><td>$purchase->shipping_address</td> $action_buttons</tr>";
			
// 			<td>$purchase->created_at</td><td>$purchase->updated_at</td>
			
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,supplier_id,total_order,Purchase_date,total_discount,total_amount,paid_amount,status,shipping_address,created_at,updated_at from {$tx}purchases where id={$id}");
		$purchase=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Purchase Show</th></tr>";
		$html.="<tr><th>Id</th><td>$purchase->id</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$purchase->supplier_id</td></tr>";
		$html.="<tr><th>Total Order</th><td>$purchase->total_order</td></tr>";
		$html.="<tr><th>Purchase Date</th><td>$purchase->Purchase_date</td></tr>";
		$html.="<tr><th>Total Discount</th><td>$purchase->total_discount</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$purchase->total_amount</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$purchase->paid_amount</td></tr>";
		$html.="<tr><th>Status</th><td>$purchase->status</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$purchase->shipping_address</td></tr>";
// 		$html.="<tr><th>Created At</th><td>$purchase->created_at</td></tr>";
// 		$html.="<tr><th>Updated At</th><td>$purchase->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
