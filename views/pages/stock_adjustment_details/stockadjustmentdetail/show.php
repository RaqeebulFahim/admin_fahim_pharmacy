<?php
echo Page::title(["title"=>"Show StockAdjustmentDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stockadjustmentdetail", "text"=>"Manage StockAdjustmentDetail"]);
echo Page::context_open();
echo StockAdjustmentDetail::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
