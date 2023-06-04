<section class="product-section" id="product-section-anchor">
  <h2>Trending Products</h2>
  <p>Summer Collection New Morden Design</p>

  <div class="product-container">
    <?php
    $serial = 1;
    $get_all_product_sql = "SELECT * FROM product";
    foreach ($connection->query($get_all_product_sql) as $row) {
      $id = $row["id"];
      $name =  $row["name"];

      $get_product_images_qry = "SELECT * FROM images WHERE product_id = $id";
      $image_dataset = $connection->query($get_product_images_qry);
      $images = $image_dataset->fetch();
      $primary_image = $images["primary_img"];
      $category_id =  $row["category_id"];

      $get_category_sql = "SELECT * FROM category WHERE id=$category_id";
      $dataset = $connection->query($get_category_sql);
      $data = $dataset->fetch();

      $category = $data["category_name"];
      $price = $row["price"];
      $description =  $row["description"];
    ?>
      <div class="product-card">
        <form action="./controller/cart_controller.php" method="POST" class="cart-form">
          <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">
          <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
          <input type="hidden" name="primary_img" id="image" value="<?php echo $primary_image ?>">
          <input type="hidden" name="category" id="category" value="<?php echo $category ?>">
          <input type="hidden" name="price" id="price" value="<?php echo $price ?>">
          <input type="hidden" name="description" id="description" value="<?php echo $description ?>">
          <input type="hidden" name="current_page" class="current_page">

          <img src="../images/Products/<?php echo $category . '/' . $primary_image ?>" alt="<?php echo  $image ?>" />
          <?php require "./components/star-scale-rating.html"; ?>

          <div class="cart-description">
            <h3><?php echo $name  ?></h3>

            <div class="rating-star"></div>
            <h4 class="price"><span class="old-price"><?php echo  $price + 12000 ?> Ks</span>
              <span class="discount-price"><?php echo  $price ?> Ks</span>
            </h4>
          </div>
          <div class="cart-btn-part">
            <a href="./view-product.php?view-product-id=<?php echo $id ?>" class="view-description-link">View description</a>
            <button type="submit" name="add_to_cart" class="add-to-cart">
              <i id="cart-btn" class="fa-solid fa-cart-shopping"></i>
            </button>
          </div>
        </form>
      </div>
    <?php
    }
    ?>
  </div>
</section>