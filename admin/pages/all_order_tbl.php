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
        <?php

        foreach ($all_product_dataset as $value) {
            $order_id = $value["id"];

            $customer_id = $value["customer_id"];
            $get_customer_name_qry = "SELECT name FROM customer WHERE id = $customer_id ";
            $result = $connection->query($get_customer_name_qry);
            $row = $result->fetch();
            $customer_name = $row["name"];

        ?>
            <tr>
                <td><?php echo  $order_id  ?></td>
                <td><?php echo  $customer_name  ?></td>
                <td><?php echo $value["order_date"]  ?></td>

                <td class="address"><?php echo $value["ship_address"]  ?></td>
                <td>
                    <?php echo $value["total_price"]  ?>
                </td>
                <form method="POST" class="order-status-form">
                    <td>
                        <input type="hidden" name="order_id" value="<?php echo $value['id']; ?>">
                        <select name="order_approval" class="order-approval">
                            <option value="<?php echo $value["order_approval"] ?>" selected><?php echo $value["order_approval"] ?></option>
                            <option value="YES">YES</option>
                        </select>
                    </td>
                    <td>
                        <select name="delivery_status" class="delivery-status">


                            <option class="pending" value="PENDING" <?php if ($value["delivery_status"]  === "PENDING") echo "selected"; ?>> Pending </option>
                            <option class="RECEIVED" value="RECEIVED" <?php if ($value["delivery_status"]  === "RECEIVED") echo "selected"; ?>>Received</option>
                        </select>
                    </td>
                    <td>
                        <a href="./view_order.php?view_order_id=<?php echo $value['id']; ?>" class="view-btn information-border">View Details</a>
                        <button type="button" onclick="confirmChanges()" class="update-status-btn warning-border">Update status</button>
                    </td>
                </form>
            </tr>
        <?php
        }
        ?>

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