<?php
if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/invoice-form.css" />
  <!-- <link rel="stylesheet" href="../css/cart-list-tbl.css" /> -->
</head>

<body>
  <section id="invoice-pop-section">
    <!-- START of invoice-header-block1  -->
    <div class="header-block block1">
      <div>
      <img src="../../images/cart-arrow-down-solid.svg" alt="" id="invoice-icon">
        <h1>Invoice</h1>
      </div>
      <div class="company-info">
        <h1 class="website-name">H3IN</h1>
        <h5 style="margin: 5px 0;">Business Address</h5>
        <table id="business-address-tbl">
          <tr>
            <td>City</td>
            <td>Taunggyi</td>
          </tr>
          <tr>
            <td>Country</td>
            <td>Myanmar</td>
          </tr>
          <tr>
            <td>Zipcode</td>
            <td>36602</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- END of invoice-header-block1  -->
    <div class="header-block block2">
      <div>
        <h2 style="margin:0 0 5px 0;">Customer</h2>
        <table id="customer-address-tbl">
          <tr>
            <td>Name</td>
            <td>Hein Min Min Maw</td>
          </tr>
          <tr>
            <td>City</td>
            <td>Taunggyi</td>
          </tr>
          <tr>
            <td>Country</td>
            <td>Myanmar</td>
          </tr>
          <tr>
            <td>Zipcode</td>
            <td>36602</td>
          </tr>
        </table>
      </div>
      <div class="company-info">

        <h5>Invoice ID: <span id="invoice-id"> I-2303<span></h5>
        <table class="business-address-tbl">
          <tr>
            <td>Date</td>
            <td>29-May-2023</td>
          </tr>

        </table>
      </div>

    </div>
    <!-- START of invoice-header-block2 -->

    <hr>
    <!-- END of invoice-header-block2 -->

    <section class="order-list-section">
      <table id="order-list-table">
        <thead>
          <th>No.</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Amount (ks)</th>
        </thead>
        <?php
        $serial = 1;
        $total_cost = 0;
        foreach ($_SESSION["cart"] as $key => $value) {
          $price = $value["price"];
          $quantity = $value["Quantity"];
          $subtotal = $price * $quantity;
          $total_cost += $subtotal;
          $formattedSubtotal = number_format($subtotal, 2, ',');
        ?>
          <tr>
            <td><?php echo  $serial++  ?></td>

            <td><?php echo $value["name"]  ?></td>
            <td> <?php echo $value["description"]  ?></td>
            <td><?php echo  $price   ?></td>
            <td>
              <span class="quantity"><?php echo $quantity ?></span>
              </div>
            </td>
            <td class="subtotal-col"><?php echo  $formattedSubtotal  ?></td>
          </tr>
        <?php
        }
        ?>
        <tr id="total-cost-row" class="information">
          <td colspan="4">Total Cost</td>
          <td colspan="2"><?php
                          $_SESSION["total_cost"] =  $total_cost;
                          echo  number_format($total_cost, 2, ',') . ' Ks';
                          ?>
          </td>

        </tr>
      </table>


    </section>
  </section>
  <a id="download-invoice" href="../controller/generate_invoice.php" download="invoice.pdf" >Download the invoice</a>

</body>

</html>