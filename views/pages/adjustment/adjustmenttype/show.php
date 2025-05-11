<?php
echo Page::title(["title"=>"Show AdjustmentType"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"adjustmenttype", "text"=>"Manage AdjustmentType"]);
echo Page::context_open();
echo AdjustmentType::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
