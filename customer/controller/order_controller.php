<?php
require "../../dao/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_GET["checkout_order_id"]) && isset($_SESSION["cart"])) {
    // foreach ($_SESSION["cart"] as $key => $value) {

    //     $order_id = $_SESSION["id"];


    //     $image_name = $_SESSION["image"];
    //     $category = $_SESSION["category"];
    //     $price = $_SESSION["price"];

    //     $customer_id =  $_SESSION["customer_id"];
    //     $total_cost = $_SESSION["total_cost"];
    // }
?>
    <script>
        alert("Check out");
        location.href = "../pages/invoice.php"
    </script>
<?php
}
?>