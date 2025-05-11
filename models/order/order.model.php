<?php
class Order extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $total_order;
	public $total_discount;
	public $vat_amount;
	public $total_amount;
	public $paid_amount;
	public $status;
	public $shipping_address;
	public $order_date;
	public $delivery_date;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$total_order,$total_discount,$vat_amount,$total_amount,$paid_amount,$status,$shipping_address,$order_date,$delivery_date,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->total_order=$total_order;
		$this->total_discount=$total_discount;
		$this->vat_amount=$vat_amount;
		$this->total_amount=$total_amount;
		$this->paid_amount=$paid_amount;
		$this->status=$status;
		$this->shipping_address=$shipping_address;
		$this->order_date=$order_date;
		$this->delivery_date=$delivery_date;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at)values('$this->customer_id','$this->total_order','$this->total_discount','$this->vat_amount','$this->total_amount','$this->paid_amount','$this->status','$this->shipping_address','$this->order_date','$this->delivery_date','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set customer_id='$this->customer_id',total_order='$this->total_order',total_discount='$this->total_discount',vat_amount='$this->vat_amount',total_amount='$this->total_amount',paid_amount='$this->paid_amount',status='$this->status',shipping_address='$this->shipping_address',order_date='$this->order_date',delivery_date='$this->delivery_date',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at from {$tx}orders");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at from {$tx}orders where id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders");
		$order =$result->fetch_object();
		return $order->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Total Order:$this->total_order<br> 
		Total Discount:$this->total_discount<br> 
		Vat Amount:$this->vat_amount<br> 
		Total Amount:$this->total_amount<br> 
		Paid Amount:$this->paid_amount<br> 
		Status:$this->status<br> 
		Shipping Address:$this->shipping_address<br> 
		Order Date:$this->order_date<br> 
		Delivery Date:$this->delivery_date<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders");
		while($order=$result->fetch_object()){
			$html.="<option value ='$order->id'>$order->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"order/create","text"=>"New Order"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Total Order</th><th>Total Discount</th><th>Vat Amount</th><th>Total Amount</th><th>Paid Amount</th><th>Status</th><th>Shipping Address</th><th>Order Date</th><th>Delivery Date</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Total Order</th><th>Total Discount</th><th>Vat Amount</th><th>Total Amount</th><th>Paid Amount</th><th>Status</th><th>Shipping Address</th><th>Order Date</th><th>Delivery Date</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"order/show/$order->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"order/edit/$order->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"order/confirm/$order->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$order->customer_id</td><td>$order->total_order</td><td>$order->total_discount</td><td>$order->vat_amount</td><td>$order->total_amount</td><td>$order->paid_amount</td><td>$order->status</td><td>$order->shipping_address</td><td>$order->order_date</td><td>$order->delivery_date</td><td>$order->created_at</td><td>$order->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,total_order,total_discount,vat_amount,total_amount,paid_amount,status,shipping_address,order_date,delivery_date,created_at,updated_at from {$tx}orders where id={$id}");
		$order=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Order Show</th></tr>";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$order->customer_id</td></tr>";
		$html.="<tr><th>Total Order</th><td>$order->total_order</td></tr>";
		$html.="<tr><th>Total Discount</th><td>$order->total_discount</td></tr>";
		$html.="<tr><th>Vat Amount</th><td>$order->vat_amount</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$order->total_amount</td></tr>";
		$html.="<tr><th>Paid Amount</th><td>$order->paid_amount</td></tr>";
		$html.="<tr><th>Status</th><td>$order->status</td></tr>";
		$html.="<tr><th>Shipping Address</th><td>$order->shipping_address</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$order->delivery_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
