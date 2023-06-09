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
    $searchQuery = " AND (order_id LIKE '%" . $searchValue . "%' OR 
        customer_name LIKE '%" . $searchValue . "%' OR 
        order_date LIKE '%" . $searchValue . "%' OR
        ship_address LIKE '%" . $searchValue . "%' OR
        total_price LIKE '%" . $searchValue . "%' OR
        order_approval LIKE '%" . $searchValue . "%' OR
        delivery_status LIKE '%" . $searchValue . "%')";
}

## Total number of records without filtering
$stmt = $connection->query("SELECT COUNT(*) AS allcount FROM orders");
$records = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $connection->query("SELECT COUNT(*) AS allcount FROM orders WHERE 1" . $searchQuery);
$records = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT * FROM orders WHERE 1" . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage;
$stmt = $connection->query($empQuery);
$data = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array(
        "order_id" => $row['order_id'],
        "customer_name" => $row['customer_name'],
        "order_date" => $row['order_date'],
        "ship_address" => $row['ship_address'],
        "total_price" => $row['total_price'],
        "order_approval" => $row['order_approval'],
        "delivery_status" => $row['delivery_status']
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

