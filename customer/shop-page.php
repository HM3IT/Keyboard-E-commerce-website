<?php
require "../dao/connection.php";
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./components/base-link.php" ?>
    <link rel="stylesheet" href="css/shop-page.css">
    <link rel="stylesheet" href="css/search-bar.css" />
    <link rel="stylesheet" href="css/collection-banner.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/product-section.css">
    <link rel="stylesheet" href="css/star-scale-rating.css">
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');
    ?>
    <div id="main-container">

        <?php
        require COMPONENTS_PATH . 'navbar.php';
        require COMPONENTS_PATH . 'search-bar.php';
        $get_all_product_sql = "SELECT * FROM product";
        $dataset = $connection->query($get_all_product_sql);
        include COMPONENTS_PATH . 'product-section.php';
        include COMPONENTS_PATH . 'cart-list.php';
        require COMPONENTS_PATH . 'collection-banner.php';
        require COMPONENTS_PATH . 'swiper.html';
        require COMPONENTS_PATH . 'footer.html';
        ?>
    </div>
    <script src="scripts/navbar.js"> </script>
    <script src="scripts/search-bar.js"></script>
    <script src="scripts/redirect.js"> </script>
    <script src="scripts/footer.js"></script>
    <script src="scripts/star-scale-rating.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
</body>

</html>