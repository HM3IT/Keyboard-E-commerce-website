// Optimizing the searching process
const delayTimer = 700;
let timeoutId;

// callback function:func
function debounce(func, delay) {
  clearTimeout(timeoutId);
  timeoutId = setTimeout(func, delay);
}

const searchItem = () => {
  debounce(function () {
    const searchBox = document
      .getElementById("search-item")
      .value.toUpperCase();
    const itemContainer = document.querySelector(".matched-item-lists");
    const items = itemContainer.querySelectorAll("li");

    if (searchBox.length < 1) {
      items.forEach((item) => {
        item.style.display = "none";
      });
    } else {
      let isFound = false;
      items.forEach((item) => {
        const itemTitle = item.querySelector(".item-title");
        if (itemTitle) {
          if (itemTitle.textContent.toUpperCase().includes(searchBox)) {
            item.style.display = "block";
            isFound = true;
          } else {
            item.style.display = "none";
          }
        }
      });
      if (!isFound) {
        // Create a new nothingLi element for the "found nothing" message
        const nothingLi = document.createElement("li");
        nothingLi.classList.add("found-nothing");
        nothingLi.style.display = "block";
        nothingLi.innerHTML = "<div><span>Found nothing</span></div>";
        itemContainer.insertBefore(nothingLi, items[0]);
      }
    }
  }, delayTimer);
};
