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
            $update_noti_count = 3;
            $temp_ID = 1;
            for ($i = 0; $i <  $update_noti_count; $i++, $temp_ID++) {
            ?>
                <div class="update">
                    <div class="profile-photo">
                        <img src="../images/User/UID-10<?php echo  $temp_ID ?>.jpg" alt="">
                    </div>
                    <div class="message">
                        <p><b>Kaung Sett</b> received the order.</p>
                        <small class="text-muted">2 minute ago</small>
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

    </section>
    <!-- END of the sales analytics section  -->
</section>
<!-- END of the right-side-panel -->