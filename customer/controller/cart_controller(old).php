<?php
require "../../dao/connection.php";
// Set session cookie parameters
session_set_cookie_params(0);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["add_product_id"])) {

    $productID = $_POST['product_id'];

    $product_get_qry_baseID = "SELECT * FROM product WHERE id =  $productID  ";

    $dataset =   $connection->query($product_get_qry_baseID);
    $data = $dataset->fetch();

    $name = $data["name"];
    $image_name = $data["image"];
    $description = $data["description"];
    $category = $data["category"];
    $price = $data["price"];

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

    // Return a JSON response indicating success or any additional information
    $response = array('success' => true, 'message' => 'Product added to cart successfully');

    // Set the content type header to JSON
    header('Content-Type: application/json');

    // Output the JSON response
    echo json_encode($response);
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
