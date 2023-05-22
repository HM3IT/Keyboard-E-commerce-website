  <section class="product-search-bar-container">
    <form action="">
      <i class="fas fa-search"></i>
      <input type="text" id="search-item" placeholder="search products" onkeyup="searchItem()" />
    </form>
    <div id="search-bar-result">
      <ul class="matched-item-lists">
       
        <?php
        $matched_count = 3;
        for ($i = 0; $i < $matched_count; $i++) {
        ?>
          <li>
            <div class="matched-item-box">
              <img src="../images/Products/Summer-shirts/f1.jpg" alt="" />
              <div class="item-description">
                <?php
                if ($i % 2 == 0) {
                ?>
                  <span class="stock-info in-stock"> In stock</span>
                <?php
                } else {
                ?>
                  <span class="stock-info out-stock">out-of-stock</span>
                <?php
                }
                ?>
                <h2 class="item-title">T shirt</h2>
                <p class="item-detail">T shirt for a men to wear in summer. Has a fine material and cold in hot weather : ) </p>
                <h4 class="item-price">25,000 Ks</h4>
              </div>
            </div>
            <hr>
          </li>
        <?php
        }
        ?>

        <?php

        for ($i = 0; $i < $matched_count; $i++) {
        ?>
          <li>
            <div class="matched-item-box">
              <img src="../images/Products/Summer-shirts/f2.jpg" alt="" />
              <div class="item-description">
                <?php
                if ($i % 2 == 0) {
                ?>
                  <span class="stock-info in-stock"> In stock</span>
                <?php
                } else {
                ?>
                  <span class="stock-info out-stock">out-of-stock</span>
                <?php
                }
                ?>
                <h2 class="item-title">Good Shirt</h2>
                <p class="item-detail">T shirt for a men to wear in summer. Has a fine material and cold in hot weather : ) </p>
                <h4 class="item-price">25,000 Ks</h4>
              </div>
            </div>
            <hr>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </section>