<?php
if (isset($_GET["view-product-id"])) {
    $product_id = $_GET["view-product-id"];
    $_SESSION["current-view-product"] = $product_id;
} else {
    $product_id = $_SESSION["current-view-product"];
}
$get_product_query = "SELECT * FROM product WHERE id = $product_id";
$product_result = $connection->query($get_product_query);
$view_product = $product_result->fetch();

$id = $view_product['id'];
$name = $view_product['name'];
$price = $view_product['price'];
$quantity = $view_product['quantity'];
$description = $view_product['description'];

$category_id =  $view_product["category_id"];
$get_category_sql = "SELECT * FROM category WHERE id=$category_id";
$category_dataset = $connection->query($get_category_sql);
$category_row = $category_dataset->fetch();
$category = $category_row["category_name"];


$get_product_images_qry = "SELECT * FROM images WHERE product_id = $id";
$img_dataset = $connection->query($get_product_images_qry);
$img_row = $img_dataset->fetch();
?>
<section class="view-product-section" id="product-section-anchor">
    <div class="view-product-box">
        <div class="image-section">
            <div id="main-img">
                <?php
                if ($view_product["quantity"]  > 0) {
                ?>
                    <span class="stock-info in-stock"> In Stock</span>
                <?php
                } else {
                ?>
                    <span class="stock-info out-stock"> Out of Stock</span>
                <?php
                }
                ?>
                <img src="../images/Products/<?php echo $category . "/" . $img_row["primary_img"] ?>" alt="<?php echo $img_row["primary_img"] ?>">
            </div>
            <div class="small-img-group">
                <?php
                $add_img_num = 1;
                $additional_img_limit = 4;
                for ($i = 1; $i <= $additional_img_limit; $i++) {
                    if (!empty($img_row["additional_image" . $i])) {
                ?>
                        <img src="../images/Products/<?php echo $category . "/" . $img_row["additional_image" . $i] ?>" alt="<?php echo $img_row["additional_image". $i] ?>">
                <?php
                    }
                    $add_img_num++;
                }
                ?>
            </div>
        </div>
        <div class="product-description">
            <div class="product-description-head">
                <h2 class="product-title "><?php echo $name ?></h2>
                <h2 class="product-price "><?php echo $price ?> Ks</h2>
                <label for="Switch-color">Select Switch</label>
                <select name="switch-color" id="switch-color">
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                    <option value="white">White</option>
                </select>
                <?php
                if ($view_product["quantity"] > 0) {
                ?>

                    <form action="./controller/cart_controller.php" method="POST" class="add-cart-form">
                        <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">
                        <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
                        <input type="hidden" name="image" id="image" value="<?php echo $image ?>">
                        <input type="hidden" name="category" id="category" value="<?php echo $category ?>">
                        <input type="hidden" name="price" id="price" value="<?php echo $price ?>">
                        <input type="hidden" name="description" id="description" value="<?php echo $description ?>">
                        <input type="hidden" name="current_page" class="current_page">

                        <!-- <a href="./controllercart_controller.php/add_to_cart" class="add-to-cart-btn">
                            Add to Cart
                        </a> -->
                        <input type="submit" value="add to cart" name="add_to_cart" class="add-to-cart-btn">
                    </form>
                <?php
                }
                ?>
                <?php require "./components/star-scale-rating.html";
                ?>
            </div>
            <div class="product-description-body">
                <h2 class="product-detail">Product Details</h2>
                <p>
                    <?php echo $description ?>
                </p>
            </div>
        </div>
    </div>

</section>