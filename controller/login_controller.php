<?php
echo "Outside";
if (isset($_POST["Sign-In"])) {
    $name = $_POST["name"];
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
