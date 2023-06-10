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

        $page_num = 1;
        $item_per_page = 10;

        if (isset($_REQUEST["page-num"])) {
            $page_num = $_REQUEST["page-num"];
        }
        $offset = ($page_num - 1) * $item_per_page;
        $get_item_per_page = "SELECT * FROM product ORDER BY id LIMIT $offset, $item_per_page";
        $dataset = $connection->query($get_item_per_page);
        include COMPONENTS_PATH . 'product-section.php';
        ?>

        <dvi id="pagination">
            <li class="page-item previous-page">
                <a href="shop-page.php?page-num=<?php echo ($page_num - 1) ?>#main-container" class="page-link">Prev</a>
            </li>
            <?php
            $i = 1;

            $countQuery = "SELECT COUNT(*) as total FROM product";
            $countStmt = $connection->query($countQuery);
            $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
            $totalItems = $countResult['total'];

            $page_count = ceil($totalItems / $item_per_page);
            echo "<script> console.log('$page_count '); </script>";
            while ($i <= $page_count) {
            ?>

                <?php
                if ($i == $page_num) {
                ?>
                    <li class="page-item current-page active">
                        <a href="shop-page.php?page-num=<?php echo $i ?>#main-container" class="page-link">
                            <?php echo $i  ?>
                        </a>
                    </li>
                <?php
                    $i++;
                    continue;
                }
                ?>
                <li class="page-item current-page">
                    <a href="shop-page.php?page-num=<?php echo $i ?>#main-container" class="page-link">
                        <?php echo $i  ?>
                    </a>
                </li>

            <?php
                $i++;
            }
            ?>

            <li class="page-item next-page">
                <a href="shop-page.php?page-num=<?php echo ($page_num + 1) ?>#main-container" class="page-link">Next</a>
            </li>
        </dvi>

        <?php
        include COMPONENTS_PATH . 'cart-list.php';
        require COMPONENTS_PATH . 'collection-banner.php';
        require COMPONENTS_PATH . 'swiper.html';
        require COMPONENTS_PATH . 'footer.html';
        ?>
    </div>
    <script src="scripts/navbar.js"> </script>
    <script src="scripts/search-bar.js"></script>
    <script src="scripts/pagination.js"></script>
    <script src="scripts/redirect.js"> </script>
    <script src="scripts/footer.js"></script>
    <script src="scripts/star-scale-rating.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="scripts/swiper.js"> </script>
</body>

</html>