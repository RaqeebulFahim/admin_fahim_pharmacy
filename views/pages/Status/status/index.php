<div class="d-flex justify-content-between">
<h3>Status List</h3>
<a href="<?php echo $base_url?>/status/create" class="btn btn-success">Create status</a>
    </div>

<?php
 echo Status::display();
?>
