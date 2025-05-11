<?php
echo Page::title(["title"=>"Edit Manufacturer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"manufacturer", "text"=>"Manage Manufacturer"]);
echo Page::context_open();
echo Form::open(["route"=>"manufacturer/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$manufacturer->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$manufacturer->name"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email","value"=>"$manufacturer->email"]);
	echo Form::input(["label"=>"Phone","type"=>"text","name"=>"phone","value"=>"$manufacturer->phone"]);
	echo Form::input(["label"=>"Website","type"=>"text","name"=>"website","value"=>"$manufacturer->website"]);
	echo Form::input(["label"=>"Country","type"=>"text","name"=>"country","value"=>"$manufacturer->country"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
