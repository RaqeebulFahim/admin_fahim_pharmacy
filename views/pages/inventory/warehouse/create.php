<?php
echo Page::title(["title"=>"Create Warehouse"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"warehouse", "text"=>"Manage Warehouse"]);
echo Page::context_open();
echo Form::open(["route"=>"warehouse/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"City","type"=>"text","name"=>"city"]);
	echo Form::input(["label"=>"Contact","type"=>"text","name"=>"contact"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
