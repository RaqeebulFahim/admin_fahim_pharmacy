<?php
echo Page::title(["title"=>"Create Manufacturer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"manufacturer", "text"=>"Manage Manufacturer"]);
echo Page::context_open();
echo Form::open(["route"=>"manufacturer/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone"]);
	echo Form::input(["label"=>"Website","type"=>"text","name"=>"website"]);
	echo Form::input(["label"=>"Country","type"=>"text","name"=>"country"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
