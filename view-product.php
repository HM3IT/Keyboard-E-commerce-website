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

    <!-- Meta Pixel Code -->
    <!-- <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '821648156053878');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=821648156053878&ev=PageView&noscript=1" /></noscript> -->
    <!-- End Meta Pixel Code -->
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