<div class="d-flex justify-content-between">
    <h3>Add Supplier</h3>
    <a href="<?php echo $base_url?>/Supplier" class="btn btn-secondary"> Supplier List</a>
    </div>
    <form action="<?php echo $base_url ?>/supplier/save"
        method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" class="form-control">

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" class="form-control">

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" class="form-control">

        <label for="email">Eamil:</label>
        <input type="eamil" name="email" id="email" class="form-control">

        <label for="photo">Photo</label>
        <input type="text" name="photo" id="photo" class="form-control">

        <input type="submit" name="submit" class="btn bg-success">
</form>

