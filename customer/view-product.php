<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/navbar.css">

    <link rel="stylesheet" href="css/search-bar.css" />
    <link rel="stylesheet" href="css/shop-banner.css">
    <link rel="stylesheet" href="css/product-section.css">
    <link rel="stylesheet" href="css/quantity-counter.css">
    <link rel="stylesheet" href="css/cart-list.css">
    <link rel="stylesheet" href="css/product-slider.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/social-icon.css" />

    <link rel="stylesheet" href="css/star-scale-rating.css">
    <link rel="stylesheet" href="css/quantity-counter.css">
    <link rel="stylesheet" href="css/product-detail.css">
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.php';
    require COMPONENTS_PATH . 'search-bar.php';
    require COMPONENTS_PATH . 'product-detail.php';
    require COMPONENTS_PATH . 'cart-list.php';
    require COMPONENTS_PATH . 'product-slider.php';
    require COMPONENTS_PATH . 'shop-banner.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>

    <script src="scripts/navbar.js"> </script>
    <script src="scripts/search-bar.js"></script>
    <script src="scripts/view-product.js"></script>
    <script src="scripts/quantity-counter.js"> </script>
    <script src="scripts/cart-list.js"></script>
    <script src="scripts/star-scale-rating.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
    <script src="scripts/product-slider.js"> </script>
    <script src="scripts/footer.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="scripts/trend-product-swiper.js"></script>
</body>

</html>