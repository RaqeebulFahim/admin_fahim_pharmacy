<?php
class PurchaseApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["purchases"=>Purchase::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["purchases"=>Purchase::pagination($page,$perpage),"total_records"=>Purchase::count()]);
	}
	function find($data){
		echo json_encode(["purchase"=>Purchase::find($data["id"])]);
	}
	// function find($data){
	// 	echo json_encode(["purchase"=>Purchase::find_details($data["id"])]);
	// }
	function delete($data){
		Purchase::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$purchase=new Purchase();
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->Purchase_date=$data["Purchase_date"];
		$purchase->total_order = $data["total_order"];
		$purchase->total_amount = $data["total_amount"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->status=$data["status"];
		$purchase->shipping_address=$data["shipping_address"];

		$purchase->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$purchase=new Purchase();
		$purchase->id=$data["id"];
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->Purchase_date=$data["Purchase_date"];
		$purchase->total_order = $data["total_order"];
		$purchase->total_amount = $data["total_amount"];
		$purchase->paid_amount=$data["paid_amount"];
		$purchase->status=$data["status"];
		$purchase->shipping_address=$data["shipping_address"];
		$purchase->updated_at=$now;


		$purchase->update();
		echo json_encode(["success" => "yes"]);
	}

	// fahim php purchase version
	function process($data, $file = [])
	{
         print_r($data);
		$purchase = new purchase();
		$purchase->supplier_id = $data["supplier_id"];
		$purchase->purchase_date = $data["purchase_date"];
		$purchase->Purchase_date = date("Y-m-d");
		//$purchase->delivery_date = date("Y-m-d");
		$purchase->shipping_address = $data["shipping_address"];
		$purchase->total_amount = $data["purchase_total"];
		$purchase->paid_amount = $data["paid_amount"];
		// $purchase->remark = "";
		$purchase->total_order = $data["total_order"];
		$purchase->total_amount = $data["total_amount"];
		$purchase->status = $data["status_id"];
		$purchase->total_discount = $data["discount"] ?? 0;
		// $purchase->vat = $data["vat"];
		$purchase_id = $purchase->save();
		$products = $data["product"];

		

		foreach ($products as $key => $value) {
			$purchasedetail = new purchaseDetail();
			$purchasedetail->purchase_id =$purchase_id;
			$purchasedetail->product_id =$value["item_id"];
			$purchasedetail->quantity =$value["qty"];
			$purchasedetail->price =$value["price"];
			// $purchasedetail->vat =0;
			$purchasedetail->discount = $value["total_discount"] ?? 0;
			$purchasedetail->total_order = $value["total_order"];
			$purchasedetail->total_amount = $value["total_amount"];

			$purchasedetail->save();

		// foreach ($products as $key => $value) {
		// 	$purchase = new purchase();
		// 	$purchase->purchase_id =$purchase_id;
		// 	$purchase->product_id =$value["item_id"];
		// 	$purchase->qty =$value["qty"];
		// 	$purchase->price =$value["price"];
		// 	$purchase->vat =0;
		// 	$purchase->discount = $value["total_discount"] ?? 0;

		// 	$purchase->save();

			$stock = new Stock();
			$stock->product_id =$value["item_id"];
			$stock->quantity =$value["qty"] * (+1);
			$stock->transaction_type_id =1;
			$stock->remark ="";
			$stock->warehouse_id =1;
			$stock->save();
		}
		echo json_encode(["success" => "yes"]); 
	}


	// fahim react purchase  version 
	function saveReact($data){
		// print_r($data);
	 
		  $purchase_date=date("Y-m-d");
		  $delivery_date=date("Y-m-d");
	 
		  $purchase=new Purchase();
		  $purchase->supplier_id=$data["supplier_id"];
		  $purchase->Purchase_date=$purchase_date;
		  $purchase->total_order = $data["purchase_total"];
		  $purchase->total_amount = $data["purchase_total"];
		  $purchase->paid_amount=0;      //$data["paid_amount"];
		  $purchase->status="";
		  $purchase->shipping_address="";
		  if ($data["supplier_id"] != "") {
			
		 
		  $purchase_id= $purchase->save();
	 
		$products=$data["products"];
		$werehouse_id=$data["warehouse_id"];
		foreach(  $products as $value){
		
		   $purchasedetail=new PurchaseDetail();
		   $purchasedetail->purchase_id= $purchase_id;
		   $purchasedetail->product_id=$value["item_id"];
		   $purchasedetail->quantity=$value["qty"];
   
		   $purchasedetail->save();
		 
		   $stock=new Stock();
		   $stock->product_id=$value["item_id"];
		   $stock->quantity=$value["qty"];
		   $stock->transaction_type_id=2;
		   $stock->warehouse_id=	$werehouse_id;
		   $stock->remark="";
   
		   $stock->save();
	 
		 }
	   echo json_encode(["success" => "yes"]);
	}
	 }
}
?>



