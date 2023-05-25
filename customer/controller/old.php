<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION["cart"])) {

}
if (isset($_POST["add-to-cart"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $image_name = $_POST["image"];
    $category = $_POST["category"];
    $price = $_POST["price"];

    // session cart is not created
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"][0] = array(
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "category" => $category,
            "image" => $image_name,
            "Quantity" => 1
        );
        echo "<script>
        alert('new session');
        location.href = '../test.php'; 
        </script>";
    } else {
        echo "<script>
         alert('old session');
         </script>";

        $ids = array_column($_SESSION["cart"], "id");

        if (!in_array($id, $ids)) {
            // new product
            echo "<script>
            alert('new product');
            </script>";

            $count = count($_SESSION["cart"]);
            $_SESSION["cart"][$count] = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "category" => $category,
                "image" => $image_name,
                "Quantity" => 1
            );

            echo "<script>
            location.href = '../test.php'; 
            </script>";
        } else {
            // old product 
            echo "<script>
            alert('new product');
            location.href = '../test.php'; 
            </script>";
            foreach ($_SESSION["cart"] as $key => $value) {
                if ($id === $value["id"]) {
                    $_SESSION("cart")[$key]["Quantity"]++;
                }
            }
        }
    }
}
