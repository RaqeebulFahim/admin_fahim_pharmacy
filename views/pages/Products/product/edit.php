<?php
echo Page::title(["title"=>"Edit Product"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"product", "text"=>"Manage Product"]);
echo Page::context_open();
echo Form::open(["route"=>"product/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$product->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$product->name"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$product->quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$product->price"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$product->discount"]);
	echo Form::input(["label"=>"Final Price","type"=>"text","name"=>"final_price","value"=>"$product->final_price"]);
	echo Form::input(["label"=>"Category","name"=>"category_id","table"=>"categories","value"=>"$product->category_id"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uom","value"=>"$product->uom_id"]);
	echo Form::input(["label"=>"Barcode","type"=>"text","name"=>"barcode","value"=>"$product->barcode"]);
	echo Form::input(["label"=>"Sku","type"=>"text","name"=>"sku","value"=>"$product->sku"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers","value"=>"$product->manufacturer_id"]);
	echo Form::input(["label"=>"Product Picture","type"=>"text","name"=>"product_picture","value"=>"$product->product_picture"]);
	echo Form::input(["label"=>"Description","type"=>"text","name"=>"description","value"=>"$product->description"]);
	echo Form::input(["label"=>"Weight","type"=>"text","name"=>"weight","value"=>"$product->weight"]);
	echo Form::input(["label"=>"Size","type"=>"text","name"=>"size","value"=>"$product->size"]);
	echo Form::input(["label"=>"Is Feature","type"=>"text","name"=>"is_feature","value"=>"$product->is_feature"]);
	echo Form::input(["label"=>"Is Brand","type"=>"text","name"=>"is_brand","value"=>"$product->is_brand"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
