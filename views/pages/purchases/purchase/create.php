<?php
echo Page::title(["title"=>"Create Purchase"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"purchase", "text"=>"Manage Purchase"]);
echo Page::context_open();
echo Form::open(["route"=>"purchase/save"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers"]);
	echo Form::input(["label"=>"Total Order","type"=>"text","name"=>"total_order"]);
	echo Form::input(["label"=>"Purchase Date","type"=>"date","name"=>"Purchase_date"]);
	echo Form::input(["label"=>"Total Discount","type"=>"text","name"=>"total_discount"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
	echo Form::input(["label"=>"Paid Amount","type"=>"text","name"=>"paid_amount"]);
	echo Form::input(["label"=>"Status","type"=>"text","name"=>"status"]);
	echo Form::input(["label"=>"Shipping Address","type"=>"text","name"=>"shipping_address"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
