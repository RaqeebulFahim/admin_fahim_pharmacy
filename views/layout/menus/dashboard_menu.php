<li class="menu-title">Main</li>

<li>
    <a href="<?php
                global   $base_url;
                echo $base_url ?>/home" class="waves-effect">
        <i class="mdi mdi-view-dashboard"></i>
        <span class="badge rounded-pill bg-primary float-end">2</span>
        <span>Dashboard</span>
    </a>

</li>

<!-- Module-1: Start inventory management -->


<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-store"></i>
        <span>inventory Module</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
         <!--Table - 1: Product table for project_pharmacy erp fahim  -->
        <li><a href="<?php global   $base_url; echo $base_url ?>/product" class="waves-effect">
                <i class="mdi mdi-hexagon-multiple"></i> <span>Products</span>
            </a>
        </li>

        <!--Table - 2: category table for project_pharmacy erp fahim  -->
        <li><a href="<?php global   $base_url; echo $base_url ?>/category" class="waves-effect">
                <i class="mdi mdi-hexagon-multiple"></i> <span>category</span>
            </a>
        </li>

        <!--Table - 3: stock table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/stock" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Stock</span>
            </a>
        </li>
        <!--Table - 4: uom table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/uom" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> uom</span>
            </a>
        </li>

        <!--Table - 5: Warehouse table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Warehouse" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Warehouse</span>
            </a>
        </li>

        <!--Table - 6: Stock_adjustment table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/StockAdjustment" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Stock_adjustment</span>
            </a>
        </li>

        <!--Table - 7: Adjustment_type table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/AdjustmentType" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Adjustment_type</span>
            </a>
        </li>

        <!--Table - 8: Stock_adjusttment_detail table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/StockAdjustmentDetail" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Stock_adj_detail</span>
            </a>
        </li>

        <!--Table - 9: Transaction_type table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/TransactionType" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Transaction_type</span>
            </a>
        </li>

        <!--Table - 10: Status table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Status" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Status</span>
            </a>
        </li>

    </ul>

</li>

    <!-- End m1 ---------------------------------------- -->
<!-- 
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="javascript: void(0);" class="has-arrow waves-effect">Bexmco</a>
        <li>
        <a href="<?php // global   $base_url; echo $base_url ?>/customer" class="waves-effect">
        <i class="mdi mdi-cash"></i> <span> Customer</span>
    </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="tables-basic.html">Cardiac</a></li>
                <li><a href="tables-datatable.html">Heart</a></li>
                <li><a href="tables-responsive.html">General </a></li>
                <li><a href="tables-editable.html">Funeral</a></li>
            </ul>
        </li>
        <li><a href="tables-datatable.html">Acme</a></li>
        <li><a href="tables-responsive.html">Opsonin </a></li>
        <li><a href="tables-editable.html">Renata</a></li>
    </ul>
</li> -->

<!-- Module-2: Start Sales of pharmacy management erp fahim  -->

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-shopping"></i>
        <span>Sales Module</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

    <!--Table - 1: Sales table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Sale" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Sales </span>
            </a>
        </li>

        <!--Table - 2: Order table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Order" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Order</span>
            </a>
        </li>

        <!--Table - 3: Order_detail table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/OrderDetail" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Order_detail</span>
            </a>
        </li>

        <!--Table - 4: Customer table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Customer" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Customer</span>
            </a>
        </li>

    </ul>
</li>

<!--End m2 ===========================  -->
        <!-- <li><a href="tables-basic.html">Bexmco</a></li>
        <li><a href="tables-datatable.html">Acme</a></li>
        <li><a href="tables-responsive.html">Opsonin </a></li>
        <li><a href="tables-editable.html">Renata</a></li>
    </ul>
</li> -->


<!--Module-3: Start Purchase of pharmacy management erp fahim  -->

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-cart-plus"></i>
        <span>Purchase Module</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <!--Table - 1: Purchase table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Purchase" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Purchase</span>
            </a>
        </li>

        <!--Table - 2: Purchase_detail table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/PurchaseDetail" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Purchase_detail</span>
            </a>
        </li>

        <!--Table - 3: Supplier table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/supplier" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Supplier</span>
            </a>
        </li>

        <!--Table - 4: Supplier_return table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/SupplierReturn" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Supplier Return</span>
            </a>
        </li>

    </ul>
</li>
<!--End m3------------------- ---  -->
        <!-- <li><a href="tables-basic.html">Bexmco</a></li>
        <li><a href="tables-datatable.html">Acme</a></li>
        <li><a href="tables-responsive.html">Opsonin </a></li>
        <li><a href="tables-editable.html">Renata</a></li>
    </ul>
</li> -->


<!--Module-4: Start Customer and Supply of pharmacy management erp fahim  -->

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-handshake"></i>
        <span>Customer and Supply</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <!--Table - 1: Customer table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Customer" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Customer</span>
            </a>
        </li>

        <!--Table - 2: Supplier table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/supplier" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Supplier</span>
            </a>
        </li>
        <!--Table - 3: Manufacturer table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Manufacturer" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Manufacturer</span>
            </a>
        </li>

     </ul>
 </li>
    <!--End m4 --------------------  -->
        <!-- <li><a href="tables-basic.html">Bexmco</a></li>
        <li><a href="tables-datatable.html">Acme</a></li>
        <li><a href="tables-responsive.html">Opsonin </a></li>
        <li><a href="tables-editable.html">Renata</a></li>
    </ul>
</li> -->

<!--Module-5: Start Financial Reporting of pharmacy management erp fahim  -->

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-cash-register"></i>
        <span>Financial Reporting</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <!--Table - 1: Sale table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Sale" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Sale</span>
            </a>
        </li>
        <!--Table - 2: Purchase table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Purchase" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Purchase</span>
            </a>
        </li>

        <!--Table - 3: Supplier_return table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/supplierReturn" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Supplier_return</span>
            </a>
        </li>

        <!--Table - 4: Stock_adjustment table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/StockAdjustment" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Stock_adjustment</span>
            </a>
        </li>

     </ul>
</li>
        <!--End m5 =======================  -->


        <!-- <li><a href="tables-basic.html">Bexmco</a></li>
        <li><a href="tables-datatable.html">Acme</a></li>
        <li><a href="tables-responsive.html">Opsonin </a></li>
        <li><a href="tables-editable.html">Renata</a></li>
    </ul>
</li> -->
<!--Module-6: Start User Control of pharmacy management erp fahim  -->

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-account-cog"></i>
        <span>User Control</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <!--Table - 1: User table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/User" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> User</span>
            </a>
        </li>

        <!--Table - 2: Role table for project_pharmacy erp fahim  -->

        <li>
            <a href="<?php global   $base_url; echo $base_url ?>/Role" class="waves-effect">
                <i class="mdi mdi-transfer"></i> <span> Role</span>
            </a>
        </li>

        </ul>
</li>

<!--End m6 ===================  -->
<!-- 
        <li><a href="tables-editable.html">Owner</a></li>
        <li><a href="tables-basic.html">Admin</a></li>
        <li><a href="tables-datatable.html">employee</a></li>
        <li><a href="tables-responsive.html">customer </a></li>
    </ul>
</li> -->

<!--End  User Control of pharmacy management erp fahim  -->

<li>
<li>
    <a href="calendar.html" class=" waves-effect">
        <i class="mdi mdi-calendar-check"></i>
        <span>Calendar</span>
    </a>
</li>




<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-email-outline"></i>
        <span>Email</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="email-inbox.html">Inbox</a></li>
        <li><a href="email-read.html">Email Read</a></li>
        <li><a href="email-compose.html">Email Compose</a></li>
    </ul>
</li>

<li>
    <a href="chat.html" class=" waves-effect">
        <i class="mdi mdi-chat-processing-outline"></i>
        <span class="badge rounded-pill bg-danger float-end">Hot</span>
        <span>Chat</span>
    </a>
</li>

<li>
    <a href="kanbanboard.html" class=" waves-effect">
        <i class="mdi mdi-billboard"></i>
        <span class="badge rounded-pill bg-success float-end">New</span>
        <span>Kanban Board</span>
    </a>
</li>

<li class="menu-title">Components</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-buffer"></i>
        <span>UI Elements</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="ui-alerts.html">Alerts</a></li>
        <li><a href="ui-buttons.html">Buttons</a></li>
        <li><a href="ui-badge.html">Badge</a></li>
        <li><a href="ui-cards.html">Cards</a></li>
        <li><a href="ui-carousel.html">Carousel</a></li>
        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
        <li><a href="ui-utilities.html">Utilities<span class="badge rounded-pill bg-success float-end">New</span></a></li>
        <li><a href="ui-grid.html">Grid</a></li>
        <li><a href="ui-images.html">Images</a></li>
        <li><a href="ui-lightbox.html">Lightbox</a></li>
        <li><a href="ui-modals.html">Modals</a></li>
        <li><a href="ui-colors.html">Colors<span class="badge rounded-pill bg-warning float-end">New</span></a></li>
        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
        <li><a href="ui-pagination.html">Pagination</a></li>
        <li><a href="ui-popover-tooltips.html">Popover &amp; Tooltips</a></li>
        <li><a href="ui-rangeslider.html">Range Slider</a></li>
        <li><a href="ui-session-timeout.html">Session Timeout</a></li>
        <li><a href="ui-progressbars.html">Progress Bars</a></li>
        <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
        <li><a href="ui-typography.html">Typography</a></li>
        <li><a href="ui-video.html">Video</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <i class="mdi mdi-clipboard-outline"></i>
        <span class="badge rounded-pill bg-success float-end">6</span>
        <span>Forms</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="form-elements.html">Form Elements</a></li>
        <li><a href="form-validation.html">Form Validation</a></li>
        <li><a href="form-advanced.html">Form Advanced</a></li>
        <li><a href="form-editors.html">Form Editors</a></li>
        <li><a href="form-uploads.html">Form File Upload</a></li>
        <li><a href="form-xeditable.html">Form Xeditable</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-chart-line"></i>
        <span>Charts</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="charts-morris.html">Morris Chart</a></li>
        <li><a href="charts-chartist.html">Chartist Chart</a></li>
        <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
        <li><a href="charts-flot.html">Flot Chart</a></li>
        <li><a href="charts-c3.html">C3 Chart</a></li>
        <li><a href="charts-other.html">Jquery Knob Chart</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-format-list-bulleted-type"></i>
        <span>Tables</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="tables-basic.html">Basic Tables</a></li>
        <li><a href="tables-datatable.html">Data Table</a></li>
        <li><a href="tables-responsive.html">Responsive Table</a></li>
        <li><a href="tables-editable.html">Editable Table</a></li>
    </ul>
</li>



<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-album"></i>
        <span>Icons</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="icons-material.html">Material Design</a></li>
        <li><a href="icons-ion.html">Ion Icons</a></li>
        <li><a href="icons-fontawesome.html">Font Awesome</a></li>
        <li><a href="icons-themify.html">Themify Icons</a></li>
        <li><a href="icons-dripicons.html">Dripicons</a></li>
        <li><a href="icons-typicons.html">Typicons Icons</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="waves-effect">
        <span class="badge rounded-pill bg-danger float-end">2</span>
        <i class="mdi mdi-google-maps"></i>
        <span>Maps</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="maps-google.html"> Google Map</a></li>
        <li><a href="maps-vector.html"> Vector Map</a></li>
    </ul>
</li>

<li class="menu-title">Extras</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-responsive"></i>
        <span> Layouts </span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li>
            <a href="javascript: void(0);" class="has-arrow">Vertical</a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                <li><a href="layouts-boxed.html">Boxed Layout</a></li>
                <li><a href="layouts-preloader.html">Preloader</a></li>
                <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">Horizontal</a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="layouts-horizontal.html">Horizontal</a></li>
                <li><a href="layouts-hori-topbar-dark.html">Topbar Dark</a></li>
                <li><a href="layouts-hori-preloader.html">Preloader</a></li>
                <li><a href="layouts-hori-boxed-width.html">Boxed Layout</a></li>
            </ul>
        </li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-account-box"></i>
        <span> Authentication </span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="pages-login.html">Login</a></li>
        <li><a href="pages-register.html">Register</a></li>
        <li><a href="pages-recoverpw.html">Recover Password</a></li>
        <li><a href="pages-lock-screen.html">Lock Screen</a></li>
    </ul>
</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-text-box-multiple-outline"></i>
        <span> Extra Pages </span>
    </a>
    <ul class="sub-menu" aria-expanded="false">
        <li><a href="pages-timeline.html">Timeline</a></li>
        <li><a href="pages-invoice.html">Invoice</a></li>
        <li><a href="pages-directory.html">Directory</a></li>
        <li><a href="pages-blank.html">Blank Page</a></li>
        <li><a href="pages-404.html">Error 404</a></li>
        <li><a href="pages-500.html">Error 500</a></li>
    </ul>
</li>



<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="mdi mdi-share-variant"></i>
        <span>Multi Level</span>
    </a>
    <ul class="sub-menu" aria-expanded="true">
        <li><a href="javascript: void(0);">Level 1.1</a></li>
        <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
            <ul class="sub-menu" aria-expanded="true">
                <li><a href="javascript: void(0);">Level 2.1</a></li>
                <li><a href="javascript: void(0);">Level 2.2</a></li>
            </ul>
        </li>
    </ul>
</li>

<!-- Log out session for project_pharmacy erp fahim  -->

<li>
    <a href="<?php global   $base_url;
                echo $base_url ?>/logout.php" class="waves-effect">
        <i class="mdi mdi-cash"></i>
        <span> Log out </span>
    </a>
</li>