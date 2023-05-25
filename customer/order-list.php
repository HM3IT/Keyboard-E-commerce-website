<?php
if (!isset($_SESSION)) {
    session_start();
}

require "../dao/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/order-list.css">
</head>

<body>

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

            $total_cost = 0;
            foreach ($_SESSION["cart"] as $key => $value) {
                $price = $value["price"];
                $quantity = $value["Quantity"];
                $cost = $price * $quantity;
                $total_cost += $cost;
            ?>
                <tr>
                    <td><?php echo  $serial++  ?></td>
                    <td>
                        <img src="../images/Products/<?php echo $value["category"] ?>/<?php echo $value["image"]  ?>" alt="photo" class="product-tbl-img">
                    </td>
                    <td><?php echo  $value["id"] ?></td>
                    <td><?php echo $value["name"]  ?></td>
                    <td><?php echo $value["description"]  ?></td>
                    <td><?php echo $value["price"]  ?></td>
                    <td><?php echo $value["quantity"]  ?></td>
                    <td><?php echo $value["category"]  ?></td>
                    <td>
                        <a href="./edit_product.php?edit_product_id=<?php echo $value['id']; ?>" class="edit-btn warning-border">Edit</a>
                        <a href="./controller/product_controller.php?remove_product_id=<?php echo $value['id']; ?>" class="remove-btn danger-border">Remove</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>
    </section>
</body>

</html>