<?php
if (!isset($_SESSION)) {
    session_start();
}

require "../dao/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./components/base-link.php" ?>
    <link rel="stylesheet" href="css/cart-list-tbl.css">
    <link rel="stylesheet" href="css/check-out.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/newsletter.css">
    <link rel="stylesheet" href="css/star-scale-rating.css">
    <link rel="stylesheet" href="css/product-section.css">
</head>

<body>
    <?php
    define('COMPONENTS_PATH', './pages/');
    require COMPONENTS_PATH . 'navbar.php';
    require COMPONENTS_PATH . 'cart-list-tbl.php';
    require COMPONENTS_PATH . 'swiper.html';
    if (isset($_SESSION['name'])) {
        require './checkout.php';
    }
    require COMPONENTS_PATH . 'newsletter.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>

    <script src="scripts/navbar.js"> </script>
    <script src="scripts/cart-list-tbl.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
    <script src="scripts/footer.js"></script>
</body>

</html>