<?php
echo Page::title(["title"=>"Create ProductSection"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productsection", "text"=>"Manage ProductSection"]);
echo Page::context_open();
echo Form::open(["route"=>"productsection/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Unit","name"=>"unit_id","table"=>"units"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo"]);
	echo Form::input(["label"=>"Icon","type"=>"text","name"=>"icon"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
