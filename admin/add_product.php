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
</head>

<body>
    <div id="main-container">
        <?php
        require "./pages/sidebar.php";
        ?>
        <section class="product-form-section">
            <h2 class="title information">Add product</h2>
            <form class="product-form" action="controller/product_controller.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="name">Enter product name</label>
                    <input type="text" name="name" id="name" required>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="1" value="1" placeholder="in Kyat" required>
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option selected value="summer-clothes">Summer Clothes</option>
                        <option value="rainy clothes">Rainy clothes</option>
                        <option value="winter clothes">Winter clothes</option>
                    </select>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" required>
                    <label for="fileToUpload">Select image to upload:</label>
                    <input type="file" name="image" id="fileToUpload" required>
                    <label for="description">Product Specification: </label>
                    <textarea name="description" id="description" cols="30" rows="10" required></textarea>
                    <div class="button-flex">
                        <input type="reset" value="Cancel" class="cancel-btn danger-border">
                        <input type="submit" value="submit" name="add-product-submit" id="add-product-btn" class="submit-btn success-border">
                    </div>
                </div>
            </form>
        </section>
        <?php
        require "./pages/right-dashboard-panel.php";
        ?>
    </div>
    <script src="./scripts/sidebar.js"></script>
    <script src="./scripts/theme-togggler.js"></script>
    <script>

    </script>
</body>

</html>