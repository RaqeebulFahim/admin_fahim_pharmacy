<?php
echo Page::title(["title"=>"Show ProductCategory"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productcategory", "text"=>"Manage ProductCategory"]);
echo Page::context_open();
echo ProductCategory::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
