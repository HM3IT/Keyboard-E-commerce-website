// this js code is only work on one product (unlike the counter from the cart-list)

// document.addEventListener("DOMContentLoaded", function () {
//   const viewProduct = document.querySelector(".product-quantity-wrapper");

//   viewProduct.addEventListener("click", (event) => {
//     if (event.target.classList.contains("plus")) {
//       const quantity = event.target.previousElementSibling;
//       quantity.innerText = parseInt(quantity.innerText) + 1;
//     } else if (event.target.classList.contains("minus")) {
//       const quantity = event.target.nextElementSibling;
//       let value = parseInt(quantity.innerText) - 1;
//       quantity.innerText = value < 1 ? 1 : value;
//     }
//   });
// });
let productList;
productList = document.querySelector(".card-list ul");
if (productList == null) {
  productList = document.querySelector("#cart-list-table");
}

productList.addEventListener("click", (event) => {
  if (event.target.classList.contains("plus")) {
    let quantity = event.target.previousElementSibling;
    quantity.innerText = parseInt(quantity.innerText) + 1;
  } else if (event.target.classList.contains("minus")) {
    let quantity = event.target.nextElementSibling;
    let value = parseInt(quantity.innerText) - 1;
    quantity.innerText = value < 1 ? 1 : value;
  }
});
