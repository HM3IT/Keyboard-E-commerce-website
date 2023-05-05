<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="navbar.css" />
  </head>

  <body>
    <header class="header">
      <div class="logo">
        <img src="Image/noupe.png" alt="mylogo.png" />
      </div>
      <nav class="nav-bar nav-bar-left">
        <ul>
          <li class="nav-bar-btn home-btn">
            <a href="">Home</a>
          </li>
          <li class="nav-bar-btn">
            <a href="">Shop</a>
          </li>
          <li class="nav-bar-btn">
            <a href="">About</a>
          </li>
          <li class="nav-bar-btn">
            <a href="">Contact</a>
          </li>
        </ul>
      </nav>
      <nav class="nav-bar nav-bar-right">
        <ul>
          <li class="nav-bar-btn">
            <a href="">login</a>
          </li>
          <li class="nav-bar-btn">
            <a href="">
              <img src="Image/shop-icon.png" alt="shop-icon.png" class="shop-icon">
            </a>
          </li>
        </ul>
      </nav>
      <div class="menu">
        <img src="Image/menu-btn.png" alt="menu.png" />
      </div>
    </header>
    <script>
      let menu = document.getElementsByClassName("menu")[0];
      let nav = document.getElementsByClassName("nav-bar")[0];

      //  Access CSS variables (custom properties) defined in the :root pseudo-class to avoid hard coding
      const rootStyles = getComputedStyle(document.documentElement);
      const offsetLeft = rootStyles.getPropertyValue("--nav-bar-offset-left");

      menu.addEventListener("click", (event) => {
        nav.style.left = nav.style.left === "0px" ? offsetLeft : "0px";
      });
    </script>

    <?php 
     include 'hero.html';
    ?>
  </body>
</html>
