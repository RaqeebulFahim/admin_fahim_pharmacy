<?php
echo Page::title(["title"=>"Show ProductUnit"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productunit", "text"=>"Manage ProductUnit"]);
echo Page::context_open();
echo ProductUnit::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
