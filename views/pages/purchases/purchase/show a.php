<?php
// echo Page::title(["title"=>"Show Purchase"]);
// echo Page::body_open();
// echo Html::link(["class"=>"btn btn-success", "route"=>"purchase", "text"=>"Manage Purchase"]);
// echo Page::context_open();
// echo Purchase::html_row_details($id);
// echo Page::context_close();
// echo Page::body_close();
?>








    <!-- <link rel="stylesheet" href="style.css"> -->
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
            max-width: 150px;
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
    h3{
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

    .action-discount {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
    </style>
</head>

<div class="bh">
<h3>Showing Invoice</h3>
<a href="http://localhost/Project_Pharmacy/admin_fahim/purchase" class="btn btn-secondary"> Purchase</a>
</div>

<body>
    <div class="invoice-container">
        <!-- Header -->
        <header class="invoice-header">
            <div class="invoice-logo">
                <img src="../../assets/images/raqeebul fahim.png" alt="Pharmacy Logo">
            </div>
            <div class="invoice-info">
                <h1>Pharmacy Name</h1>
                <p>123 Pharmacy Street, Dhaka, Bangladesh</p>
                <p>Phone: +8801777889900</p>
                <p>Email: contact@pharmacy.com</p>
            </div>
            <div class="invoice-number">
                <h3>Invoice #: 0001</h3>
                <p>Date: 2024-12-18</p>
            </div>
        </header>

        <!-- Supplier & Billing Details (two columns) -->
        <section class="invoice-address">
            <div class="address-column">
                <h4>Supplier Information</h4>
                <p><strong>Name:</strong> XYZ Pharmaceutical Ltd.</p>
                <p><strong>Address:</strong> 45, Supplier Street, Dhaka</p>
                <p><strong>Phone:</strong> +8801667773331</p>
                <p><strong>Email:</strong> supplier@xyzpharma.com</p>
            </div>
            <div class="address-column">
                <h4>Billing Address</h4>
                <p><strong>Name:</strong> Pharmacy Owner</p>
                <p><strong>Address:</strong> 123 Pharmacy Street, Dhaka</p>
                <p><strong>Phone:</strong> +8801887776655</p>
            </div>
        </section>

        <!-- Body -->
        <section class="invoice-body">
            <h2>Purchase Invoice</h2>
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Paracetamol 500mg</td>
                        <td>100</td>
                        <td>20</td>
                        <td>2000</td>
                    </tr>
                    <tr>
                        <td>Amoxicillin 250mg</td>
                        <td>50</td>
                        <td>50</td>
                        <td>2500</td>
                    </tr>
                    <tr>
                        <td>Vitamin C</td>
                        <td>200</td>
                        <td>15</td>
                        <td>3000</td>
                    </tr>
                </tbody>
            </table>
        </section>

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
                <p><strong>Subtotal:</strong> 7500 BDT</p>
                <div class="discount">
                    <label for="discount">Discount:</label>
                    <input type="number" id="discount" value="0"> BDT
                </div>
                <p><strong>Tax (15%):</strong> 1125 BDT</p>
                <p><strong>Total Amount:</strong> 8625 BDT</p>
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
</body>
