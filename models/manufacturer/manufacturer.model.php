<?php
class Manufacturer extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $email;
	public $phone;
	public $website;
	public $country;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$email,$phone,$website,$country,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->email=$email;
		$this->phone=$phone;
		$this->website=$website;
		$this->country=$country;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}manufacturers(name,email,phone,website,country,created_at,updated_at)values('$this->name','$this->email','$this->phone','$this->website','$this->country','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}manufacturers set name='$this->name',email='$this->email',phone='$this->phone',website='$this->website',country='$this->country',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}manufacturers where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,email,phone,website,country,created_at,updated_at from {$tx}manufacturers");
		$data=[];
		while($manufacturer=$result->fetch_object()){
			$data[]=$manufacturer;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,email,phone,website,country,created_at,updated_at from {$tx}manufacturers $criteria limit $top,$perpage");
		$data=[];
		while($manufacturer=$result->fetch_object()){
			$data[]=$manufacturer;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}manufacturers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,email,phone,website,country,created_at,updated_at from {$tx}manufacturers where id='$id'");
		$manufacturer=$result->fetch_object();
			return $manufacturer;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}manufacturers");
		$manufacturer =$result->fetch_object();
		return $manufacturer->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Email:$this->email<br> 
		Phone:$this->phone<br> 
		Website:$this->website<br> 
		Country:$this->country<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbManufacturer"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}manufacturers");
		while($manufacturer=$result->fetch_object()){
			$html.="<option value ='$manufacturer->id'>$manufacturer->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}manufacturers $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,email,phone,website,country,created_at,updated_at from {$tx}manufacturers $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"manufacturer/create","text"=>"New Manufacturer"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Website</th><th>Country</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Email</th><th>Phone</th><th>Website</th><th>Country</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($manufacturer=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"manufacturer/show/$manufacturer->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"manufacturer/edit/$manufacturer->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"manufacturer/confirm/$manufacturer->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$manufacturer->id</td><td>$manufacturer->name</td><td>$manufacturer->email</td><td>$manufacturer->phone</td><td>$manufacturer->website</td><td>$manufacturer->country</td><td>$manufacturer->created_at</td><td>$manufacturer->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,email,phone,website,country,created_at,updated_at from {$tx}manufacturers where id={$id}");
		$manufacturer=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Manufacturer Show</th></tr>";
		$html.="<tr><th>Id</th><td>$manufacturer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$manufacturer->name</td></tr>";
		$html.="<tr><th>Email</th><td>$manufacturer->email</td></tr>";
		$html.="<tr><th>Phone</th><td>$manufacturer->phone</td></tr>";
		$html.="<tr><th>Website</th><td>$manufacturer->website</td></tr>";
		$html.="<tr><th>Country</th><td>$manufacturer->country</td></tr>";
		$html.="<tr><th>Created At</th><td>$manufacturer->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$manufacturer->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
