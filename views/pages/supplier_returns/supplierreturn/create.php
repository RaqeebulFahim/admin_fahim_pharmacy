<?php
echo Page::title(["title"=>"Create SupplierReturn"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"supplierreturn", "text"=>"Manage SupplierReturn"]);
echo Page::context_open();
echo Form::open(["route"=>"supplierreturn/save"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers"]);
	echo Form::input(["label"=>"Purchase","name"=>"purchase_id","table"=>"purchases"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Total Order","type"=>"text","name"=>"total_order"]);
	echo Form::input(["label"=>"Total Return","type"=>"text","name"=>"total_return"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
