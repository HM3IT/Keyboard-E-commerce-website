function showPaymentFields() {
  let paymentFields = document.getElementsByClassName("kPayFields");
  for (let i = 0; i < paymentFields.length; i++) {
    paymentFields[i].style.display = "block";
  }

  let transactionImgField = document.getElementById("transaction-img");
  transactionImgField.setAttribute("required", "required");
}

function hidePaymentFields() {
  let paymentFields = document.getElementsByClassName("kPayFields");
  for (let i = 0; i < paymentFields.length; i++) {
    paymentFields[i].style.display = "none";
  }

  let transactionImgField = document.getElementById("transaction-img");
  transactionImgField.removeAttribute("required");
}

// Add an event listener to the checkout button

document
  .getElementById("checkout-form")
  .addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the form from submitting normally

    let form = this;
    let formData = new FormData(form);

    console.log(formData);

    let xhr = new XMLHttpRequest();
    xhr.open("POST", form.action, true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          document.getElementById("checkout-overlay").style.display = "block";
          document.getElementById("checkout-noti-form").style.display = "block";

           
        } else {
          // Request failed
          console.log("Failed to place order.");
          // Handle the error or show error message
        }
      }
    };
    xhr.send(formData);
  });

document
  .getElementById("check-out-noti-form-btn")
  .addEventListener("click", function (e) {
    document.getElementById("checkout-overlay").style.display = "none";
    document.getElementById("checkout-noti-form").style.display = "none";
    location.href = "./invoice.php";
  });
