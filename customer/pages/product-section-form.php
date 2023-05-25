<section class="product-section">
  <h2>Trending Products</h2>
  <p>Summer Collection New Morden Design</p>

  <div class="product-container">
    <?php
    $serial = 1;
    $get_all_product_sql = "SELECT * FROM product";
    foreach ($connection->query($get_all_product_sql) as $row) {
    ?>
      <div class="product-card">
        <form action="./controller/cart_controller.php" method="POST" id="cart-form">
          <input type="hidden" name="id" id="id" value="<?php echo $row["id"] ?>">
          <input type="hidden" name="name" id="name" value="<?php echo $row["name"] ?>">
          <input type="hidden" name="image" id="image" value="<?php echo $row["image"] ?>">
          <input type="hidden" name="category" id="category" value="<?php echo $row["category"] ?>">
          <input type="hidden" name="price" id="price" value="<?php echo $row["price"] ?>">
          <input type="hidden" name="description" id="description" value="<?php echo $row["description"] ?>">

          <img src="../images/Products/<?php echo $row['category'] . '/' . $row['image'] ?>" alt="<?php echo $row['image'] ?>" />
          <?php require "./components/star-scale-rating.html"; ?>

          <div class="cart-description">
            <h3>product brand</h3>
            <h4><?php echo $row['name'] ?></h4>

            <div class="rating-star"></div>
            <?php $price = $row['price']; ?>
            <h4 class="price"><span class="old-price"><?php echo  $price + 12000 ?> Ks</span>
              <span class="discount-price"><?php echo  $price ?> Ks</span>
            </h4>
          </div>
          <div class="cart-btn-part">
            <a href="./view-product.php" class="view-description-link">View description</a>
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