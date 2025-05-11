<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create products Table for Project_pharmacy Database</title>
</head>
<body>


<div class="d-flex justify-content-between">
    <h3>Add Products</h3>
    <a href="<?php echo $base_url?>/product" class="btn btn-secondary"> Supplier List</a>
    </div>

   
    <form action="<?php echo $base_url ?>/product/save" method="post" class="form-control">
        <Fieldset>
            <legend></legend>
            
            
        <input type="hidden" id="id" name="id" class="form-control"> <br>

            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" class="form-control" > <br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control"> <br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control"> <br>

            <label for="discount">discount:</label>
            <input id="discount" name="discount" type="number"class="form-control"></input> <br>

            <label for="final_price">Final_price:</label>
            <input type="number" id="final_price" name="final_price" class="form-control"> <br>

            <label for="category_id">category_id:</label>
            <input type="number" id="category_id" name="category_id" class="form-control"> <br>

            <label for="uom_id">uom_id:</label>
            <input type="number" id="uom_id" name="uom_id" class="form-control"> <br>

            <label for="barcode">barcode:</label>
            <input type="text" id="barcode" name="barcode" class="form-control"> <br>

            <label for="sku">sku:</label>
            <input type="text" id="sku" name="sku" class="form-control"> <br>

            <label for="manufacturer_id">manufacturer_id:</label>
            <input type="text" id="manufacturer_id" name="manufacturer_id" class="form-control"> <br>

            <label for="description">description:</label>
            <input type="text" id="description" name="description" class="form-control"> <br>
        </Fieldset>
        <input type="submit" name="submit" class="btn bg-success">
    </form>

 


</body>
</html>