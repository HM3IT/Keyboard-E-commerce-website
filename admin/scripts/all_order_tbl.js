let overlay = document.getElementById("confirm-status-overlay");
let confirmForm = document.getElementById("confirm-status-box");

function confirmChanges() {
  overlay.style.display = "block";
  confirmForm.style.display = "block";
}

function closeConfirmForm() {
  overlay.style.display = "none";
  confirmForm.style.display = "none";
}

confirmForm
  .querySelector("#confirm-btn")
  .addEventListener("click", function () {
    var formData = new FormData(document.querySelector(".order-status-form"));
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./controller/order_status_controller.php", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        console.log("success");

        location.reload();
      }
    };
    xhr.send(formData);

    document.getElementById("confirm-status-overlay").style.display = "none";
    document.getElementById("confirm-status-box").style.display = "none";
  });


$(document).ready(function() {
  $("#empTable").DataTable({
    processing: true,
    serverSide: true,
    serverMethod: "post",
    ajax: {
      url: "./controller/table_controller.php",
    },
    columns: [
      { data: "order_id" },
      { data: "customer_name" },
      { data: "order_date" },
      { data: "ship_address" },
      { data: "total_price" },
      { data: "order_approval" },
      { data: "delivery_status" }
    ],
  });
});
 
