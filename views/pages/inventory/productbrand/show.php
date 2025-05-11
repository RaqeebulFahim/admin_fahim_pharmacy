<?php
echo Page::title(["title"=>"Show ProductBrand"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"productbrand", "text"=>"Manage ProductBrand"]);
echo Page::context_open();
echo ProductBrand::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
