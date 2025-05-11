<?php
echo Page::title(["title"=>"Edit ProductUnit"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productunit", "text"=>"Manage ProductUnit"]);
echo Page::context_open();
echo Form::open(["route"=>"productunit/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productunit->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productunit->name"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo","value"=>$productunit->photo]);
	echo Form::input(["label"=>"Icon","type"=>"text","name"=>"icon","value"=>"$productunit->icon"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
