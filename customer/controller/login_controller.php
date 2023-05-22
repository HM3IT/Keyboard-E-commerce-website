<?php
require "../../dao/connection.php";

if (isset($_POST["Sign-Up"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

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
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($name === "admin" && $password === "1234") {
        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;

        // User is logged in
        $linkText = 'Logout';
        $linkURL = 'logout.php';

        echo '<script> 
        alert("valid user"); 
        location.href = "../index.php"; 
        </script>';
    } else {
        // User is not logged in
        $linkText = 'Login';
        $linkURL = 'login.php';
        echo '<script>  
        alert("Invalid user");
        location.href = "../login.php"; 
        </script>';
        // header("location:login.php");
    }
}
