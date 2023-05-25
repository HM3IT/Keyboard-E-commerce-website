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
      <li class="nav-bar-btn">
        <a href="shop-page.php">
          <img src="../images/Btn/shop-icon.png" alt="shop-icon.png" class="shop-icon" />
        </a>
      </li>
      <li class="nav-bar-btn">
        <?php
        if (isset($_SESSION["name"])) {
        ?>
          <a href="./controller/login_controller.php?logout">logout</a>
        <?php
        } else {
        ?>
          <a href="login.php"> login </a>

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