<?php
echo Page::title(["title"=>"Create Warehouse"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"warehouse", "text"=>"Manage Warehouse"]);
echo Page::context_open();
echo Form::open(["route"=>"warehouse/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Address","type"=>"text","name"=>"address"]);
	echo Form::input(["label"=>"Location","type"=>"text","name"=>"location"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
