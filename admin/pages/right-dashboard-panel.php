<!-- START of the right-side-panel -->
<section id="right-side-panel">
    <!-- START of Top div  -->
    <div class="top">
        <button id="menu-btn">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="theme-toggler">
            <i class="fa-solid fa-sun" id="light-mode-toggle"></i>
            <i class="fa-solid fa-moon" id="dark-mode-toggle"></i>
        </div>
        <div class="profile">
            <div class="info">
                <p>Welcome, <b id="admin-name">
                        <?php
                        if (isset($_SESSION["name"])) {
                            echo $_SESSION["name"];
                        } else {
                            //  if the user is passed thorugh the login authentication, there have to be name varibale in session
                            echo '<script> 
                            alert("Invalid authentication"); 
                            // location.href = "./login.php"; 
                            </script>';
                        }
                        ?>
                    </b></p>
                <small class="text-muted">(Admin)</small>
            </div>
            <div class="profile-photo">
                <img src="../images/User/<?php
                                            if (session_status() == PHP_SESSION_NONE) {
                                                session_start();
                                            }
                                            echo $_SESSION["image"]  ?>" alt="admin.png" id="admin-img">
            </div>
        </div>
    </div>
    <!-- END of Top div  -->

    <!-- START of RECENT UPDATES section  -->
    <section id="recent-update">
        <h2>Recent updates</h2>
        <div class="update-container">
            <?php
            if (!isset($connection)) {
                require "../dao/connection.php";
            }
            $get_recent_received =
                "SELECT `orders`.*, customer.*
            FROM `orders`
            INNER JOIN customer ON `orders`.customer_id = customer.id
            WHERE `orders`.delivery_status = 'RECEIVED'
            ORDER BY `orders`.order_date
            LIMIT 3";

            $stmt = $connection->prepare($get_recent_received);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $row) {
            ?>
                <div class="update">
                    <div class="profile-photo">
                        <img src="../images/User/<?php echo  $row['image'] ?>" alt="<?php echo  $row['image'] ?>">
                    </div>
                    <div class="message">

                        <?php
                        $order_received_date = $row['order_received_date'];

                        $current_time = time();
                        $received_time = strtotime($order_received_date);

                        $time_elapsed = $current_time - $received_time;

                        if ($time_elapsed < 60) {
                            $elapsed_time = $time_elapsed . " minute" . ($time_elapsed > 1 ? "s" : "") . " ago";
                        } elseif ($time_elapsed >= 60 && $time_elapsed < 3600) {
                            $elapsed_minutes = floor($time_elapsed / 60);
                            $elapsed_time = $elapsed_minutes . " minute" . ($elapsed_minutes > 1 ? "s" : "") . " ago";
                        } else {
                            $elapsed_hours = floor($time_elapsed / 3600);
                            $elapsed_time = $elapsed_hours . " hour" . ($elapsed_hours > 1 ? "s" : "") . " ago";
                        }
                        ?>
                        <p><b><?php echo  $row['name'] ?></b> has received the order.</p>
                        <small class="text-muted"><?php echo  $elapsed_time ?></small>
                    </div>
                </div>

            <?php

            }

            ?>

        </div>
    </section>
    <!-- END of RECENT UPDATES section  -->

    <!-- START of the sales analytics section  -->
    <section id="sales-analytics">
        <h2>Sales Analytics</h2>

        <!-- START of the item-online card  -->
        <div class="item-card online-card">
            <div class="icon">
                <i class="fa-brands fa-shopify"></i>
            </div>
            <div class="info">
                <div>
                    <h3>ONLINE ORDERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <h5 class="success">+39%</h5>
                <h3>365,000K ks</h3>
            </div>
        </div>
        <!-- END of the item-online card  -->

        <!-- START of the new customer card  -->
        <div class="item-card new-customer-card">
            <div class="icon">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="info">
                <div>
                    <h3>NEW CUSTOMERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <h5 class="danger">-25%</h5>
                <h3>120 customers</h3>
            </div>
        </div>
        <!-- END of the new customer card  -->

        <!-- START of add new product card  -->
        <a href="./add_product.php">
            <div class="item-card add-product-card">
                <div>
                    <i class="fa-solid fa-plus"></i>
                    <h3>Add Product</h3>
                </div>
            </div>
        </a>
        <!-- END of add new product card  -->


        <!-- START of add new product card  -->
        <button type="button" id="add-category-btn">
            <div class="item-card add-category-card">
                <div>
                    <i class="fa-solid fa-plus"></i>
                    <h3>Add category</h3>
                </div>
            </div>
        </button>
        <!-- END of add new product card  -->
    </section>
    <!-- END of the sales analytics section  -->
</section>
<!-- END of the right-side-panel -->
<div id="overlay"></div>
<div id="add-category-form">

<div id="close-btn-relative">
    <i class="fa-solid fa-circle-xmark" id="close-add-category-form"></i>
        <i class="fa-solid fa-circle-info info-emoji"></i>

</div>
<div>
    <form action="./controller/category_controller.php" method="post">
        <div>
            <label for="new-category">New category Name</label>
            <input type="text" id="new-category" name="category" class="category-category">
        </div>
        <input type="submit" class="information-bg add-category" name="add-category" value="Submit">
    </form>
</div>
</div>
<script>
    $(document).ready(function() {
        // Add category popup
        $("#add-category-btn").click(function() {
            $("#overlay").show();
            $("#add-category-form").show();
        });

        $("#close-add-category-form").click(function() {
            $("#overlay").hide();
            $("#add-category-form").hide();
        })
    });
</script>