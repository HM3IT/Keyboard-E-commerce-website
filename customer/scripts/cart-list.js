document.addEventListener("DOMContentLoaded", function () {
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

  // updating the quantity according to the increment-decrement provided in the cart-list/-table

  let checkoutLink = document.querySelector(".card-list-check-out");

  checkoutLink.addEventListener("click", function (event) {
    event.preventDefault();

    let productItems = document.querySelectorAll(".card-list-items");

    // To store productIndex and quantity in the updatedProductAry array
    let updatedProductAry = [];

    productItems.forEach(function (item) {
      let productIndex = item.querySelector(".quantity").dataset.productIndex;
      let quantity = item.querySelector(".quantity").textContent.trim();

      updatedProductAry.push({
        productIndex: productIndex,
        quantity: quantity,
      });
    });

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/cart_controller.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // console.log("Quantity updated successfully.");
        // var response = JSON.parse(xhr.responseText);
        // var message = response.data;
        // console.log(message);
        window.location.href = "view-cart-list.php";
      } else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200) {
        console.log("Failed to update quantity.");
        alert(
          "There has an error in updating the quantity of the product. Please report this to the admin!"
        );
      }
    };

    // Convert the updatedProductAry array to JSON string
    let jsonData = JSON.stringify(updatedProductAry);

    xhr.send(jsonData);
  });
});
