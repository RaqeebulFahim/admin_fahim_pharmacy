<?php
echo Page::title(["title"=>"Show Manufacturer"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"manufacturer", "text"=>"Manage Manufacturer"]);
echo Page::context_open();
echo Manufacturer::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
