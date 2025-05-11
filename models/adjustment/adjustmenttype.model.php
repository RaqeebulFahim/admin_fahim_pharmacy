<?php
class AdjustmentType extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $factor;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$factor,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->factor=$factor;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}adjustment_types(name,factor,created_at,updated_at)values('$this->name','$this->factor','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}adjustment_types set name='$this->name',factor='$this->factor',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}adjustment_types where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,factor,created_at,updated_at from {$tx}adjustment_types");
		$data=[];
		while($adjustmenttype=$result->fetch_object()){
			$data[]=$adjustmenttype;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,factor,created_at,updated_at from {$tx}adjustment_types $criteria limit $top,$perpage");
		$data=[];
		while($adjustmenttype=$result->fetch_object()){
			$data[]=$adjustmenttype;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}adjustment_types $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,factor,created_at,updated_at from {$tx}adjustment_types where id='$id'");
		$adjustmenttype=$result->fetch_object();
			return $adjustmenttype;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}adjustment_types");
		$adjustmenttype =$result->fetch_object();
		return $adjustmenttype->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Factor:$this->factor<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbAdjustmentType"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}adjustment_types");
		while($adjustmenttype=$result->fetch_object()){
			$html.="<option value ='$adjustmenttype->id'>$adjustmenttype->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}adjustment_types $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,factor,created_at,updated_at from {$tx}adjustment_types $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"adjustmenttype/create","text"=>"New AdjustmentType"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Factor</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Factor</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($adjustmenttype=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"adjustmenttype/show/$adjustmenttype->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"adjustmenttype/edit/$adjustmenttype->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"adjustmenttype/confirm/$adjustmenttype->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$adjustmenttype->id</td><td>$adjustmenttype->name</td><td>$adjustmenttype->factor</td><td>$adjustmenttype->created_at</td><td>$adjustmenttype->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,factor,created_at,updated_at from {$tx}adjustment_types where id={$id}");
		$adjustmenttype=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">AdjustmentType Show</th></tr>";
		$html.="<tr><th>Id</th><td>$adjustmenttype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$adjustmenttype->name</td></tr>";
		$html.="<tr><th>Factor</th><td>$adjustmenttype->factor</td></tr>";
		$html.="<tr><th>Created At</th><td>$adjustmenttype->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$adjustmenttype->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
