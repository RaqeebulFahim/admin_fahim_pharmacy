<?php
echo Page::title(["title"=>"Show Sale"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"sale", "text"=>"Manage Sale"]);
echo Page::context_open();
echo Sale::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
