<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=!, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/base.css" />
    <link rel="stylesheet" href="./css/sidebar.css" />
    <link rel="stylesheet" href="./css/right-dashboard-panel.css" />
    <link rel="stylesheet" href="./css/all_customer_tbl.css" />

</head>

<body>
    <div id="main-container">
        <?php
        require "./pages/sidebar.html";
        require "./pages/all_customer_tbl.php";
        require "./pages/right-dashboard-panel.php";
        ?>
        <div></div>

    </div>
    <script src="./scripts/sidebar.js"></script>
    <script src="./scripts/theme-togggler.js"></script>
</body>


</html>