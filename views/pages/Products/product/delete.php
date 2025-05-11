

<div class="d-flex justify-content-between">
    <h3>Delete Products</h3>
    <a href="<?php echo $base_url?>/product" class="btn btn-secondary">Products List</a>
    </div>
            
    <form action="<?php echo $base_url ?>/product/confirm_delete" method="post" class="form-control">
        <Fieldset>
            <legend></legend>

       
            
        <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $product->id  ?>"> <br>

            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" class="form-control"  value="<?php echo $product->name  ?>"> <br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo $product->quantity  ?>"> <br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" value="<?php echo $product->price  ?>"> <br>

            <label for="discount">discount:</label>
            <input id="discount" name="discount" type="number"class="form-control" value="<?php echo $product->discount  ?>"> <br>

            <label for="final_price">Final_price:</label>
            <input type="number" id="final_price" name="final_price" class="form-control" value="<?php echo $product->final_price  ?>"> <br>

            <label for="category_id">category_id:</label>
            <input type="number" id="category_id" name="category_id" class="form-control" value="<?php echo $product->category_id  ?>"> <br>

            <label for="uom_id">uom_id:</label>
            <input type="number" id="uom_id" name="uom_id" class="form-control" value="<?php echo $product->uom_id  ?>"> <br>

            <label for="barcode">barcode:</label>
            <input type="text" id="barcode" name="barcode" class="form-control" value="<?php echo $product->barcode  ?>"> <br>

            <label for="sku">sku:</label>
            <input type="text" id="sku" name="sku" class="form-control" value="<?php echo $product->sku  ?>"> <br>

            <label for="manufacturer_id">manufacturer_id:</label>
            <input type="text" id="manufacturer_id" name="manufacturer_id" class="form-control" value="<?php echo $product->manufacturer_id  ?>"> <br>

            <label for="description">description:</label>
            <input type="text" id="description" name="description" class="form-control" value="<?php echo $product->description  ?>"> <br>
        </Fieldset>
        <input type="submit" name="delete" value="Delete" class="btn bg-success">
    </form>
