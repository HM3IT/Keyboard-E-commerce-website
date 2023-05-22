<div class="card-list-open-btn">
  <span>3</span>
  <img src="../images/Btn/shop-icon.png" alt="">
</div>

<div class="card-list">
  <h2 class="card-list-title">Your Cart</h2>
  <ul>
    <?php
    for ($i = 0; $i < 5; $i++) {
    ?>
      <li class="card-list-items">
        <div class="card-list-box">
          <img src="../images/Products/Summer-shirts/f1.jpg" alt="">
          <div class="card-list-box-description1">
            <p> Product description</p>
            <div class="product-quantity-wrapper">
              <span class="minus">-</span>
              <span class="quantity">1</span>
              <span class="plus">+</span>
            </div>
          </div>
          <div class="card-list-box-description2">
            <span>250 Ks</span>
            <i class="fa-regular fa-trash-can"></i>
          </div>
        </div>
      </li>
    <?php
    }
    ?>
  </ul>
  <div class="card-list-footer">
    <div class="card-list-check-out">Check Out -
      <span> 250 Ks</span>
    </div>
    <div class="card-list-close-btn">
      <i class="fa-regular fa-circle-xmark"></i>
    </div>
  </div>
</div>