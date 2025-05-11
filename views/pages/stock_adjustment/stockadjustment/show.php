<?php
echo Page::title(["title"=>"Show StockAdjustment"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustment", "text"=>"Manage StockAdjustment"]);
echo Page::context_open();
echo StockAdjustment::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
