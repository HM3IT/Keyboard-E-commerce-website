<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="product-section.css" />
  </head>
  <body>
    <section class="product-section">
      <h2>Trending Products</h2>
      <p>Summer Collection New Morden Design</p>

      <div class="product-container">

      <?php 
    $html='
        <div class="product-card">
          <img
            src="Image/Products/Summer-shirts/f1.jpg"
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
             <img src="Image/Btn/cart-icon.png" alt="car.png">
          </a>
          </div>
        </div>
        ';
        for ($i = 0; $i < 8; $i++) {
          echo $html;
      }
        ?>
  
      </div>
    </section>

   
    <script>
      
      let star = document.getElementsByTagName("input");
      let showValue = document.getElementById("rating-value");

      for (let i = 0; i < star.length; i++) {
        star[i].addEventListener("click", function () {
          showValue.innerHTML = this.value + " out of 5";
        });
      }
    </script>
  </body>
</html>
