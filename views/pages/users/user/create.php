<?php
echo Page::title(["title"=>"Create User"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"user", "text"=>"Manage User"]);
echo Page::context_open();
echo Form::open(["route"=>"user/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Role","name"=>"role_id","table"=>"roles"]);
	echo Form::input(["label"=>"Password","type"=>"text","name"=>"password"]);
	echo Form::input(["label"=>"Email","type"=>"text","name"=>"email"]);
	echo Form::input(["label"=>"Full Name","type"=>"text","name"=>"full_name"]);
	echo Form::input(["label"=>"Photo","type"=>"file","name"=>"photo"]);
	echo Form::input(["label"=>"Verify Code","type"=>"text","name"=>"verify_code"]);
	echo Form::input(["label"=>"Inactive","type"=>"checkbox","name"=>"inactive","value"=>"1"]);
	echo Form::input(["label"=>"Mobile","type"=>"text","name"=>"mobile"]);
	echo Form::input(["label"=>"Ip","type"=>"text","name"=>"ip"]);
	echo Form::input(["label"=>"Email Verified At","type"=>"date","name"=>"email_verified_at"]);
	echo Form::input(["label"=>"Remember Token","type"=>"text","name"=>"remember_token"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
