<?php
require "../dao/connection.php";
$get_all_order_sql = "SELECT * FROM orders";
$all_product_dataset = $connection->query($get_all_order_sql) ;
?>
<section class="product-section">
    <h2>Inquary order</h2>
    <table id="all-product-table">
        <tr>
            <th>No.</th>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Order Date</th>

            <th>Shipping Address</th>
            <th>Total Price (Ks)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
        $serial = 1;

        // $get_customer_name_qry = "SELECT name FROM customer WHERE id = ?";

        
        // $statement = $connection->prepare($get_customer_name_qry);
        foreach ($all_product_dataset as $value) {
            $order_id = $value["id"];
       
           $customer_id = $value["customer_id"];
            $get_customer_name_qry = "SELECT name FROM customer WHERE id = $customer_id ";
           $result= $connection->query( $get_customer_name_qry);
           $row = $result->fetch();
           $customer_name = $row["name"];

        ?>
            <tr>
                <td><?php echo  $serial++  ?></td>
                <td><?php echo  $order_id  ?></td>
                <td><?php echo  $customer_name  ?></td>
                <td><?php echo $value["order_date"]  ?></td>

                <td><?php echo $value["ship_address"]  ?></td>
                <td><?php echo $value["total_price"]  ?></td>
                <td><?php echo "Pending" ?></td>
                <td>
                    <a href="./view_order.php?view_order_id=<?php echo $value['id']; ?>" class="view-btn information-bg ">View Details</a>                 
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
</section>