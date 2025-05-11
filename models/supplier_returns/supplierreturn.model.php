<?php
class SupplierReturn extends Model implements JsonSerializable{
	public $id;
	public $supplier_id;
	public $purchase_id;
	public $product_id;
	public $total_order;
	public $total_return;

	public function __construct(){
	}
	public function set($id,$supplier_id,$purchase_id,$product_id,$total_order,$total_return){
		$this->id=$id;
		$this->supplier_id=$supplier_id;
		$this->purchase_id=$purchase_id;
		$this->product_id=$product_id;
		$this->total_order=$total_order;
		$this->total_return=$total_return;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}supplier_returns(supplier_id,purchase_id,product_id,total_order,total_return)values('$this->supplier_id','$this->purchase_id','$this->product_id','$this->total_order','$this->total_return')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}supplier_returns set supplier_id='$this->supplier_id',purchase_id='$this->purchase_id',product_id='$this->product_id',total_order='$this->total_order',total_return='$this->total_return' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}supplier_returns where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,supplier_id,purchase_id,product_id,total_order,total_return from {$tx}supplier_returns");
		$data=[];
		while($supplierreturn=$result->fetch_object()){
			$data[]=$supplierreturn;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,supplier_id,purchase_id,product_id,total_order,total_return from {$tx}supplier_returns $criteria limit $top,$perpage");
		$data=[];
		while($supplierreturn=$result->fetch_object()){
			$data[]=$supplierreturn;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}supplier_returns $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,supplier_id,purchase_id,product_id,total_order,total_return from {$tx}supplier_returns where id='$id'");
		$supplierreturn=$result->fetch_object();
			return $supplierreturn;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}supplier_returns");
		$supplierreturn =$result->fetch_object();
		return $supplierreturn->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Supplier Id:$this->supplier_id<br> 
		Purchase Id:$this->purchase_id<br> 
		Product Id:$this->product_id<br> 
		Total Order:$this->total_order<br> 
		Total Return:$this->total_return<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSupplierReturn"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}supplier_returns");
		while($supplierreturn=$result->fetch_object()){
			$html.="<option value ='$supplierreturn->id'>$supplierreturn->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}supplier_returns $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,supplier_id,purchase_id,product_id,total_order,total_return from {$tx}supplier_returns $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"supplierreturn/create","text"=>"New SupplierReturn"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Purchase Id</th><th>Product Id</th><th>Total Order</th><th>Total Return</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Purchase Id</th><th>Product Id</th><th>Total Order</th><th>Total Return</th></tr>";
		}
		while($supplierreturn=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"supplierreturn/show/$supplierreturn->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"supplierreturn/edit/$supplierreturn->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"supplierreturn/confirm/$supplierreturn->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$supplierreturn->id</td><td>$supplierreturn->supplier_id</td><td>$supplierreturn->purchase_id</td><td>$supplierreturn->product_id</td><td>$supplierreturn->total_order</td><td>$supplierreturn->total_return</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,supplier_id,purchase_id,product_id,total_order,total_return from {$tx}supplier_returns where id={$id}");
		$supplierreturn=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SupplierReturn Show</th></tr>";
		$html.="<tr><th>Id</th><td>$supplierreturn->id</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$supplierreturn->supplier_id</td></tr>";
		$html.="<tr><th>Purchase Id</th><td>$supplierreturn->purchase_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$supplierreturn->product_id</td></tr>";
		$html.="<tr><th>Total Order</th><td>$supplierreturn->total_order</td></tr>";
		$html.="<tr><th>Total Return</th><td>$supplierreturn->total_return</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
