<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<header class="header">
  <div class="logo">
    <img class="webpage-logo" src="../images/logo.png" alt="mylogo.png" />
  </div>
  <nav class="nav-bar nav-bar-left">
    <ul>
      <li class="nav-bar-btn home-btn">
        <a href="./index.php">Home</a>
      </li>
      <li class="nav-bar-btn shop-btn">
        <a href="./shop-page.php">Shop</a>
      </li>
      <li class="nav-bar-btn about-btn">
        <a href="./about-page.php">About</a>
      </li>
      <li class="nav-bar-btn contact-btn">
        <a href="./contact-page.php">Contact</a>
      </li>
    </ul>
  </nav>
  <nav class="nav-bar nav-bar-right">
    <ul>
      <li> 
        <a id="dropdown-btn">Best Deal</a>
        <ul class="dropdown">
          <?php

          ?>
          <li><a href="view-collection.php?collection-type=recent">Recent Arrivals</a></li>
          <li><a href="view-collection.php?collection-type=trend">Trends Products</a></li>
          <li><a href="view-collection.php?collection-type=discount">Promotion offers</a></li>
        </ul>
      </li>
      <li class="nav-bar-btn view-cart-btn">
        <a href="view-cart-list.php" class="view-cart-icon">
          <i class="fa-solid fa-cart-arrow-down"></i>
        </a>
      </li>
      <li class="nav-bar-btn login-btn">
        <?php
        if (isset($_SESSION["customer_name"])) {

          $current_page = basename($_SERVER['PHP_SELF']);

          if ($current_page == 'setting.php') {
        ?>

            <a href="./controller/login_controller.php?logout">logout</a>
          <?php
          } else {
          ?>
            <a href="setting.php"> Setting </a> <?php  }
                                            } else {
                                                ?>
          <a href="./login.php">login</a>
        <?php
                                            }
        ?>
      </li>
    </ul>
  </nav>
  <div class="hamburger-menu">
    <i id="hamburger-icon" class="fas fa-indent"></i>
  </div>
</header>