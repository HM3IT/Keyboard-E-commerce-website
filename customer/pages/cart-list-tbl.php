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
            $product_id = $value['id'];
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
                        <span class="quantity" data-product-id="<?php echo $product_id; ?>">
                            <?php echo $quantity ?>
                        </span>
                        <span class="plus">+</span>
                    </div>
                </td>
                <td class="subtotal-col"><?php echo  $formattedSubtotal  ?></td>
                <td>
                    <a href="product-detail.php?view-product-id=<?php echo $product_id  ?>" class="view-cart-a information-border">View</a>
                    <a class="remove-cart-a danger-border" data-product-id="<?php echo $product_id; ?>">Remove</a>
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
                <?php
                if (isset($_SESSION['name'])) {
                ?>
                    <a href="#checkout-anchor" class="checkout-btn success-bg">Order Now</a>

                <?php
                } else {
                ?>

                    <a onclick="askLogin()" class="checkout-btn success-bg">Order Now</a>

                <?php
                }
                ?>
            </td>
        </tr>
    </table>
</section>
<div id="ask-login-overlay"></div>
<div id="ask-login-form">
    <div>
        <i class="fa-regular fa-face-laugh-beam" id="smilly-emoji"></i>
        <h2>Please login to your account. </h2>
    </div>

    <div>
        <form action="./login.php" method="post">
            <input type="hidden" name="current_page" class="current_page">
            <input type="submit" class="information-bg ask-login-btn" name="login-for-checkout" value="Login">
        </form>
    </div>
</div>

<script>
    function askLogin() {
        document.getElementById("ask-login-overlay").style.display = "block";
        document.getElementById("ask-login-form").style.display = "block";
    }
 
</script>
<script src="./scripts/redirect.js">
</script>
