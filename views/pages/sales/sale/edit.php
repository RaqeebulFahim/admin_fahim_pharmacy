<?php
echo Page::title(["title"=>"Edit Sale"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"sale", "text"=>"Manage Sale"]);
echo Page::context_open();
echo Form::open(["route"=>"sale/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$sale->id"]);
	echo Form::input(["label"=>"Customer Name","type"=>"text","name"=>"customer_name","value"=>"$sale->customer_name"]);
	echo Form::input(["label"=>"Customer Contact","type"=>"text","name"=>"customer_contact","value"=>"$sale->customer_contact"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$sale->total_amount"]);
	echo Form::input(["label"=>"Discount Amount","type"=>"text","name"=>"discount_amount","value"=>"$sale->discount_amount"]);
	echo Form::input(["label"=>"Net Amount","type"=>"text","name"=>"net_amount","value"=>"$sale->net_amount"]);
	echo Form::input(["label"=>"Sale Date","type"=>"date","name"=>"sale_date","value"=>"$sale->sale_date"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$sale->user_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
