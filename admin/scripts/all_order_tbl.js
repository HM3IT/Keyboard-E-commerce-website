    $(document).ready(function() {
        $("#empTable").DataTable({
            processing: true,
            serverSide: true,
            serverMethod: "post",
            ajax: {
                url: "./controller/table_controller.php",
            },
            columns: [{
                    data: "order_id"
                },
                {
                    data: "customer_name"
                },
                {
                    data: "order_date"
                },
                {
                    data: "ship_address"
                },
                {
                    data: "total_price"
                },
                {
                    data: "order_approval"
                },
                {
                    data: "delivery_status"
                },
                {
                    data: "action"
                }
            ],
        });
    });

    function updateOrderStatus(event, orderId) {
        event.preventDefault();

        const row = event.target.closest("tr");
        // Get the approval status and delivery status values from the row
        const approvalStatus = row.querySelector(".order-approval").value;
        const deliveryStatus = row.querySelector(".delivery-status").value;

        const payload = {
            order_id: orderId,
            order_approval: approvalStatus,
            delivery_status: deliveryStatus
        };

        confirmForm.querySelector("#confirm-btn").addEventListener("click", function() {
            document.getElementById("confirm-status-overlay").style.display = "none";
            document.getElementById("confirm-status-box").style.display = "none";

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./controller/order_status_controller.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log("Success");
                    location.reload();
                }
            };
            xhr.send(JSON.stringify(payload));
        });
    }

    let overlay = document.getElementById("confirm-status-overlay");
    let confirmForm = document.getElementById("confirm-status-box");

    function confirmChanges(event, orderId) {
        overlay.style.display = "block";
        confirmForm.style.display = "block";
        confirmForm
            .querySelector("#confirm-btn")
            .addEventListener("click", function() {

                updateOrderStatus(event, orderId);
            });
    }

    function closeConfirmForm() {
        overlay.style.display = "none";
        confirmForm.style.display = "none";
    }