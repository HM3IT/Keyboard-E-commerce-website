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

// the logic of this incrementer and decrementer is not the same with the single product view
const productList = document.querySelector(".card-list ul");

productList.addEventListener("click", (event) => {
  if (event.target.classList.contains("plus")) {
    const quantity = event.target.previousElementSibling;
    quantity.innerText = parseInt(quantity.innerText) + 1;
  } else if (event.target.classList.contains("minus")) {
    const quantity = event.target.nextElementSibling;
    let value = parseInt(quantity.innerText) - 1;
    quantity.innerText = value < 1 ? 1 : value;
  }
});
