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
$category = $view_product['category'];
$image = $view_product['image'];
$price = $view_product['price'];
$quantity = $view_product['quantity'];
$description = $view_product['description'];

$get_related_product_imgs_query = "SELECT image, category FROM product WHERE category = '{$category}' LIMIT 4";
$related_product_imgs = $connection->query($get_related_product_imgs_query);

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
                <img src="../images/Products/<?php echo $category . "/" . $image ?>" alt="<?php echo $image ?>">
            </div>
            <div class="small-img-group">
                <?php
                foreach ($related_product_imgs as $data) {
                ?>
                    <img src="../images/Products/<?php echo $data['category'] . "/" . $data['image'] ?>" alt="<?php echo $data['image'] ?>">
                <?php
                }
                ?>
            </div>
        </div>
        <div class="product-description">
            <div class="product-description-head">
                <h2 class="product-title "><?php echo $name ?></h2>
                <h2 class="product-price "><?php echo $price ?> Ks</h2>
                <select name="" id="">
                    <option value="">Select Size</option>
                    <option value="">XL</option>
                    <option value="">XXL</option>
                    <option value="">Smal</option>
                    <option value="">Large</option>
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