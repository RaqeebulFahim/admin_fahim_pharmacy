<?php
echo Page::title(["title"=>"Edit ProductBrand"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productbrand", "text"=>"Manage ProductBrand"]);
echo Page::context_open();
echo Form::open(["route"=>"productbrand/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$productbrand->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$productbrand->name"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
