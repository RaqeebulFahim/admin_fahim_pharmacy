<?php
echo Page::title(["title"=>"Edit AdjustmentType"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"adjustmenttype", "text"=>"Manage AdjustmentType"]);
echo Page::context_open();
echo Form::open(["route"=>"adjustmenttype/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$adjustmenttype->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$adjustmenttype->name"]);
	echo Form::input(["label"=>"Factor","type"=>"text","name"=>"factor","value"=>"$adjustmenttype->factor"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
