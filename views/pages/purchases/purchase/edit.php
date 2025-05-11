<?php
echo Page::title(["title"=>"Edit Purchase"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchase", "text"=>"Manage Purchase"]);
echo Page::context_open();
echo Form::open(["route"=>"purchase/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$purchase->id"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers","value"=>"$purchase->supplier_id"]);
	echo Form::input(["label"=>"Total Order","type"=>"text","name"=>"total_order","value"=>"$purchase->total_order"]);
	echo Form::input(["label"=>"Purchase Date","type"=>"date","name"=>"Purchase_date","value"=>"$purchase->Purchase_date"]);
	echo Form::input(["label"=>"Total Discount","type"=>"text","name"=>"total_discount","value"=>"$purchase->total_discount"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$purchase->total_amount"]);
	echo Form::input(["label"=>"Paid Amount","type"=>"text","name"=>"paid_amount","value"=>"$purchase->paid_amount"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status","value"=>"$purchase->status"]);
	echo Form::input(["label"=>"Shipping Address","type"=>"text","name"=>"shipping_address","value"=>"$purchase->shipping_address"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
