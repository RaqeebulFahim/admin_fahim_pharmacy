<?php
class Product extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $quantity;
	public $price;
	public $discount;
	public $final_price;
	public $category_id;
	public $uom_id;
	public $barcode;
	public $sku;
	public $manufacturer_id;
	public $product_picture;
	public $description;
	public $weight;
	public $size;
	public $is_feature;
	public $is_brand;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$quantity,$price,$discount,$final_price,$category_id,$uom_id,$barcode,$sku,$manufacturer_id,$product_picture,$description,$weight,$size,$is_feature,$is_brand,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->quantity=$quantity;
		$this->price=$price;
		$this->discount=$discount;
		$this->final_price=$final_price;
		$this->category_id=$category_id;
		$this->uom_id=$uom_id;
		$this->barcode=$barcode;
		$this->sku=$sku;
		$this->manufacturer_id=$manufacturer_id;
		$this->product_picture=$product_picture;
		$this->description=$description;
		$this->weight=$weight;
		$this->size=$size;
		$this->is_feature=$is_feature;
		$this->is_brand=$is_brand;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at)values('$this->name','$this->quantity','$this->price','$this->discount','$this->final_price','$this->category_id','$this->uom_id','$this->barcode','$this->sku','$this->manufacturer_id','$this->product_picture','$this->description','$this->weight','$this->size','$this->is_feature','$this->is_brand','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',quantity='$this->quantity',price='$this->price',discount='$this->discount',final_price='$this->final_price',category_id='$this->category_id',uom_id='$this->uom_id',barcode='$this->barcode',sku='$this->sku',manufacturer_id='$this->manufacturer_id',product_picture='$this->product_picture',description='$this->description',weight='$this->weight',size='$this->size',is_feature='$this->is_feature',is_brand='$this->is_brand',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at from {$tx}products");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at from {$tx}products where id='$id'");
		$product=$result->fetch_object();
			return $product;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}products");
		$product =$result->fetch_object();
		return $product->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Quantity:$this->quantity<br> 
		Price:$this->price<br> 
		Discount:$this->discount<br> 
		Final Price:$this->final_price<br> 
		Category Id:$this->category_id<br> 
		Uom Id:$this->uom_id<br> 
		Barcode:$this->barcode<br> 
		Sku:$this->sku<br> 
		Manufacturer Id:$this->manufacturer_id<br> 
		Product Picture:$this->product_picture<br> 
		Description:$this->description<br> 
		Weight:$this->weight<br> 
		Size:$this->size<br> 
		Is Feature:$this->is_feature<br> 
		Is Brand:$this->is_brand<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"product/create","text"=>"New Product"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Category Id</th> <th>Created At</th><th>Updated At</th><th>Action</th></tr>";

			// <th>Quantity</th><th>Uom Id</th><th>Barcode</th><th>Sku</th><th>Manufacturer Id</th><th>Product Picture</th><th>Description</th><th>Weight</th><th>Size</th><th>Is Feature</th><th>Is Brand</th>

			// <th>Discount</th><th>Final Price</th>
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Quantity</th><th>Price</th><th>Category Id</th><th>Created At</th><th>Updated At</th></tr>";


			// <th>Uom Id</th><th>Barcode</th><th>Sku</th><th>Manufacturer Id</th><th>Product Picture</th><th>Description</th><th>Weight</th><th>Size</th><th>Is Feature</th><th>Is Brand</th>

			// <th>Discount</th><th>Final Price</th>


		}
		while($product=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"product/show/$product->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"product/edit/$product->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"product/confirm/$product->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$product->id</td><td>$product->name</td><td>$product->price</td><td>$product->category_id</td><td>$product->created_at</td><td>$product->updated_at</td> $action_buttons</tr>";

			// <td>$product->uom_id</td><td>$product->barcode</td><td>$product->sku</td><td>$product->manufacturer_id</td><td>$product->product_picture</td><td>$product->description</td><td>$product->weight</td><td>$product->size</td><td>$product->is_feature</td><td>$product->is_brand</td>

			//<td>$product->quantity</td> <td>$product->discount</td><td>$product->final_price</td>
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,quantity,price,discount,final_price,category_id,uom_id,barcode,sku,manufacturer_id,product_picture,description,weight,size,is_feature,is_brand,created_at,updated_at from {$tx}products where id={$id}");
		$product=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Product Show</th></tr>";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Quantity</th><td>$product->quantity</td></tr>";
		$html.="<tr><th>Price</th><td>$product->price</td></tr>";
		$html.="<tr><th>Discount</th><td>$product->discount</td></tr>";
		$html.="<tr><th>Final Price</th><td>$product->final_price</td></tr>";
		$html.="<tr><th>Category Id</th><td>$product->category_id</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$product->uom_id</td></tr>";
		$html.="<tr><th>Barcode</th><td>$product->barcode</td></tr>";
		$html.="<tr><th>Sku</th><td>$product->sku</td></tr>";
		$html.="<tr><th>Manufacturer Id</th><td>$product->manufacturer_id</td></tr>";
		$html.="<tr><th>Product Picture</th><td>$product->product_picture</td></tr>";
		$html.="<tr><th>Description</th><td>$product->description</td></tr>";
		$html.="<tr><th>Weight</th><td>$product->weight</td></tr>";
		$html.="<tr><th>Size</th><td>$product->size</td></tr>";
		$html.="<tr><th>Is Feature</th><td>$product->is_feature</td></tr>";
		$html.="<tr><th>Is Brand</th><td>$product->is_brand</td></tr>";
		$html.="<tr><th>Created At</th><td>$product->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$product->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
