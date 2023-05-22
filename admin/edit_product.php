<?php
require "../dao/connection.php";
if (isset($_GET["edit_product_id"])) {
    $id = $_GET["edit_product_id"];
    $get_product_baseID_sql = "SELECT * FROM product WHERE id =  $id";
    $resultSet = $connection->query($get_product_baseID_sql);
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
</head>

<body>
    <div id="main-container">
        <?php
        require "./pages/sidebar.html";
        ?>
        <section class="product-form-section">
            <h2 class="title warning">Update product information</h2>
            <form class="product-form" action="controller/product_controller.php" method="post" enctype="multipart/form-data">
                <div>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <label for="name">Enter product name</label>
                    <input type="text" name="name" id="name" value="<?php echo $data["name"] ?>">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" min="1" value="<?php echo $data["price"] ?>" placeholder="in Kyat">
                    <label for="category">Category:</label>
                    <select id="category" name="category">
                        <option selected value="summer clothes" <?php if ($data["category"] == "summer clothes") echo "selected" ?>>
                            Summer Clothes
                        </option>
                        <option value="rainy clothes" <?php if ($data["category"] == "rainy clothes") echo "selected" ?>>
                            Rainy Clothes
                        </option>
                        <option value="winter clothes" <?php if ($data["category"] == "winter clothes") echo "selected" ?>>
                            Winter Clothes
                        </option>
                    </select>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" value="<?php echo $data["quantity"] ?>">
                    <label for="fileToUpload">Select image to upload:</label>
                    <input type="file" name="image" id="fileToUpload">
                    <label for="description">Product Specification: </label>
                    <textarea name="description" id="description" cols="30" rows="10"><?php echo $data["description"] ?></textarea>
                    <div class="button-flex">
                        <input type="reset" value="Cancel" class="cancel-btn danger-border">
                        <input type="submit" value="update" name="update-product-submit" id="update-product-btn" class="submit-btn success-border">
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