<div class="d-flex justify-content-between">
    <h3>Product List</h3>
    <a href="<?php echo $base_url ?>/product/create" class="btn btn-success">Create Product</a>
    </div><br>

    <?php
     echo product::display();
    ?>