<?php
echo Page::title(["title"=>"Edit ProductCategory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productcategory", "text"=>"Manage ProductCategory"]);
echo Page::context_open();
echo Form::open(["route"=>"productcategory/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productcategory->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productcategory->name"]);
	echo Form::input(["label"=>"Section","name"=>"section_id","table"=>"sections","value"=>"$productcategory->section_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
