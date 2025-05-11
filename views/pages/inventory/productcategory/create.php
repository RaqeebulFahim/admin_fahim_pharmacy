<?php
echo Page::title(["title"=>"Create ProductCategory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productcategory", "text"=>"Manage ProductCategory"]);
echo Page::context_open();
echo Form::open(["route"=>"productcategory/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Section","name"=>"section_id","table"=>"sections"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
