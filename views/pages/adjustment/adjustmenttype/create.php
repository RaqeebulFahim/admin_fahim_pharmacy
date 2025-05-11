<?php
echo Page::title(["title"=>"Create AdjustmentType"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"adjustmenttype", "text"=>"Manage AdjustmentType"]);
echo Page::context_open();
echo Form::open(["route"=>"adjustmenttype/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Factor","type"=>"text","name"=>"factor"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
