<?php
// print_r($_REQUEST);

?>



<div class="d-flex justify-content-between">
    <h3>Update Supplier</h3>
    <a href="<?php echo $base_url?>/supplier" class="btn btn-secondary">Supplier List</a>
    </div>
    <form action="<?php echo $base_url?>/supplier/update" method="post" >
        <input type="hidden" name="id" value="<?php echo $supplier->id  ?>">
   
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo $supplier->name  ?>">

        <label for="address">Address:</label>
        <input type="text" name="address"id="address" class="form-control" value="<?php echo $supplier->address  ?>">
        
        <label for="phone">Phone:</label>
        <input type="text" name="phone"id="phone" class="form-control" value="<?php echo $supplier->phone  ?>">

        <label for="email">Eamil:</label>
        <input type="eamil" name="email"id="email"class="form-control" value="<?php echo $supplier->email  ?>">

        <label for="photo">Photo</label>
        <input type="text" name="photo"id="photo" class="form-control" value="<?php echo $supplier->photo  ?>"> <br>
        
        <input type="submit" value="Update" name="update" class="btn bg-success">
    
    </form>
