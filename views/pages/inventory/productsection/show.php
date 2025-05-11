<?php
echo Page::title(["title"=>"Show ProductSection"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productsection", "text"=>"Manage ProductSection"]);
echo Page::context_open();
echo ProductSection::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
