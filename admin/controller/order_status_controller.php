<?php
require "../../dao/connection.php";
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $order_id = $_POST["order_id"];
    $delivery_status = $_POST["delivery_status"];
    $order_approval = $_POST["order_approval"];

    echo $order_id;
    echo $delivery_status;
    echo $order_approval;


    $update_product_status_qry = "UPDATE orders SET delivery_status = :delivery_status, order_approval = :order_approval WHERE id = :order_id";

    $stmt = $connection->prepare($update_product_status_qry);
    $stmt->bindParam(':delivery_status', $delivery_status);
    $stmt->bindParam(':order_approval', $order_approval);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
}
