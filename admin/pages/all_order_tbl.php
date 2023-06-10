<?php
require "../dao/connection.php";
$get_all_order_sql = "SELECT * FROM orders";
$all_product_dataset = $connection->query($get_all_order_sql);

$row_count = $all_product_dataset->rowCount();
?>
<section class="product-section table-container-wrap">
    <h2>Number of Inquiries: <?php echo  $row_count  ?></h2>
    <table id='empTable' class="all-product-table display dataTable">
        <thead>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Order Date</th>

            <th class="address">Shipping Address</th>
            <th>Total Price (Ks)</th>
            <th>Approval Status</th>
            <th>Delivery Status</th>
            <th>Action</th>
        </thead>
    </table>
</section>

<div id="confirm-status-overlay"></div>
<div id="confirm-status-box">
    <div>
        <i class="fa-solid fa-circle-info" id="information-icon"></i>
    </div>
    <h2 class="info">Are you sure to make changes</h2>
    <div>
        <button onclick="closeConfirmForm()" id="cancel-btn">Cancel</button>
        <button id="confirm-btn">Confirm</button>
    </div>
</div>

<script src="./scripts/all_order_tbl.js"></script>