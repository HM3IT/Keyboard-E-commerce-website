<section class="cart-list-section">
    <h2>My Shopping Cart</h2>
    <table id="cart-list-table">
        <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal (ks)</th>
            <th>Action</th>
        </tr>
        <?php
        if (!isset($_SESSION["cart"]) || count($_SESSION["cart"]) <= 0) {
        ?>
            <div id="empty-cart-noti-overlay"></div>
            <div id="empty-cart-noti-form">
                <div>
                    <i class="fa-solid fa-face-grin-beam-sweat" id="sad-emoji"></i>
                    <h2>Sorry, you have not added any product into the cart yet</h2>
                </div>
                <a href="./index.php#product-section-anchor" class="information-bg">OK</a>
            </div>
        <?php
            exit;
        }
        $serial = 1;
        $total_cost = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
            $price = $value["price"];
            $quantity = $value["Quantity"];
            $subtotal = $price * $quantity;
            $total_cost += $subtotal;
            $formattedSubtotal = number_format($subtotal, 2, ',');
        ?>
            <tr>
                <td><?php echo  $serial++  ?></td>
                <td>
                    <img src="../images/Products/<?php echo $value["category"] ?>/<?php echo $value["image"]  ?>" alt="photo" class="product-tbl-img">
                </td>
                <td><?php echo $value["name"]  ?></td>
                <td><?php echo  $price   ?></td>
                <td>
                    <div class="product-quantity-wrapper">
                        <span class="minus">-</span>
                        <span class="quantity" data-product-id="<?php echo $value['id']; ?>">
                            <?php echo $quantity ?>
                        </span>
                        <span class="plus">+</span>
                    </div>
                </td>
                <td class="subtotal-col"><?php echo  $formattedSubtotal  ?></td>
                <td>
                    <a href="./controller/product_controller.php?view_product_id=<?php echo $value['id']; ?>" class="view-cart-a information-border">View</a>
                    <a class="remove-cart-a danger-border" data-product-id="<?php echo $value['id']; ?>">Remove</a>


                </td>
            </tr>
        <?php
        }
        ?>
        <tr id="total-cost-row" class="information">္
            <td colspan="5">Total Cost</td>
            <td><?php
                $_SESSION["total_cost"] =  $total_cost;
                echo  number_format($total_cost, 2, ',') . ' Ks';
                ?></td>
            <td>
                <a href="./controller/order_controller.php?checkout_order_id=<?php echo "1" ?>" class="checkout-btn success-bg">Check Out</a>
            </td>
        </tr>
    </table>
</section>