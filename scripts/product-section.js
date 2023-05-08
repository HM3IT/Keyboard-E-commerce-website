let star = document.getElementsByTagName("input");
let showValue = document.getElementById("rating-value");

for (let i = 0; i < star.length; i++) {
  star[i].addEventListener("click", function () {
    showValue.innerHTML = this.value + " out of 5";
  });
}