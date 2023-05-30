<section class="trend-product-wrapper">
  <i id="left-arrow-btn" class="fa-solid fa-angle-left"></i>
  <i id="right-arrow-btn" class="fa-solid fa-angle-right"></i>
  
  <ul class="carousel" id="product-section-anchor">
    <?php
    $serial = 1;
    $get_all_product_sql = "SELECT * FROM product LIMIT 10";
    foreach ($connection->query($get_all_product_sql) as $row) {
      $id = $row["id"];
      $name =  $row["name"];
      $image = $row["image"];
      $category =  $row["category"];
      $price = $row["price"];
      $description =  $row["description"];
    ?>
      <li>
        <div class="product-card">

          <img src="../images/Products/<?php echo $category . "/" . $image  ?>" alt="<?php echo  $image  ?>" />

          <?php require "./components/star-scale-rating.html";
          ?>
          <div class="cart-description">
            <h3>product brand</h3>
            <h4><?php echo  $name  ?></h4>
            <div class="rating-star"></div>
            <h4 class="price">
              <span class="old-price"><?php echo  $price + 12000 ?> Ks</span>
              <span class="discount-price"><?php echo  $price  ?> Ks</span>
            </h4>
          </div>
          <div class="cart-btn-part">
            <a href="./view-product.php?view-product-id=<?php echo $id ?>" class="view-description-link">View description</a>

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
              <button type="submit" name="add_to_cart" class="add-to-cart">
                <i id="cart-btn" class="fa-solid fa-cart-shopping"></i>
              </button>
            </form>
          </div>
        </div>
      </li>
    <?php
    }
    ?>
  </ul>

</section>
<script src="./scripts/product-slider.js"> </script>