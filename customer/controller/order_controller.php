<?php
require "../../dao/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["cart"])) {

    if (!isset($_SESSION["name"])) {
        echo '
        <script>
         alert("Please login first");
         location.href = "../login.php";
        </script>
        ';
    }
    $street = $_POST["street"];
    $township = $_POST["township"];
    $city = $_POST["city"];
    $total_price = $_SESSION["total_cost"];
    $customer_id =  $_SESSION["login_customer_id"];
    $today = date('y-m-d');
    $ship_address = $street . ", " . $township . ", " . $city;
    $zipcode =  $_SESSION["zipcode"];
    $_SESSION["ship_address"] = $ship_address;

    $additional_request = "";
    if (!empty($_POST["add-req"])) {
        $additional_request = $_POST["add-req"];
    }

    $payment_method = $_POST["payment"];
    $transaction_img = "";
    if ($payment_method !== "Cash on delivery") {
        $image_file_name = $_FILES["transaction-img"]["name"];
        $image_file_size = $_FILES["transaction-img"]["size"];
        $image_file_tmp =  $_FILES["transaction-img"]["tmp_name"];
        $image_file_type = $_FILES["transaction-img"]["type"];

        $transaction_img = $image_file_name;

        $file_extension = strtolower(pathinfo($image_file_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $valid_file_extensions)) {

            echo "<script> 
            alert('The image file " . $file_extension . " extension is not supported');
            location.href = '../checkout.php'; 
            </script>";
            return;
        }
        // allowed up to 3MB 
        if ($image_file_size >= 1024 * 1024 * 3) {

            echo "<script> 
                    alert('The image file size is too big');
                     location.href = '../checkout.php'; 
                    </script>";
            return;
        }
        // path: uploaded image files 
        $target_img_dir = "../../images/Pay/transaction_slips/";
        $target_file = $target_img_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($image_file_tmp, $target_file)) {
        } else {
            echo "Target folder (image holder) is not found";
        }
    }

    $insert_order_qry = "INSERT INTO orders (order_date, total_price, customer_id, ship_address,additional_request,payment_method,transaction_slip) VALUES(?,?,?,?,?,?,?)";
    $statement1 = $connection->prepare($insert_order_qry);
    $statement1->execute(array($today, $total_price, $customer_id, $ship_address, $additional_request, $payment_method, $transaction_img));

    $order_id = $connection->lastInsertId();

    $insert_order_product_qry = "INSERT INTO order_product (order_id, product_id,num_ordered,quoted_price) VALUES (?,?,?,?)";
    $statement2 = $connection->prepare($insert_order_product_qry);

    foreach ($_SESSION['cart'] as $key => $value) {
        $quantity = $value["Quantity"];
        $quoted_price = $value["price"] *  $quantity;
        $statement2->execute(array($order_id,  $value["id"], $quantity, $quoted_price));
    }
    exit;
}
