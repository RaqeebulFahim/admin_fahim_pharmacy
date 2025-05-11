<style>
    /* Reset default margin and padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        
    }

    .bh{
		
		display: flex;
		justify-content: space-between;
		width: 80%;
		margin: 0 auto;
		background-color: #fff;
		padding: 10px;
		border: 1px solid #ddd;
		border-radius: 8px;
	}

    .invoice-container {
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
        border-bottom: 2px solid #f4f4f4;
        padding-bottom: 20px;
    }

    .invoice-logo img {
        max-width: 100px;
    }

    .invoice-info h1 {
        font-size: 28px;
        margin-bottom: 5px;
    }

    .invoice-number h3 {
        font-size: 22px;
    }

    .invoice-address {
        display: flex;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .address-column {
        width: 45%;
    }

    h4 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .invoice-body {
        margin-bottom: 30px;
    }

    .invoice-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    .invoice-table th,
    .invoice-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .invoice-table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    .action-discount {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .discount {
        display: flex;
        align-items: center;
    }

    .discount input {
        padding: 5px;
        width: 80px;
        margin-left: 10px;
    }

    .actions button {
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
    }

    .actions button:hover {
        background-color: #0056b3;
    }

    .invoice-summary {
        display: flex;
        justify-content: space-between;
    }

    .summary-left {
        width: 50%;
    }

    .summary-right {
        text-align: right;
        font-size: 18px;
        font-weight: bold;
    }

    .invoice-footer {
        text-align: center;
        font-size: 14px;
        color: #999;
        margin-top: 40px;
    }



    .approved-section {
        padding: 10px;
        /* margin-top: 20px; */
        text-align: center;
        font-weight: bold;
    }

    h3 {
        background-color: #F5EFFF;
        padding: 2px;
    }

    .signature-section {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        font-size: 14px;
    }

    .signature-section div {
        width: 45%;
    }
</style>

<?php 

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

   //print_r($order);

  //$abc= OrderDetail::find_details(52);
  // print_r( $abc);

  



?>


<div class="bh">
<h3>Showing Invoice</h3>
<a href="<?php echo $base_url?>/order" class="btn btn-secondary"> Order</a>
</div>

<div class="invoice-container">
    <!-- Header -->
    <header class="invoice-header">
        <div class="invoice-logo">
            <img src="../assets/images/Raqeebul Fahim.png" alt="Pharmacy Logo">
        </div>
        <div class="invoice-info">
            <h1>Fahad Medical Store</h1>
            <p>123 Pharmacy Street, Dhaka, Bangladesh</p>
            <p>Phone: +8801777889900</p>
            <p>Email: contact@pharmacy.com</p>
        </div>
        <div class="invoice-number">
            <!-- <h3>Invoice #: 1001</h3> -->
            <h3>Invoice #: 100<?php echo $_GET['id'] ?></h3>
            <p>Date: 2024-12-04</p>
        </div>
    </header>

    <!-- Customer & Shipping Details (two columns) -->
    <section class="invoice-address">
        <div class="address-column">
            <h4>Customer Information</h4>
            <p><strong>Name:</strong> <?php echo Customer::find($order->customer_id)->name ?></p>
            <p><strong>Address:</strong><?php echo Customer::find($order->customer_id)->address ?></p>
            <p><strong>Phone:</strong> <?php echo Customer::find($order->customer_id)->phone ?></p>
            <p><strong>Email:</strong> <?php echo Customer::find($order->customer_id)->email ?></p>
        </div>
        <div class="address-column">
            <h4>Shipping Address</h4>
            <p><strong>Address:</strong>  <?php echo $order->shipping_address ?></p>
            
        </div>
    </section>

    <!-- Body -->
    
    <?php 
    

                 
  
  
    
    ?>
    <section class="invoice-body">
        <h2>Sales Invoice</h2>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Item Description </th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Discount</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                 $order_details= OrderDetail::find_details($order->id);
                // print_r( $order_details);
                 
                 //echo "abc";
          
                 $subtotal=0;
                 $total_discount=0;
                 foreach ($order_details as $key => $value) {
                   
                    
                    $product_name= Product::find($value['product_id'])->name;
                    $qty= $value['qty'];
                    $price= $value['price'];
                    $discount= $value['discount'];
                    $total_price=  $price * $qty -  $discount;
                    $subtotal+=$total_price;
                    $total_discount+= $discount;
                    echo "
                    
                        <tr>
                            <td>$product_name</td>
                            <td>$qty</td>
                            <td> $price</td>
                            <td> $discount</td>
                            <td>$total_price</td>
                        </tr>
                    
                    
                    ";
                 }
                
                ?>


               
                
            </tbody>
        </table>


        <!-- Summary -->
        <section class="invoice-summary">
            <div class="approved-section">
                <h3>APPROVED BY</h3>
                <!-- Signature Section -->
                <div class="signature-section">
                    <div>
                        <p>Authorized Signatory</p>
                        <p>________________________</p>
                    </div>
                    <div>
                        <p>Date</p>
                        <p>________________________</p>
                    </div>
                </div>
            </div>
            <div class="summary-right">
                <p><strong>Subtotal:</strong> <?php echo  $subtotal + $total_discount ?> BDT</p>
                <div class="discount">
                    <label for="discount">Discount:</label>
                    <input disabled type="text" value="<?php echo  $total_discount ?>">                BDT
                </div>
                <p><strong>Tax (15%):</strong><?php echo $order->vat ?> BDT</p>
                <p><strong>Total Amount:</strong><?php echo $order->order_total ?> BDT</p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="invoice-footer">
            <p>&copy; 2024 Fahad Medical Store. All rights reserved.</p>
        </footer>
</div>

<div class="action-discount">
    <!-- <div class="actions">
        <button class="btn">Pay Now</button>
        <button class="btn">Print Invoice</button>
    </div> -->
    <div class="print-btn">
        <button onclick="window.print()" class="btn btn-secondary mt-2">Print Receipt</button>
    </div>

</div>

