    <section class="product-section">
      <h2>Trending Products</h2>
      <p>Summer Collection New Morden Design</p>

      <div class="product-container">
        <?php
 $product_num = 10;
        for ($i = 0; $i < $product_num; $i++) {

        ?>
          <div class="product-card">
            <img src="../images/Products/Summer-shirts/f1.jpg" alt="summer-shirt.png" />

           <?php require "./components/star-scale-rating.html";
           ?>
            <div class="cart-description">
              <h3>product brand</h3>
              <h4>product title</h4>
              <div class="rating-star"></div>
              <h4 class="price"><span class="old-price">32000 Ks</span><span class="discount-price">25000 Ks</span></h4>
            </div>
            <div class="cart-btn-part">
              <a href="./view-product.php" class="view-description-link">View description</a>
              <a href="#" class="cart-btn">
                <img src="../images/Btn/cart-icon.png" alt="car.png">
              </a>
            </div>
          </div>

        <?php

        }
        ?>

      </div>
    </section>