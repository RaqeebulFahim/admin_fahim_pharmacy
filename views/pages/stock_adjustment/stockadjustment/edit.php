<?php
echo Page::title(["title"=>"Edit StockAdjustment"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustment", "text"=>"Manage StockAdjustment"]);
echo Page::context_open();
echo Form::open(["route"=>"stockadjustment/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$stockadjustment->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$stockadjustment->name"]);
	echo Form::input(["label"=>"Adjustment Type","type"=>"text","name"=>"adjustment_type","value"=>"$stockadjustment->adjustment_type"]);
	echo Form::input(["label"=>"Warehouse","name"=>"warehouse_id","table"=>"warehouses","value"=>"$stockadjustment->warehouse_id"]);
	echo Form::input(["label"=>"Remark","type"=>"text","name"=>"remark","value"=>"$stockadjustment->remark"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
