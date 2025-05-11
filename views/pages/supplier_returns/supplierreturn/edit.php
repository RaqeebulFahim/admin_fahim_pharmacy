<?php
echo Page::title(["title"=>"Edit SupplierReturn"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"supplierreturn", "text"=>"Manage SupplierReturn"]);
echo Page::context_open();
echo Form::open(["route"=>"supplierreturn/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$supplierreturn->id"]);
	echo Form::input(["label"=>"Supplier","name"=>"supplier_id","table"=>"suppliers","value"=>"$supplierreturn->supplier_id"]);
	echo Form::input(["label"=>"Purchase","name"=>"purchase_id","table"=>"purchases","value"=>"$supplierreturn->purchase_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$supplierreturn->product_id"]);
	echo Form::input(["label"=>"Total Order","type"=>"text","name"=>"total_order","value"=>"$supplierreturn->total_order"]);
	echo Form::input(["label"=>"Total Return","type"=>"text","name"=>"total_return","value"=>"$supplierreturn->total_return"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
