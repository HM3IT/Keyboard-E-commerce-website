<section class="product-section" id="product-section-anchor">
  <h2>Recommendation Products</h2>
  <p>Best Collection with Awesome Keycaps & layouts</p>

  <div class="product-container">
    <?php
    $item_per_page = 10;
    $counter = 0;
    foreach ($dataset  as $row) {
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
      $quantity = $row["quantity"];
    ?>
      <div class="product-card">
        <form method="POST" class="cart-form">
          <input type="hidden" name="id" id="id" value="<?php echo  $id ?>">
          <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
          <input type="hidden" name="primary_img" id="image" value="<?php echo $primary_image ?>">
          <input type="hidden" name="category" id="category" value="<?php echo $category ?>">
          <input type="hidden" name="price" id="price" value="<?php echo $price ?>">
          <input type="hidden" name="description" id="description" value="<?php echo $description ?>">
          <input type="hidden" name="current_page" class="current_page">
          <?php
          if ($quantity   > 0) {
          ?>
            <span class="stock-info in-stock"> In Stock</span>
          <?php
          } else {
          ?>
            <span class="stock-info out-stock"> Out of Stock</span>
          <?php
          }
          ?>
          <img src="../images/Products/<?php echo $category . '/' . $primary_image ?>" alt="<?php echo  $image ?>" />

          <?php require "./components/star-scale-rating.html"; ?>
          <div class="cart-description">
            <h3><?php echo $name  ?></h3>

            <div class="rating-star"></div>

            <?php

            $discount =   $row["discount"];

            if ($discount > 0) {
              // Calculate the discount price
              $discount_price = $price - ($price * $discount / 100);

            ?>
              <h4 class="price"><span class="actual-price"><?php echo $price   ?> Ks</span>
                <span class="discount-price"><?php echo   $discount_price ?> Ks</span>
              </h4>
            <?php
            } else {

            ?>
              <h4 class="price"><?php echo  $price ?> Ks</span>
              </h4>
            <?php
            }

            ?>

          </div>
          <div class="cart-btn-part">
            <a href="./product-detail.php?view-product-id=<?php echo $id ?>" class="view-description-link">View Details</a>
            <?php
            if ($quantity   > 0) {
            ?>
              <button type="submit" name="add_to_cart" class="add-to-cart">
                <i id="cart-btn" class="fa-solid fa-cart-shopping"></i>
              </button>
            <?php
            }
            ?>
          </div>
        </form>
      </div>
    <?php
      $counter++;
      if ($counter >= $item_per_page) {
        break;
      }
    }
    ?>
  </div>
</section>