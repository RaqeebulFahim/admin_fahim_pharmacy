<?php
echo Page::title(["title"=>"Show SupplierReturn"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"supplierreturn", "text"=>"Manage SupplierReturn"]);
echo Page::context_open();
echo SupplierReturn::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
