<?php
if (isset($_POST["add-to-cart"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $image_name = $_POST["image"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    if (!isset($_SESSION["cart"])) {
        // New session and new product
        $_SESSION["cart"][0] = array(
            array(
                "id" => $id,
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

        if (!in_array($id, $ids)) {
            // New product
            $count = count($_SESSION["cart"]);
            $_SESSION["cart"][$count] = array(
                "id" => $id,
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
                if ($id === $value["id"]) {
                    $_SESSION("cart")[$key]["Quantity"]++;
                    break;
                }
            }
        }
    }
}
