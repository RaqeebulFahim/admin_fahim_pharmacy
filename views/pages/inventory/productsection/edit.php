<?php
echo Page::title(["title"=>"Edit ProductSection"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productsection", "text"=>"Manage ProductSection"]);
echo Page::context_open();
echo Form::open(["route"=>"productsection/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productsection->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productsection->name"]);
	echo Form::input(["label"=>"Unit","name"=>"unit_id","table"=>"units","value"=>"$productsection->unit_id"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$productsection->photo]);
	echo Form::input(["label"=>"Icon","type"=>"text","name"=>"icon","value"=>"$productsection->icon"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
