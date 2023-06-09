document.addEventListener("DOMContentLoaded", function () {
  let addToCartForms = document.querySelectorAll(".cart-form");

  addToCartForms.forEach(function (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      let formData = new FormData(form);

      fetch("./controller/cart_session_controller.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          console.log(data.out_of_stock);
          if (data.out_of_stock) {
            let quantityOverlay = document.getElementById(
              "quantity-limit-overlay"
            );
            let outOfStockBox = document.getElementById("out-of-stock-box");
            let instockInfo = outOfStockBox.querySelector("span");

            quantityOverlay.style.display = "block";
            outOfStockBox.style.display = "block";
            instockInfo.innerText = data.message;
          } else if (!data.exceed_quantity) {
            document.getElementById("popup-info-box").style.display = "block";
            // Hiding the popup box after a certain period (1.5 seconds)
            setTimeout(function () {
              document.getElementById("popup-info-box").style.display = "none";
            }, 800);
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            let quantityOverlay = document.getElementById(
              "quantity-limit-overlay"
            );
            let quantityAlertBox = document.getElementById(
              "quantity-limit-alert-box"
            );
            quantityOverlay.style.display = "block";
            quantityAlertBox.style.display = "block";
          }
        })
        .catch((error) => {
          console.log(error);
        });
    });
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
