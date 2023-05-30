
let addToCartButtons = document.querySelectorAll(".add-to-cart");

addToCartButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    document.getElementById("popup-info-box").style.display = "block";

    // Hiding the popup box after a certain period (1.5 seconds)
    setTimeout(function () {
      document.getElementById("popup-info-box").style.display = "none";
    }, 1500);
  });
});

// Get all product remove buttons
let removeButtons = document.querySelectorAll(".product-remove-btn");

removeButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault();

    let productId = button.dataset.productId;
    let listItem = button.closest(".card-list-items");

    // Applying the animation
    listItem.classList.add("removing");
    setTimeout(function () {
      listItem.remove();
      listItem.style.display = "none";
      // Need to be the same duration with transition duration in CSS (Adjustable)
    }, 2000);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./controller/cart_controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log("Response:", xhr.responseText);

        // Check if the cart is empty
        let cartList = document.getElementById("card-list-ul");
        let emptyCartItems = cartList.querySelector(
          ".card-list-items:not(.removing)"
        );

        if (!emptyCartItems) {
          // Cart is empty, add the empty cart message
          let emptyCartItem = document.createElement("li");
          let emptyCartBox = document.createElement("div");
          let emptyCartEmoji = document.createElement("i");
          let emptyCartDescription = document.createElement("div");
          let emptyCartHeading = document.createElement("h3");

          emptyCartItem.classList.add("card-list-items");
          emptyCartBox.classList.add("card-list-box");
          emptyCartEmoji.classList.add("fa-regular", "fa-face-sad-cry");
          emptyCartEmoji.id = "cry-emoji";
          emptyCartDescription.classList.add("card-list-box-description1");
          emptyCartHeading.style.textAlign = "center";
          emptyCartHeading.textContent = "You order cart is now empty";

          emptyCartDescription.appendChild(emptyCartHeading);
          emptyCartBox.appendChild(emptyCartEmoji);
          emptyCartBox.appendChild(emptyCartDescription);
          emptyCartItem.appendChild(emptyCartBox);

          cartList.appendChild(emptyCartItem);
        }
      }
    };

    console.log("remove product " + productId);
    xhr.send("remove_product_id=" + encodeURIComponent(productId));
  });
});
