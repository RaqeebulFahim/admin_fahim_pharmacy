<?php
echo Page::title(["title"=>"Edit StockAdjustmentDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustmentdetail", "text"=>"Manage StockAdjustmentDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"stockadjustmentdetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$stockadjustmentdetail->id"]);
	echo Form::input(["label"=>"Stock Adjustment","name"=>"stock_adjustment_id","table"=>"stock_adjustments","value"=>"$stockadjustmentdetail->stock_adjustment_id"]);
	echo Form::input(["label"=>"Product","name"=>"product_id","table"=>"products","value"=>"$stockadjustmentdetail->product_id"]);
	echo Form::input(["label"=>"Quantity","type"=>"text","name"=>"quantity","value"=>"$stockadjustmentdetail->quantity"]);
	echo Form::input(["label"=>"Price","type"=>"text","name"=>"price","value"=>"$stockadjustmentdetail->price"]);
	echo Form::input(["label"=>"Remark","type"=>"text","name"=>"remark","value"=>"$stockadjustmentdetail->remark"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
