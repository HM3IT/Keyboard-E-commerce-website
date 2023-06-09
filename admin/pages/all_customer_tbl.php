<?php
require "../dao/connection.php";
$get_all_user_sql = "SELECT * FROM customer";

?>
<section class="customer-section table-container-wrap">
    <h2>Customers</h2>
    <table id="all-customer-table">
        <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $serial = 1;
        foreach ($connection->query($get_all_user_sql) as $row) {
        ?>
            <tr>
                <td><?php echo  $serial++  ?></td>
                <td>
                    <img src="../images/User/<?php echo $row["image"] ?>" alt="photo" class="customer-tbl-img">
                </td>
                <td><?php echo $row["name"]  ?></td>
                <td><?php echo $row["phone"]  ?></td>
                <td><?php echo $row["email"]  ?></td>
                <td class="customer-tbl-action-col">
                    <a href="./view_customer.php?view_customer_id=<?php echo $row['id']; ?>" class="edit-btn information-border">View</a>
                    <a href="./controller/customer_controller.php?remove_customer_id=<?php echo $row['id']; ?>" class="remove-btn danger-border">Remove</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
</section>