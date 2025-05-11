<?php
echo Page::title(["title"=>"Create Product"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"product", "text"=>"Manage Product"]);
echo Page::context_open();
echo Form::open(["route"=>"product/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount"]);
	echo Form::input(["label"=>"Final Price","type"=>"text","name"=>"final_price"]);
	echo Form::input(["label"=>"Category","name"=>"category_id","table"=>"categories"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom"]);
	echo Form::input(["label"=>"Barcode","type"=>"text","name"=>"barcode"]);
	echo Form::input(["label"=>"Sku","type"=>"text","name"=>"sku"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers"]);
	echo Form::input(["label"=>"Product Picture","type"=>"text","name"=>"product_picture"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description"]);
	echo Form::input(["label"=>"Weight","type"=>"text","name"=>"weight"]);
	echo Form::input(["label"=>"Size","type"=>"text","name"=>"size"]);
	echo Form::input(["label"=>"Is Feature","type"=>"text","name"=>"is_feature"]);
	echo Form::input(["label"=>"Is Brand","type"=>"text","name"=>"is_brand"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
