<?php
class ProductApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["products"=>Product::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["products"=>Product::pagination($page,$perpage),"total_records"=>Product::count()]);
	}
	function find($data){
		echo json_encode(["product"=>Product::find($data["id"])]);
	}
	function delete($data){
		Product::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$product=new Product();
		$product->name=$data["name"];
		$product->quantity=$data["quantity"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->sku=$data["sku"];
		$product->manufacturer_id=$data["manufacturer_id"];
		$product->product_picture=$data["product_picture"];
		$product->description=$data["description"];
		$product->is_feature=$data["is_feature"];
		$product->is_brand=$data["is_brand"];

		$product->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$product=new Product();
		$product->id=$data["id"];
		$product->name=$data["name"];
		$product->quantity=$data["quantity"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->sku=$data["sku"];
		$product->manufacturer_id=$data["manufacturer_id"];
		$product->product_picture=$data["product_picture"];
		$product->description=$data["description"];
		$product->is_feature=$data["is_feature"];
		$product->is_brand=$data["is_brand"];
		$product->updated_at=$now;

		$product->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
