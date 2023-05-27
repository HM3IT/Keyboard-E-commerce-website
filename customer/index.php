<?php
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
    <link rel="stylesheet" href="css/hero.css">
    <link rel="stylesheet" href="css/shop-banner.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/feature-section.css">
    <link rel="stylesheet" href="css/newsletter.css">
    <link rel="stylesheet" href="css/star-scale-rating.css">
    <link rel="stylesheet" href="css/product-section.css">
 
    <!-- Meta Pixel Code -->
    <script>
        //     ! function(f, b, e, v, n, t, s) {
        //         if (f.fbq) return;
        //         n = f.fbq = function() {
        //             n.callMethod ?
        //                 n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        //         };
        //         if (!f._fbq) f._fbq = n;
        //         n.push = n;
        //         n.loaded = !0;
        //         n.version = '2.0';
        //         n.queue = [];
        //         t = b.createElement(e);
        //         t.async = !0;
        //         t.src = v;
        //         s = b.getElementsByTagName(e)[0];
        //         s.parentNode.insertBefore(t, s)
        //     }(window, document, 'script',
        //         'https://connect.facebook.net/en_US/fbevents.js');
        //     fbq('init', '821648156053878');
        //     fbq('track', 'PageView');
        // 
    </script>
    <!-- <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=821648156053878&ev=PageView&noscript=1" /></noscript> -->
    <!-- End Meta Pixel Code -->
</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.php';
    require COMPONENTS_PATH . 'hero.html';
    require COMPONENTS_PATH . 'shop-banner.html';
    require COMPONENTS_PATH . 'swiper.html';
    require COMPONENTS_PATH . 'feature-section.html';
    require COMPONENTS_PATH . 'product-section.php';
    require COMPONENTS_PATH . 'cart-list.php';
    require COMPONENTS_PATH . 'newsletter.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>

    <script src="scripts/navbar.js"> </script>
    <script src="scripts/cart-list.js"></script>
    <script src="scripts/star-scale-rating.js"> </script>

    <script src="scripts/footer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
</body>

</html>