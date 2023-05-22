<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce_website";
try {
    $connection = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo  "
    <style>
     alert('Connection fail');
     location.href = './customer/index.php'; 
    </style>";
}
