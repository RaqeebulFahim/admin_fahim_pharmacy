
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
		/* background-color: #007BFF; */
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
	    width: 80%;
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
		/* text-align: left; */
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

	.input_width {
		max-width: 50px;
	}
</style>
 <script src="<?php echo $base_url?>/assets/js/jquery.js"></script>

<div class="bh">
<h3>Create Order</h3>
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
			<h3>Invoice #: 100<?php echo  Order::get_last_id()+1;?></h3>
			<h3><?php //echo  Order::get_last_id()?></h3>
			<p>Date: <span id="order_date"><?php echo date("Y-m-d") ?></span></p>
		</div>
	</header>

	<!-- Customer & Shipping Details (two columns) -->
	<section class="invoice-address">
		<div class="address-column">
			<h4>Customer Information</h4>
			<p><strong >Name:<?php echo  Customer::html_select("customer_id") ?></strong></p>
			<p><strong>Address:</strong> <span id="address_cus"></span> </p>
			<p><strong>Phone:</strong> <span id="phone"></span> </p>
			<p><strong>Email:</strong> <span id="email"> </span></p>
			<!-- <p><button id="click">click</button></p> -->
		</div>
		<div class="address-column">
			<h4>Shipping Address</h4>
			<p><strong>Address:</strong> <textarea name="" id="get_address"></textarea>
		</div>
	</section>

	<!-- Body -->
	<section class="invoice-body container">
		<h2>Sales Invoice</h2>


		<table class="invoice-table">
			<thead>
				<tr>
					<th>Item Description</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Discount</th>
					<th>subtotal</th>
					<th><button class="btn btn-danger clearAll">Clear All</button></th>
				</tr>
				<tr>
					<th><?php echo Product::html_select("product_id") ?></th>
					<th><input class="input_width" type="text" id="qty" value="1"></th>
					<th><input class="input_width" type="text" id="unit_price"></th>
					<th> <input class="input_width" id="txtDiscount" type="text"></th>
					<th></th>
					<th><button class="btn btn-primary add_product">Add</button></th>
				</tr>
			</thead>
			<tbody id="data_append">


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
				<p><strong>Subtotal:</strong> <span id="subtotal_amount"></span> BDT</p>
				<div class="discount">
					<label for="discount">Discount:</label>
					<input type="number" id="discount_amount" class="discount_taka" value=""> BDT
				</div>
				<p><strong>Tax (15%):</strong> <span id="tax_amount"> </span> BDT</p>
				<p><strong>Total Amount:</strong> <span id="total_amount"> </span> BDT</p>
			</div>
		</section>

		<!-- Footer -->
		<footer class="invoice-footer">
			<p>&copy; 2024 Fahad Medical Store. All rights reserved.</p>
		</footer>
</div>

<div class="action-discount">
	<div class="actions">
		<button class="btn btn-secondary mt-2 process">Process</button>

	</div>
</div>


<script>

	$(function() {
	//	alert();
		var cart = new Cart("sales");
		printCart();
		// alert();
		$("#customer_id").on("change", function() {
			let customer_id = $(this).val();
			 //alert(customer_id);

			$.ajax({
				url: "<?php  echo $base_url ?>/api/Customer/find",
				type: "post",
				data: {
					id: customer_id
				},
				success: function(res) {
					console.log(res);
					
					let customer_data = JSON.parse(res)
					
					$("#email").text(customer_data.customer.email);
					$("#phone").text(customer_data.customer.phone);
					$("#get_address").text(customer_data.customer.address);
					$("#address_cus").text(customer_data.customer.address);
				},
				error: function(res) {}
			})



		})

		$("#product_id").on("change", function() {
			let product_id = $(this).val();
			$.ajax({
				url: "<?php echo $base_url ?>/api/Product/find",
				type: "post",
				data: {
					id: product_id
				},
				success: function(res) {
					console.log(res);

					let product_data = JSON.parse(res)

					$("#unit_price").val(product_data.product.price);

				},
				error: function(res) {}
			})



		})


		$(".add_product").on("click", function() {

			let item_id = $("#product_id").val();
			let name = $("#product_id option:selected").text();

			let price = $("#unit_price").val();
			let qty = $("#qty").val();
			let discount = $("#txtDiscount").val();

			let total_discount = discount * qty;
			let subtotal = price * qty - total_discount;

			let item = {
				"name": name,
				"item_id": item_id,
				"price": price,
				"qty": parseFloat(qty),
				"discount": discount,
				'total_discount': total_discount,
				"subtotal": subtotal
			};

			cart.save(item);
			printCart();



		});

		function printCart() {
			let subtotal = 0;
			let discount = 0;
			let tax = 0;
			let items = cart.getCart();
			let html = "";
			
			if(items){
			    	items.forEach((element, key) => {
				subtotal += element.subtotal;
				discount += element.total_discount;
				html += `
				 <tr>
					<td>${element.name}</td>
					<td>${element.qty}</td>
					<td>${element.price}</td>
					<td>${element.total_discount}</td>
					<td>${element.subtotal}</td>
					<td><button data-id="${element.item_id}" class="btn btn-warning delete">Remove</button></td>
				</tr>
				`;
			});
			    
			}
		

			$("#data_append").html(html);
			$("#subtotal_amount").text(subtotal);
			$("#discount_amount").val(discount);
			tax = subtotal * 0.15
			let total_amount = tax + subtotal;
			$("#tax_amount").text(tax);
			$("#total_amount").text(total_amount);

		}

		$("body").on("click", ".delete", function() {
			let id = $(this).data("id");

			cart.delItem(id)
			printCart()
		})
		$("body").on("click", ".clearAll", function() {
			cart.clearCart()
			printCart()
		})
 
		$(".process").on("click", function() {
		  //   alert() 
		 

			let customer_id = $("#customer_id").val();
			let order_date = $("#order_date").text();
			let delivery_date = "";
			let shipping_address = $("#get_address").text();
			let order_total = $("#total_amount").text();
			let remark = "";
			let paid_amount = $("#total_amount").text();
			let discount = $("#discount_amount").val() ?? 0;
			let vat = $("#tax_amount").text();
			let status_id = 2;
			let product = cart.getCart();

			//console.log(customer_id, order_date, shipping_address, order_total, paid_amount, discount, vat, product);

			$.ajax({
				url: "<?php echo $base_url ?>/api/Order/process",
				type: "post",
				data: {
					 customer_id:customer_id,
					 order_date:order_date, 
					 shipping_address:shipping_address, 
					 order_total:order_total, 
					 paid_amount:paid_amount, 
					 discount:discount, 
					 vat:vat, 
					 product:product,
					 status_id:status_id,
					 delivery_date:delivery_date
					},
				success: function(res) {
					console.log(res);
					
					cart.clearCart()
			        printCart()
					window.location.replace("<?php echo $base_url?>/order");
				},
				error: function(res) {
				    console.log(res)
				}
			})




		})

	 })
</script>
<script src=" <?php echo $base_url ?>/js/cart.js"></script>