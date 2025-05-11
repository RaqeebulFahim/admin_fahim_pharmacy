<?php
echo Page::title(["title"=>"Create ProductUnit"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productunit", "text"=>"Manage ProductUnit"]);
echo Page::context_open();
echo Form::open(["route"=>"productunit/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo"]);
	echo Form::input(["label"=>"Icon","type"=>"text","name"=>"icon"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
