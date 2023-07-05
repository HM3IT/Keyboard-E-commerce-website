<?php
require "../../dao/connection.php";

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows displayed per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search 
$searchQuery = "";
if ($searchValue != '') {
    $searchQuery = " AND (orders.id LIKE '%" . $searchValue . "%' OR 
        customer.name LIKE '%" . $searchValue . "%' OR 
        orders.order_date LIKE '%" . $searchValue . "%' OR
        orders.ship_address LIKE '%" . $searchValue . "%' OR
        orders.total_price LIKE '%" . $searchValue . "%' OR
        orders.order_approval LIKE '%" . $searchValue . "%' OR
        orders.delivery_status LIKE '%" . $searchValue . "%')";
}

## Total number of records without filtering
$stmt1 = $connection->prepare("SELECT COUNT(*) AS allcount FROM orders");
$stmt1->execute();
$totalRecords = $stmt1->fetchColumn();

## Total number of records with filtering
$stmt2 = $connection->prepare("SELECT COUNT(*) AS allcount FROM orders INNER JOIN customer ON orders.customer_id = customer.id WHERE 1" . $searchQuery);
$stmt2->execute();
$totalRecordwithFilter = $stmt2->fetchColumn();

## Fetch records

$stmt3 = $connection->prepare("SELECT orders.id AS order_id, orders.*, customer.name AS customer_name FROM orders INNER JOIN customer ON orders.customer_id = customer.id WHERE 1" . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage);
$stmt3->execute();
$data = array();
while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
    $order_date = $row['order_date'];
    $formatted_date = date('Y-m-d h:i A', strtotime($order_date));
    $data[] = array(
        "order_id" => $row['order_id'],
        "customer_name" => $row['customer_name'],
        "order_date" => $formatted_date,
        "ship_address" => $row['ship_address'],
        "total_price" => $row['total_price'],
        "payment"=> $row["payment_method"],
        "order_approval" => '
            <select name="order_approval" class="order-approval">
                <option value="NO"' . ($row['order_approval'] === "NO" ? ' selected' : '') . '>No</option>
                <option value="YES"' . ($row['order_approval'] === "YES" ? ' selected' : '') . '>Yes</option>
            </select>',
        "delivery_status" => '
            <select name="delivery_status" class="delivery-status">
                <option value="PENDING"' . ($row['delivery_status'] === "PENDING" ? ' selected' : '') . '>Pending</option>
                <option value="RECEIVED"' . ($row['delivery_status'] === "RECEIVED" ? ' selected' : '') . '>Received</option>
            </select>',
        "action" => '
            <a href="./view_order.php?view_order_id=' . $row['order_id'] . '" class="view-btn information-border">View Details</a>
            <button type="button" onclick="confirmChanges(event, ' . $row['order_id'] . ')" class="update-status-btn warning-border">Update status</button>'
    );
}


## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
