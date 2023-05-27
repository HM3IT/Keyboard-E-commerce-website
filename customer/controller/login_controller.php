<?php
require "../../dao/connection.php";
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        // Remove the product from the session
        unset($_SESSION["cart"][$key]);
    }
}

if (session_status() == PHP_SESSION_NONE) {
    session_set_cookie_params(0);
    session_start();
}

if (isset($_POST["Sign-Up"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $create_new_user = "INSERT INTO customer (
        image,
        name,
        phone,
        email,
        password  
    )
VALUES (
    'default-user-img.jpg',
        '$name',
        '$phone',
        '$email',
        '$password'
    );";
    if ($connection->query($create_new_user)) {


        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        // $_SESSION["password"] = $password;

        echo '<script> 
        alert("Account is successfully created"); 
        location.href = "../index.php"; 
        </script>';
    } else {
        echo '<script> 
        alert("Account is failed to creat"); 
        location.href = "../index.php"; 
        </script>';
    }
}

if (isset($_POST["Sign-In"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];

    $get_all_user_qry = "SELECT * from customer";
    $dataset = $connection->query($get_all_user_qry);

    foreach ($dataset as $data) {
        if ($data["name"] === $name && $data["password"] === $password) {
            $_SESSION["customer_id"] = $data["id"];
            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;
            $_SESSION["status-login"] = "valid";
            header("Location: ../login.php");
            exit;
        }
    }

    $_SESSION["status-login"] = "invalid";
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["logout"])) {
    // Clear all session variables & destroy the session
    $_SESSION = array();
    session_destroy();
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
    header("Pragma: no-cache"); // HTTP 1.0
    header("Expires: 0"); // Proxies
    header("Location: ../login.php");
    exit();
}
