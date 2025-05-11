<?php
echo Page::title(["title"=>"Edit Product"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"product", "text"=>"Manage Product"]);
echo Page::context_open();
echo Form::open(["route"=>"product/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$product->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$product->name"]);
	echo Form::input(["label"=>"Offer Price","type"=>"text","name"=>"offer_price","value"=>"$product->offer_price"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers","value"=>"$product->manufacturer_id"]);
	echo Form::input(["label"=>"Regular Price","type"=>"text","name"=>"regular_price","value"=>"$product->regular_price"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description","value"=>"$product->description"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$product->photo]);
	echo Form::input(["label"=>"Product Category","name"=>"product_category_id","table"=>"product_categories","value"=>"$product->product_category_id"]);
	echo Form::input(["label"=>"Product Section","name"=>"product_section_id","table"=>"product_sections","value"=>"$product->product_section_id"]);
	echo Form::input(["label"=>"Is Featured","type"=>"checkbox","name"=>"is_featured","value"=>"$product->is_featured","checked"=>$product->is_featured?"checked":""]);
	echo Form::input(["label"=>"Star","type"=>"text","name"=>"star","value"=>"$product->star"]);
	echo Form::input(["label"=>"Is Brand","type"=>"checkbox","name"=>"is_brand","value"=>"$product->is_brand","checked"=>$product->is_brand?"checked":""]);
	echo Form::input(["label"=>"Offer Discount","type"=>"text","name"=>"offer_discount","value"=>"$product->offer_discount"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uoms","value"=>"$product->uom_id"]);
	echo Form::input(["label"=>"Weight","type"=>"text","name"=>"weight","value"=>"$product->weight"]);
	echo Form::input(["label"=>"Barcode","type"=>"text","name"=>"barcode","value"=>"$product->barcode"]);
	echo Form::input(["label"=>"Product Type","name"=>"product_type_id","table"=>"product_types","value"=>"$product->product_type_id"]);
	echo Form::input(["label"=>"Product Unit","name"=>"product_unit_id","table"=>"product_units","value"=>"$product->product_unit_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
