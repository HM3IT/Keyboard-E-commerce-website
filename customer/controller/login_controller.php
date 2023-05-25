<?php
require "../../dao/connection.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// if (isset($_SESSION["cart"])) {
//     foreach ($_SESSION["cart"] as $key => $value) {
//         // Remove the product from the session
//         unset($_SESSION["cart"][$key]);
//     }
// }

if (isset($_POST["Sign-Up"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];



    $create_new_user = "INSERT INTO user (
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
        $_SESSION["password"] = $password;

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

    $get_all_user_qry = "SELECT * from user";
    $dataset =  $connection->query($get_all_user_qry);

    foreach ($dataset as $data) {
        if ($data["name"] === $name && $data["password"] === $password) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;

            echo '<script> 
            alert("valid user"); 
            location.href = "../index.php"; 
            </script>';
        }
    }

    echo '<script>  
        alert("Invalid user");
        location.href = "../login.php"; 
        </script>';
}

if (isset($_GET["logout"])) {
    // Clear all session variables & destroy the session
    session_unset();
    session_destroy();

    header("Location: ../login.php");
    exit();
}
