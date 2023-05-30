document.addEventListener("DOMContentLoaded", function () {
  // Get all product remove buttons
  let removeButtons = document.querySelectorAll(".remove-cart-a");

  removeButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();

      let productId = button.dataset.productId;

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "./controller/cart_controller.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          console.log("Response:", xhr.responseText);
          location.reload();
        }
      };

      console.log("remove product " + productId);
      xhr.send("remove_product_id=" + encodeURIComponent(productId));
    });
  });

});
