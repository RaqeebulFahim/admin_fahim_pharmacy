<?php
class OrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["orders"=>Order::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["orders"=>Order::pagination($page,$perpage),"total_records"=>Order::count()]);
	}
	function find($data){
		echo json_encode(["order"=>Order::find($data["id"])]);
	}
	function delete($data){
		Order::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->status=$data["status"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_date=$data["order_date"];
		$order->delivery_date=$data["delivery_date"];

		$order->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$order=new Order();
		$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->status=$data["status"];
		$order->shipping_address=$data["shipping_address"];
		$order->order_date=$data["order_date"];
		$order->delivery_date=$data["delivery_date"];
		$order->updated_at=$now;

		$order->update();
		echo json_encode(["success" => "yes"]);
	}

	function process($data, $file = [])
	{
         print_r($data);
		$order = new Order();
		$order->customer_id = $data["customer_id"];
		$order->order_date = $data["order_date"];
		$order->delivery_date = date("Y-m-d");
		$order->shipping_address = $data["shipping_address"];
		$order->order_total = $data["order_total"];
		$order->paid_amount = $data["paid_amount"];
		$order->remark = "";
		$order->status_id = $data["status_id"];
		$order->discount = $data["discount"] ?? 0;
		$order->vat = $data["vat"];
		$order_id = $order->save();
		$products = $data["product"];

		

		foreach ($products as $key => $value) {
			$orderdetail = new OrderDetail();
			$orderdetail->order_id =$order_id;
			$orderdetail->product_id =$value["item_id"];
			$orderdetail->qty =$value["qty"];
			$orderdetail->price =$value["price"];
			$orderdetail->vat =0;
			$orderdetail->discount = $value["total_discount"] ?? 0;

			$orderdetail->save();

			$stock = new Stock();
			$stock->product_id =$value["item_id"];
			$stock->quantity =$value["qty"] * (-1);
			$stock->transaction_type_id =1;
			$stock->remark ="";
			$stock->warehouse_id =1;
			$stock->save();
		}
		echo json_encode(["success" => "yes"]); 
	}
}
?>
