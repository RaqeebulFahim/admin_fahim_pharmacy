<?php
echo Page::title(["title"=>"Create Sale"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"sale", "text"=>"Manage Sale"]);
echo Page::context_open();
echo Form::open(["route"=>"sale/save"]);
	echo Form::input(["label"=>"Customer Name","type"=>"text","name"=>"customer_name"]);
	echo Form::input(["label"=>"Customer Contact","type"=>"text","name"=>"customer_contact"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount"]);
	echo Form::input(["label"=>"Discount Amount","type"=>"text","name"=>"discount_amount"]);
	echo Form::input(["label"=>"Net Amount","type"=>"text","name"=>"net_amount"]);
	echo Form::input(["label"=>"Sale Date","type"=>"date","name"=>"sale_date"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
