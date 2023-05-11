let star = document.getElementsByClassName("star-rating");
let showValue = document.getElementsByClassName("rating-value");
for (let i = 0; i < star.length; i++) {
  star[i].addEventListener("click", function() {
    showValue[0].innerHTML = this.value + " out of 5";
  });
}