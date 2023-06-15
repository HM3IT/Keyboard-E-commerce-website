<?php
require "../../dao/connection.php";

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
    $searchQuery = " AND (name LIKE '%" . $searchValue . "%' OR 
        phone LIKE '%" . $searchValue . "%' OR 
        email LIKE '%" . $searchValue . "%')";
}

## Total number of records without filtering
$stmt = $connection->query("SELECT COUNT(*) AS allcount FROM customer");
$records = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $connection->query("SELECT COUNT(*) AS allcount FROM customer WHERE 1" . $searchQuery);
$records = $stmt->fetch(PDO::FETCH_ASSOC);
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$empQuery = "SELECT * FROM customer WHERE 1" . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT " . $row . "," . $rowperpage;
$stmt = $connection->query($empQuery);
$data = array();

$serial = $row + 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array(
        "image" =>

        '<img src="../images/User/' . $row['image'] . '" alt="photo" class="customer-tbl-img">',
        "name" => $row['name'],
        "phone" => $row['phone'],
        "email" => $row['email'],
        "action" => '<a href="./view_customer.php?view_customer_id=' . $row['id'] . '" class="view-btn information-border">View</a> <a href="./controller/customer_controller.php?remove_customer_id=' . $row['id'] . '" class="remove-btn danger-border">Remove</a>'
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
