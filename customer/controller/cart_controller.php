<?php
require "../../dao/connection.php";
// Set session cookie parameters
session_set_cookie_params(0);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["add_to_cart"])) {

    $productID = $_POST['id'];
    $name = $_POST["name"];
    $image_name = $_POST["image"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $description = $_POST["description"];


    if (!isset($_SESSION["cart"])) {
        // New session and new product
        $_SESSION["cart"][0] = array(
            array(
                "id" => $productID,
                "name" => $name,
                "price" => $price,
                "category" => $category,
                "description" => $description,
                "image" => $image_name,
                "Quantity" => 1
            )
        );
    } else {
        $ids = array_column($_SESSION["cart"], "id");

        if (!in_array($productID, $ids)) {
            // New product
            $count = count($_SESSION["cart"]);
            $_SESSION["cart"][$count] = array(
                "id" => $productID,
                "name" => $name,
                "price" => $price,
                "category" => $category,
                "description" => $description,
                "image" => $image_name,
                "Quantity" => 1
            );
        } else {
            // Existing product
            foreach ($_SESSION["cart"] as $key => $value) {
                if ($productID == $value["id"]) {
                    echo $_SESSION["cart"][$key]["Quantity"];
                    $_SESSION["cart"][$key]["Quantity"]++;
                    break;
                }
            }
        }
    }

    echo ' <script>

    document.getElementById("popup-info-box").style.display = "block";

    // Hiding the popup box after 2.5 seconds
    setTimeout(function () {
      document.getElementById("popup-info-box").style.display = "none";
    }, 2500);
    </script>';
}


if (isset($_POST["remove_product_id"])) {
    $productID = $_POST["remove_product_id"];
    foreach ($_SESSION["cart"] as $key => $value) {
        if ($productID == $value["id"]) {
            // Remove the product from the session
            unset($_SESSION["cart"][$key]);
            break;
        }
    }
}
