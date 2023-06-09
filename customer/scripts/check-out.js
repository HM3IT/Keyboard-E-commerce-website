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

// document
//   .getElementById("checkout-form")
//   .addEventListener("submit", function (e) {
//     e.preventDefault();
//     let form = this;
//     let formData = new FormData(form);

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", " ./controller/order_controller.php", true);
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//     xhr.onreadystatechange = function () {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200 && xhr.responseText) {
//           let response = JSON.parse(xhr.responseText);
//           // if (response.success) {
//             document.getElementById("checkout-overlay").style.display = "block";
//             document.getElementById("checkout-noti-form").style.display =
//               "block";
//           // } else {
//           //   console.log("Connection error");
//           // }
//         } else {
//           console.log("Failed to place order.");
//         }
//       }
//     };
//     xhr.send(formData);
//   });


