<?php
class ProductController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("products");
	}
	public function create(){
		view("products");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["final_price"])){
		$errors["final_price"]="Invalid final_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBarcode"])){
		$errors["barcode"]="Invalid barcode";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSku"])){
		$errors["sku"]="Invalid sku";
	}
	if(!preg_match("/^[\s\S]+$/",$data["manufacturer_id"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductPicture"])){
		$errors["product_picture"]="Invalid product_picture";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["weight"])){
		$errors["weight"]="Invalid weight";
	}
	if(!preg_match("/^[\s\S]+$/",$data["size"])){
		$errors["size"]="Invalid size";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIsFeature"])){
		$errors["is_feature"]="Invalid is_feature";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIsBrand"])){
		$errors["is_brand"]="Invalid is_brand";
	}

*/
		if(count($errors)==0){
			$product=new Product();
		$product->name=$data["name"];
		$product->quantity=$data["quantity"];
		$product->price=$data["price"];
		$product->discount=$data["discount"];
		$product->final_price=$data["final_price"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->sku=$data["sku"];
		$product->manufacturer_id=$data["manufacturer_id"];
		$product->product_picture=$data["product_picture"];
		$product->description=$data["description"];
		$product->weight=$data["weight"];
		$product->size=$data["size"];
		$product->is_feature=$data["is_feature"];
		$product->is_brand=$data["is_brand"];
		$product->created_at=$now;
		$product->updated_at=$now;

			$product->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("products",Product::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["final_price"])){
		$errors["final_price"]="Invalid final_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["uom_id"])){
		$errors["uom_id"]="Invalid uom_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBarcode"])){
		$errors["barcode"]="Invalid barcode";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtSku"])){
		$errors["sku"]="Invalid sku";
	}
	if(!preg_match("/^[\s\S]+$/",$data["manufacturer_id"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtProductPicture"])){
		$errors["product_picture"]="Invalid product_picture";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtDescription"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["weight"])){
		$errors["weight"]="Invalid weight";
	}
	if(!preg_match("/^[\s\S]+$/",$data["size"])){
		$errors["size"]="Invalid size";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIsFeature"])){
		$errors["is_feature"]="Invalid is_feature";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtIsBrand"])){
		$errors["is_brand"]="Invalid is_brand";
	}

*/
		if(count($errors)==0){
			$product=new Product();
			$product->id=$data["id"];
		$product->name=$data["name"];
		$product->quantity=$data["quantity"];
		$product->price=$data["price"];
		$product->discount=$data["discount"];
		$product->final_price=$data["final_price"];
		$product->category_id=$data["category_id"];
		$product->uom_id=$data["uom_id"];
		$product->barcode=$data["barcode"];
		$product->sku=$data["sku"];
		$product->manufacturer_id=$data["manufacturer_id"];
		$product->product_picture=$data["product_picture"];
		$product->description=$data["description"];
		$product->weight=$data["weight"];
		$product->size=$data["size"];
		$product->is_feature=$data["is_feature"];
		$product->is_brand=$data["is_brand"];
		$product->created_at=$now;
		$product->updated_at=$now;

		$product->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("products");
	}
	public function delete($id){
		Product::delete($id);
		redirect();
	}
	public function show($id){
		view("products",Product::find($id));
	}
}
?>
