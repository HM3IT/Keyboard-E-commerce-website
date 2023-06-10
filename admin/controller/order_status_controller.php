<?php
require "../../dao/connection.php";
if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestPayload = file_get_contents('php://input');
    $payload = json_decode($requestPayload, true);
    $order_id = $payload['order_id'];
    $order_approval = $payload['order_approval'];
    $delivery_status = $payload['delivery_status'];



    $update_product_status_qry = "UPDATE orders SET delivery_status = :delivery_status, order_approval = :order_approval WHERE id = :order_id";

    $stmt = $connection->prepare($update_product_status_qry);
    $stmt->bindParam(':delivery_status', $delivery_status);
    $stmt->bindParam(':order_approval', $order_approval);
    $stmt->bindParam(':order_id', $order_id);
    $stmt->execute();
    $response = array('message' => 'Status updated successfully');
    echo json_encode($response);
}
?>