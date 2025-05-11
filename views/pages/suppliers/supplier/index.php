<div class="d-flex justify-content-between">
<h3>Supplier List</h3>
<a href="<?php echo $base_url?>/Supplier/create" class="btn btn-success">Create Supplier</a>
    </div><br>


    
    <?php
     echo Supplier::display();
    ?>
<!-- <table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>helal</td>
            <td>Helal@gmail.com</td>
        </tr>
    </tbody>
</table> -->

