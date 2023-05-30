<?php
if (!isset($_SESSION)) {
    session_start();
}

require "../dao/connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require "./components/base-link.php" ?>
    <link rel="stylesheet" href="css/checkout-form.css">
    <link rel="stylesheet" href="css/feature-section.css">
    <link rel="stylesheet" href="css/newsletter.css">

</head>

<body>
    <?php

    define('COMPONENTS_PATH', './pages/');

    require COMPONENTS_PATH . 'navbar.php';

    ?>
    <section class="checkout-form-section">
        <h2 class="title"> Checkout Form </h2>
        <form action="./controller/order_controller.php" method="POST" class="checkout-form">
            <table>

                <tr>
                    <td rowspan="3"> <label for="">Shipping address</label></td>
                    <td> <input type="text" name="street" placeholder="Street" class="shipping-address"> </td>
                </tr>

                <tr>
                    <td> <input type="text" name="township-or-quarter" placeholder="Township/Quarter" class="shipping-address" required> </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="city" placeholder="City" class="shipping-address">
                    </td>
                </tr>
                <tr>
                    <td> <label for="additional-req">Additional request</label></td>
                    <td> <textarea name="additional-req" id="additional-req"" cols=" 30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td> <label for="payment">Payment method: </label> </td>
                    <td>
                        <label for="Cash-on-delivery">Cash On Delivery</label>
                        <input type="radio" name="payment" id="Cash-on-delivery" checked value="Cash on delivery" onclick="hidePaymentFields()">
                        <label for="k-pay">KBZ-Pay</label>
                        <input type="radio" name="payment" id="k-pay" value="K-pay" onclick="showPaymentFields()" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="kPayFields" style="display: none;">
                            <label for="k-pay-img">Please use Kpay app and scan to pay</label>
                            <img src="../images/Pay/k-pay-barcode.jpg" alt="payment barcode" id="k-pay-barcode-img" required>
                        </div>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="kPayFields" style="display: none;">
                            <label for="transaction-img">Please upload your transaction Image</label>
                            <input type="file" name="transaction-img" required>
                        </div>
                    </td>
                </tr>

            </table>

            <div class="checkout-btn-div">
                <input type="submit" name="checkout" value="Checkout" class="checkout-btn success-bg">
            </div>
        </form>

    </section>

    <?php
    require COMPONENTS_PATH . 'feature-section.html';
    require COMPONENTS_PATH . 'newsletter.html';
    require COMPONENTS_PATH . 'footer.html';
    ?>
    <script>
        function showPaymentFields() {
            var paymentFields = document.getElementsByClassName("kPayFields");
            for (var i = 0; i < paymentFields.length; i++) {
                paymentFields[i].style.display = "block";
            }
        }

        function hidePaymentFields() {
            var paymentFields = document.getElementsByClassName("kPayFields");
            for (var i = 0; i < paymentFields.length; i++) {
                paymentFields[i].style.display = "none";
            }
        }
    </script>
    <script src="scripts/navbar.js"> </script>
    <script src="scripts/footer.js"></script>
</body>

</html>