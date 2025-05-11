<?php
echo Page::title(["title"=>"Create Product"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"product", "text"=>"Manage Product"]);
echo Page::context_open();
echo Form::open(["route"=>"product/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Offer Price","type"=>"text","name"=>"offer_price"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers"]);
	echo Form::input(["label"=>"Regular Price","type"=>"text","name"=>"regular_price"]);
	echo Form::input(["label"=>"Description","type"=>"textarea","name"=>"description"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo"]);
	echo Form::input(["label"=>"Product Category","name"=>"product_category_id","table"=>"product_categories"]);
	echo Form::input(["label"=>"Product Section","name"=>"product_section_id","table"=>"product_sections"]);
	echo Form::input(["label"=>"Is Featured","type"=>"checkbox","name"=>"is_featured","value"=>"1"]);
	echo Form::input(["label"=>"Star","type"=>"text","name"=>"star"]);
	echo Form::input(["label"=>"Is Brand","type"=>"checkbox","name"=>"is_brand","value"=>"1"]);
	echo Form::input(["label"=>"Offer Discount","type"=>"text","name"=>"offer_discount"]);
	echo Form::input(["label"=>"Uom","name"=>"uom_id","table"=>"uoms"]);
	echo Form::input(["label"=>"Weight","type"=>"text","name"=>"weight"]);
	echo Form::input(["label"=>"Barcode","type"=>"text","name"=>"barcode"]);
	echo Form::input(["label"=>"Product Type","name"=>"product_type_id","table"=>"product_types"]);
	echo Form::input(["label"=>"Product Unit","name"=>"product_unit_id","table"=>"product_units"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
