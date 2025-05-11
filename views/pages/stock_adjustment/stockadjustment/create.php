<?php
echo Page::title(["title"=>"Create StockAdjustment"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustment", "text"=>"Manage StockAdjustment"]);
echo Page::context_open();
echo Form::open(["route"=>"stockadjustment/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Adjustment Type","type"=>"text","name"=>"adjustment_type"]);
	echo Form::input(["label"=>"Warehouse","name"=>"warehouse_id","table"=>"warehouses"]);
	echo Form::input(["label"=>"Remark","type"=>"text","name"=>"remark"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
