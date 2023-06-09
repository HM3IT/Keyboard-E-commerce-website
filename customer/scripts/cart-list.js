document.addEventListener("DOMContentLoaded", function () {
  // cart-list add remove animation
  const cartListOpenBtn =
    document.getElementsByClassName("card-list-open-btn")[0];
  const cartListCloseBtn = document.getElementsByClassName(
    "card-list-close-btn"
  )[0];

  const cartList = document.getElementsByClassName("card-list")[0];

  cartListOpenBtn.addEventListener("click", () => {
    cartList.style.right = "20px";
  });

  cartListCloseBtn.addEventListener("click", () => {
    cartList.style.right = "-600px";
  });

  let quantityOverlay = document.getElementById("quantity-limit-overlay");
  let quantityAlertBox = document.getElementById("quantity-limit-alert-box");

  let quantityButtons = document.querySelectorAll(
    ".product-quantity-wrapper .minus, .product-quantity-wrapper .plus"
  );
  quantityButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      let quantityElement = button.parentNode.querySelector(".quantity");
      let productIndex = quantityElement.dataset.productIndex;
      let quantity = parseInt(quantityElement.textContent.trim());

      let productID =
        quantityElement.parentNode.querySelector(".cart-id").dataset.productId;

      if (button.classList.contains("minus")) {
        quantity = Math.max(quantity - 1, 1);
        if (quantity <= 0) {
          quantity == 1;
        }
      } else if (button.classList.contains("plus")) {
        if (quantity >= 5) {
          quantityOverlay.style.display = "block";
          quantityAlertBox.style.display = "block";
        } else {
          quantity += 1;
        }
      }

      quantityElement.textContent = quantity;
      handleQuantityChange(quantity, productIndex, productID, quantityElement);
    });
  });

  let timer;
  let waitTimer = 500;
  let updatedProductAry = [];

  function handleQuantityChange(
    quantity,
    productIndex,
    productID,
    quantityElement
  ) {
    clearTimeout(timer);
    updatedProductAry.push({
      productIndex: productIndex,
      productID: productID,
      quantity: quantity,
    });

    timer = setTimeout(function () {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "controller/cart_controller.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            if (response.out_of_stock) {
              // Handle out of stock scenario

              let quantityOverlay = document.getElementById(
                "quantity-limit-overlay"
              );
              let outOfStockBox = document.getElementById("out-of-stock-box");
              let instockInfo = outOfStockBox.querySelector("span");

              quantityOverlay.style.display = "block";
              outOfStockBox.style.display = "block";
              instockInfo.innerText = response.data;
              quantityElement.textContent = response.data;
            }
          } else {
            console.log("Failed to update quantity.");
            alert(
              "There was an error updating the quantity of the product. Please report this to the admin!"
            );
          }
        }
      };

      xhr.send(JSON.stringify(updatedProductAry));
      // Reset the array after sending the data
      updatedProductAry = [];
    }, waitTimer);
  }
});
