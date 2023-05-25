let addToCartButtons = document.querySelectorAll(".add-to-cart");

addToCartButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault();
    // Getting the product ID from the data attribute
    let productId = button.dataset.productId;

    // Send an AJAX request
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./controller/cart_controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        document.getElementById("popup-info-box").style.display = "block";

        // Hiding the popup box after 2.5 seconds
        setTimeout(function () {
          document.getElementById("popup-info-box").style.display = "none";
        }, 2500);
      }
    };

    xhr.send("add_product_id=" + encodeURIComponent(productId));
  });
});

// Get all product remove buttons
let removeButtons = document.querySelectorAll(".product-remove-btn");

removeButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault();
    let productId = button.dataset.productId;
    let listItem = button.closest(".card-list-items");

    // Apply the removing class to trigger the animation
    listItem.classList.add("removing");

    // Wait for the animation to finish and then remove the product element
    setTimeout(function () {
      listItem.remove();
      // Need to be the same duration with transition duration in CSS (Adjustable)
    }, 1000);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./controller/cart_controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      }
    };

    console.log("remove product " + productId);
    xhr.send("remove_product_id=" + encodeURIComponent(productId));
  });
});
