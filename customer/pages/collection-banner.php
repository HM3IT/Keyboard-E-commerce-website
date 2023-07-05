<?php
$get_category_qry = "SELECT * FROM category";

$RK = "Royal Kludge";
$KC = "Keychron";
$featured_keyboard1 = -1;
$featured_keyboard2 = -1;

foreach ($connection->query($get_category_qry) as $data) {
  if ($data["category_name"] == $RK) {
    $featured_keyboard1  = $data["id"];
  } else if ($data["category_name"] == $KC) {
    $featured_keyboard2  = $data["id"];
  }
}
if ($featured_keyboard1  < 0 || $featured_keyboard2 < 0) {
  echo "<script>  alert('collection-banner has an error. Please contact with the developer');  </script>";
  exit;
}

?>

<section id="primary-banner" class="banner-container">
  <div class="banner-box banner-box1">
    <h2><?php echo $RK  ?></h2>
    <span>Most popular keybaod Brand</span>
    <a href="view-collection.php?brand=<?php echo $featured_keyboard1  ?>" class="btn-white">Explore</a>
  </div>
  <div class="banner-box banner-box2">
    <h2><?php echo $KC  ?></h2>
    <span>Clean keyboard layout </span>
    <a href="view-collection.php?brand=<?php echo $featured_keyboard2  ?>" class="btn-white">Check the Collection</a>
  </div>
</section>

<section id="additional-banner" class="banner-container">
  <div class="banner-box banner-box1">
    <h2>Build your custom keyboard with beautiful things</h2>
    <h3>Keycaps</h3>
    <a href="view-collection.php?collection-type=keycap"></a>
  </div>
  <div class="banner-box banner-box2">
    <h2>Trends Keyboards COLLECTION</h2>
    <h3>Spring/Summer 2023</h3>
    <a href="view-collection.php?collection-type=trend"></a>
  </div>
  <div class="banner-box banner-box3">
    <h2>Newly Arrived Keyboards</h2>
    <h3>Recent Arrivals</h3>
    <a href="view-collection.php?collection-type=recent"></a>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    let bannerBoxes = document.querySelectorAll('#additional-banner .banner-box');

    bannerBoxes.forEach(function(bannerBox) {
      let link = bannerBox.querySelector('a');
      bannerBox.addEventListener('click', function() {
        link.click();
      });
    });
  });
</script>