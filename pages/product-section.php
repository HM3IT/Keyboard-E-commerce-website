    <section class="product-section">
      <h2>Trending Products</h2>
      <p>Summer Collection New Morden Design</p>

      <div class="product-container">
        <?php
        $html = '
        <div class="product-card">
          <img
            src="../images/Products/Summer-shirts/f1.jpg"
            alt="summer-shirt.png"
          />
        
          <div class="rating-scale">
            <input type="radio" name="star" id="star1" value="5" />
            <label for="star1"></label>
            <input type="radio" name="star" id="star2" value="4" />
            <label for="star2"></label>
            <input type="radio" name="star" id="star3" value="3" />
            <label for="star3"></label>
            <input type="radio" name="star" id="star4" value="2" />
            <label for="star4"></label>
            <input type="radio" name="star" id="star5" value="1" />
            <label for="star5"></label>
          </div>
          <h4 id="rating-value">5 out of 5</h4>
          <div class="cart-description">
            <h3>product brand</h3>
            <h4>product title</h4>
            <div class="rating-star"></div>
            <h4 class="price"><span class="old-price">32000 Ks</span><span class="discount-price">25000 Ks</span></h4>
          </div>
          <div class="cart-btn-part">
            <a href="#" class="view-description-link">View description</a>
          <a href="#" class="cart-btn">
             <img src="../images/Btn/cart-icon.png" alt="car.png">
          </a>
          </div>
        </div>
        ';
        for ($i = 0; $i < 10; $i++) {
          echo $html;
        }
        ?>

      </div>
    </section>