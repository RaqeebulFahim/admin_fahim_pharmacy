<?php
echo Page::title(["title"=>"Create StockAdjustmentDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustmentdetail", "text"=>"Manage StockAdjustmentDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"stockadjustmentdetail/save"]);
	echo Form::input(["label"=>"Stock Adjustment","name"=>"stock_adjustment_id","table"=>"stock_adjustments"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price"]);
	echo Form::input(["label"=>"Remark","type"=>"text","name"=>"remark"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
