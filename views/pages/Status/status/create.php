<div class="d-flex justify-content-between">
    <h3>Add Status</h3>
    <a href="<?php echo $base_url?>/Status" class="btn btn-secondary"> Status List</a>
    </div>


<form action="<?php echo $base_url?>/status/save" method="post" class="form form-control">
    

    <label for="name">Name:</label>
    <input type="text" name="name" class="form form-control"><br>

    <input type="submit" name="submit" value="Create Status" class="btn btn-success">

</form>
