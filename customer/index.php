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
    <title>HM3</title>
    <?php require "./components/base-link.php" ?>

    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/collection-banner.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/feature-section.css">
    <link rel="stylesheet" href="css/newsletter.css">
    <link rel="stylesheet" href="css/star-scale-rating.css">
    <link rel="stylesheet" href="css/product-section.css">
    <link rel="stylesheet" href="css/product-slider.css">
    <link rel="stylesheet" href="css/alert-box.css" />
    <Style>
        #product-slider-section{
            display: none;
        }
        @media screen and (max-width: 780px) {
        .product-container{
            display: none;
        }
       .feature-section{
        display: none;
       }
        #product-slider-section{
            display: block;
        }
        .product-section h2,
        .product-section p{
            display: none;
        }
    }
    </Style>
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.php';
    require COMPONENTS_PATH . 'hero.html';
    require COMPONENTS_PATH . 'collection-banner.php';
    require COMPONENTS_PATH . 'swiper.html';
    require COMPONENTS_PATH . 'feature-section.html';

    $get_all_product_sql = "SELECT * FROM product";
    $dataset = $connection->query($get_all_product_sql);

    require COMPONENTS_PATH . 'product-section.php';
    require COMPONENTS_PATH . 'product-slider.php';
    require 'components/alert-box.php';
    require COMPONENTS_PATH . 'cart-list.php';
    require COMPONENTS_PATH . 'newsletter.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>

    <script src="scripts/navbar.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
</body>

</html>