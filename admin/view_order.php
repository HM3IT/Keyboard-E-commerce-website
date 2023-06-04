<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION["status"])) {
    echo '
    <script> 
        alert("Please confirm the user authentication"); 
        location.href = "./login.php"; 
    </script>';
}
require "../dao/connection.php";
if (isset($_GET["view_customer_id"])) {
    $id = $_GET["view_customer_id"];
    $get_user_baseID_sql = "SELECT * FROM user WHERE id =  $id";
    $resultSet = $connection->query($get_user_baseID_sql);
    $data = $resultSet->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/sidebar.css" />
    <link rel="stylesheet" href="./css/right-dashboard-panel.css" />
    <link rel="stylesheet" href="./css/product_form.css">
    <link rel="stylesheet" href="./css/customer-detail-form.css">
</head>

<body>
    <div id="main-container">
        <?php
        require "./pages/sidebar.php";
        require "./pages/customer-detail-form.php";
        require "./pages/right-dashboard-panel.php";
        ?>
    </div>
    <script src="./scripts/sidebar.js"></script>
    <script src="./scripts/theme-togggler.js"></script>
    <script>

    </script>
</body>

</html>