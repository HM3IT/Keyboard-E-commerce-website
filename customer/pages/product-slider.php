<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Infinite Card Slider JavaScript | CodingNepal</title>
  <link rel="stylesheet" href="product-slider.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Fontawesome Link for Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <script src="product-slider.js" defer></script>
</head>

<body>
  <div class="trend-product-wrapper">
    <i id="left-arrow-btn" class="fa-solid fa-angle-left"></i>
    <i id="right-arrow-btn" class="fa-solid fa-angle-right"></i>
    <ul class="carousel">

      <?php
      $product_num = 20;
      for ($i = 0; $i < $product_num; $i++) {

      ?>
        <li>
          <div class="product-card">
            <?php
            if ($i % 2 ==  0) {

            ?>
              <img src="../images/Products/Summer-shirts/f1.jpg" alt="summer-shirt.png" />
            <?php
            } else {
            ?>
              <img src="../images/Products/Summer-shirts/f3.jpg" alt="summer-shirt.png" />
            <?php
            }
            ?>
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
        </li>
      <?php
      }
      ?>
    </ul>

  </div>

</body>

</html>