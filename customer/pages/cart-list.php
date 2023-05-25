<div id="popup-info-box">
  <i class="fa-regular fa-face-smile-beam"></i>
  <p>Product is added! </p>
</div>

<div class="card-list-open-btn">
  <span>3</span>
  <i class="fa-solid fa-basket-shopping"></i>
</div>
<script>
  // let openButton = document.querySelector(".card-list-open-btn");

  // openButton.addEventListener("click", function() {
  //   location.reload();
  // });
</script>
<div class="card-list">
  <h2 class="card-list-title">Your Cart</h2>
  <ul>
    <?php
    if (isset($_SESSION["cart"])) {
      $count = count($_SESSION["cart"]);

      if ($count <= 0) {
    ?>
        <li class="card-list-items">
          <div class="card-list-box">
            <i class="fa-solid fa-face-grin-beam-sweat" id="sad-emoji"></i>
            <div class="card-list-box-description1">
              <h3 style="text-align:center">You have not added any order yet! </h3>
            </div>
          </div>
        <li>

          <?php
        } else {

          foreach ($_SESSION["cart"] as $key => $value) {
          ?>
        <li class="card-list-items">
          <div class="card-list-box">
            <img src="../images/Products/<?php echo $value['category'] . '/' . $value['image'] ?>" alt="<?php echo $row['image'] ?>" />
            <div class="card-list-box-description1">
              <p> <?php echo $value["description"] ?></p>
              <div class="product-quantity-wrapper">
                <span class="minus">-</span>
                <span class="quantity"><?php echo $value["Quantity"] ?></span>
                <span class="plus">+</span>
              </div>
            </div>
            <div class="card-list-box-description2">
              <span><?php echo $value["price"] ?> Ks</span>
              <button class="product-remove-btn" data-product-id="<?php echo $row['id']; ?>">
                <i class="fa-regular fa-trash-can"></i>
              </button>
            </div>
          </div>
        </li>
  <?php
          }
        }
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
<script src="./scripts/add-remove-cart.js"></script>