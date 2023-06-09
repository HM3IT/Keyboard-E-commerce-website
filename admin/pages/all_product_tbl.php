<?php
require "../dao/connection.php";
$get_all_product_sql = "SELECT * FROM product";
?>
<section class="product-section table-container-wrap">
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
            $id = $row["id"];
            $category_id =  $row["category_id"];
            $get_category_sql = "SELECT category_name FROM category WHERE id=$category_id";
            $get_product_images_sql = "SELECT primary_img FROM images WHERE product_id=$id";

            $dataset = $connection->query($get_category_sql);
            $data = $dataset->fetch();
            $category = $data["category_name"];

            $image_set = $connection->query($get_product_images_sql);
            $images = $image_set->fetch();
            $primary_img = $images["primary_img"];

        ?>
            <tr>
                <td><?php echo  $serial++  ?></td>
                <td>
                    <img src="../images/Products/<?php echo $category . '/' . $primary_img  ?>" alt="photo" class="product-tbl-img">
                </td>
                <td><?php echo  $id  ?></td>
                <td><?php echo $row["name"]  ?></td>
                <td><?php echo $row["description"]  ?></td>
                <td><?php echo $row["price"]  ?></td>
                <td><?php echo $row["quantity"]  ?></td>
                <td><?php echo $category ?></td>
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