
<?php
// $status = Status::search($id);

$id= $_GET['id'];
$status=status::search($id);
$status =$status->fetch_object();
// print_r($status);

?>
<div class="d-flex justify-content-between">
    <h3>Update Status</h3>
    <a href="<?php echo $base_url?>/Status" class="btn btn-secondary"> Status List</a>
    </div>


<form action="<?php echo $base_url?>/status/update" method="post" class="form form-control">
    <input type="hidden" name="id"  value="<?php echo $status->id?>" class="form form-control">

    <label for="name">Name:</label>
    <input type="text" name="name" class="form form-control" value="<?php echo $status->name?>"><br>

    <input type="submit" name="update" value="Update" class="btn btn-success">

</form>
