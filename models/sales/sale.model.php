<?php
class Sale extends Model implements JsonSerializable{
	public $id;
	public $customer_name;
	public $customer_contact;
	public $total_amount;
	public $discount_amount;
	public $net_amount;
	public $sale_date;
	public $user_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_name,$customer_contact,$total_amount,$discount_amount,$net_amount,$sale_date,$user_id,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_name=$customer_name;
		$this->customer_contact=$customer_contact;
		$this->total_amount=$total_amount;
		$this->discount_amount=$discount_amount;
		$this->net_amount=$net_amount;
		$this->sale_date=$sale_date;
		$this->user_id=$user_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}Sales(customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at)values('$this->customer_name','$this->customer_contact','$this->total_amount','$this->discount_amount','$this->net_amount','$this->sale_date','$this->user_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}Sales set customer_name='$this->customer_name',customer_contact='$this->customer_contact',total_amount='$this->total_amount',discount_amount='$this->discount_amount',net_amount='$this->net_amount',sale_date='$this->sale_date',user_id='$this->user_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}Sales where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at from {$tx}Sales");
		$data=[];
		while($sale=$result->fetch_object()){
			$data[]=$sale;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at from {$tx}Sales $criteria limit $top,$perpage");
		$data=[];
		while($sale=$result->fetch_object()){
			$data[]=$sale;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}Sales $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at from {$tx}Sales where id='$id'");
		$sale=$result->fetch_object();
			return $sale;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}Sales");
		$sale =$result->fetch_object();
		return $sale->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Name:$this->customer_name<br> 
		Customer Contact:$this->customer_contact<br> 
		Total Amount:$this->total_amount<br> 
		Discount Amount:$this->discount_amount<br> 
		Net Amount:$this->net_amount<br> 
		Sale Date:$this->sale_date<br> 
		User Id:$this->user_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSale"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}Sales");
		while($sale=$result->fetch_object()){
			$html.="<option value ='$sale->id'>$sale->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}Sales $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at from {$tx}Sales $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"sale/create","text"=>"New Sale"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Customer Contact</th><th>Total Amount</th><th>Discount Amount</th><th>Net Amount</th><th>Sale Date</th><th>User Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Customer Contact</th><th>Total Amount</th><th>Discount Amount</th><th>Net Amount</th><th>Sale Date</th><th>User Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($sale=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"sale/show/$sale->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"sale/edit/$sale->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"sale/confirm/$sale->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$sale->id</td><td>$sale->customer_name</td><td>$sale->customer_contact</td><td>$sale->total_amount</td><td>$sale->discount_amount</td><td>$sale->net_amount</td><td>$sale->sale_date</td><td>$sale->user_id</td><td>$sale->created_at</td><td>$sale->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_name,customer_contact,total_amount,discount_amount,net_amount,sale_date,user_id,created_at,updated_at from {$tx}Sales where id={$id}");
		$sale=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Sale Show</th></tr>";
		$html.="<tr><th>Id</th><td>$sale->id</td></tr>";
		$html.="<tr><th>Customer Name</th><td>$sale->customer_name</td></tr>";
		$html.="<tr><th>Customer Contact</th><td>$sale->customer_contact</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$sale->total_amount</td></tr>";
		$html.="<tr><th>Discount Amount</th><td>$sale->discount_amount</td></tr>";
		$html.="<tr><th>Net Amount</th><td>$sale->net_amount</td></tr>";
		$html.="<tr><th>Sale Date</th><td>$sale->sale_date</td></tr>";
		$html.="<tr><th>User Id</th><td>$sale->user_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$sale->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$sale->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
