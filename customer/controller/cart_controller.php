<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST["add_to_cart"])) {

    $productID = $_POST['id'];
    $name = $_POST["name"];
    $image_name = $_POST["primary_img"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $description = $_POST["description"];
 

    if (!isset($_SESSION["cart"])) {
        // New session and new product
        $_SESSION["cart"][0] = array(
            "id" => $productID,
            "name" => $name,
            "price" => $price,
            "category" => $category,
            "description" => $description,
            "image" => $image_name,
            "Quantity" => 1

        );
    } else {
        $isExistingProduct = false;

        foreach ($_SESSION["cart"] as $key => $value) {
            if ($productID == $value["id"]) {
                $isExistingProduct = true;
                $_SESSION["cart"][$key]["Quantity"]++;
                break;
            }
        }

        if (!$isExistingProduct) {
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
        }
    }

    $target_page = $_POST["current_page"];
    $redirectUrl = "../" . $target_page . "#product-section-anchor";
    header("Location: " . $redirectUrl);
    exit;
}

// remove product form the cart
if (isset($_POST["remove_product_id"])) {

    $productID = $_POST["remove_product_id"];

    foreach ($_SESSION["cart"] as $key => $data) {

        if ($data["id"]  == $productID) {
            unset($_SESSION["cart"][$key]);
            break;
        }
    }
    $response = array('success' => true, 'message' => $productID . "count = " . count($_SESSION["cart"]));
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}


// update-quantity based on the quantity from the cart-list
// Read the raw POST data and decode it into a PHP array

$rawData = file_get_contents('php://input');
$decodedData = json_decode($rawData, true);

if (isset($decodedData)) {
    $updatedProductAry = $decodedData;

    foreach ($updatedProductAry as $productData) {
        $productIndex = $productData['productIndex'];
        $quantity = $productData['quantity'];
        // Update the corresponding product quantity in the session
        $_SESSION['cart'][$productIndex]["Quantity"] = $quantity;
    }
  
    $response = array(
        'success' => true,
        'message' => 'Quantity updated successfully',
        'data' => '$updatedProductAry'
    );

    header('Content-Type: application/json');
    echo json_encode($response);
    
}
