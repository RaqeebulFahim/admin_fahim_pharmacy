<?php
echo Page::title(["title"=>"Edit Warehouse"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"warehouse", "text"=>"Manage Warehouse"]);
echo Page::context_open();
echo Form::open(["route"=>"warehouse/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$warehouse->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$warehouse->name"]);
	echo Form::input(["label"=>"Address","type"=>"text","name"=>"address","value"=>"$warehouse->address"]);
	echo Form::input(["label"=>"Location","type"=>"text","name"=>"location","value"=>"$warehouse->location"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
