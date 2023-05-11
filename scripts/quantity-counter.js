// this js code is only work on one product (unlike the counter from the cart-list)
const viewProduct = document.querySelector(".product-quantity-wrapper");

viewProduct.addEventListener("click", (event) => {
  console.log(" He")
  if (event.target.classList.contains("plus")) {
    const quantity = event.target.previousElementSibling;
    quantity.innerText = parseInt(quantity.innerText) + 1;
  } else if (event.target.classList.contains("minus")) {
    const quantity = event.target.nextElementSibling;
    let value = parseInt(quantity.innerText) - 1;
    quantity.innerText = value < 1 ? 1 : value;
  }
});