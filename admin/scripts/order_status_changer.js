const setStatusColor = () => {
  console.log("DO");
  let deliveryStatusSelects =
    document.getElementsByClassName("delivery-status");
  let orderStatusSelects = document.getElementsByClassName("order-approval");
  console.log(deliveryStatusSelects.length);
  for (let i = 0; i < deliveryStatusSelects.length; i++) {
    let deliveryStatusSelect = deliveryStatusSelects[i];
    console.log("hi");
    let orderStatusSelect = orderStatusSelects[i];
    setOrderTextColor();
    setDeliveryTextColor();
    orderStatusSelect.addEventListener("change", function () {
      setOrderTextColor();
    });
    deliveryStatusSelect.addEventListener("change", function () {
      setDeliveryTextColor();
    });

    function setOrderTextColor() {
      let selectedOption =
        orderStatusSelect.options[orderStatusSelect.selectedIndex];
      let selectedValue = selectedOption.value;

      if (selectedValue === "YES") {
        orderStatusSelect.classList.add("text-green");
        orderStatusSelect.classList.remove("text-red");
      } else {
        orderStatusSelect.classList.add("text-red");
        orderStatusSelect.classList.remove("text-green");
      }
    }

    function setDeliveryTextColor() {
      let selectedOption =
        deliveryStatusSelect.options[deliveryStatusSelect.selectedIndex];
      let selectedValue = selectedOption.value;

      if (selectedValue === "RECEIVED") {
        deliveryStatusSelect.classList.add("text-green");
        deliveryStatusSelect.classList.remove("text-orange");
      } else {
        deliveryStatusSelect.classList.add("text-orange");
        deliveryStatusSelect.classList.remove("text-green");
      }
    }
  }
};
$(document).ajaxSuccess(function() {
  setStatusColor();
});
let dataLoading = 1000;
setTimeout(setStatusColor, dataLoading);
