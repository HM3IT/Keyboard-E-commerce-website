<?php
require "../dao/connection.php";
$get_all_product_sql = "SELECT * FROM product";
?>
<section class="product-section">
    <h2>Products from inventory</h2>
    <table id="all-product-table">
        <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Action</th>

        </tr>
        <?php
        $serial = 1;
        foreach ($connection->query($get_all_product_sql) as $row) {

        ?>
            <tr>
                <td><?php echo  $serial++  ?></td>
                <td>
                    <img src="../images/Products/<?php echo $row["category"] ?>/<?php echo $row["image"]  ?>" alt="photo" class="product-tbl-img">
                </td>
                <td><?php echo  $row["id"] ?></td>
                <td><?php echo $row["name"]  ?></td>
                <td><?php echo $row["description"]  ?></td>
                <td><?php echo $row["price"]  ?></td>
                <td><?php echo $row["quantity"]  ?></td>
                <td><?php echo $row["category"]  ?></td>
                <td>
                    <a href="./edit_product.php?edit_product_id=<?php echo $row['id']; ?>" class="edit-btn warning-border">Edit</a>
                    <a href="./controller/product_controller.php?remove_product_id=<?php echo $row['id']; ?>" class="remove-btn danger-border">Remove</a>
                </td>
            </tr>
        <?php
        }
        ?>

    </table>
</section>