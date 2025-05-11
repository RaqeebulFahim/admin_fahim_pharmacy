<?php
echo Page::title(["title"=>"Edit Warehouse"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"warehouse", "text"=>"Manage Warehouse"]);
echo Page::context_open();
echo Form::open(["route"=>"warehouse/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$warehouse->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$warehouse->name"]);
	echo Form::input(["label"=>"City","type"=>"text","name"=>"city","value"=>"$warehouse->city"]);
	echo Form::input(["label"=>"Contact","type"=>"text","name"=>"contact","value"=>"$warehouse->contact"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
