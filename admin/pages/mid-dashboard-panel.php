<main>
  <h1>Dashboard</h1>
  <div class="date">
    <input type="date" name="" id="" />
  </div>

  <!-- START of insights section-->
  <section class="insights">
    <!-- START of sales-card -->
    <div class="card sales-card">
      <i class="fa-solid fa-chart-line"></i>
      <div class="middle">
        <div class="left">
          <h3>Totla Sales</h3>
          <h2 id="total-sales">350,00K Ks</h2>
        </div>
        <div class="progress">
          <svg>
            <circle cx="38" cy="38" r="36"></circle>
          </svg>
          <div class="number">
            <p>81%</p>
          </div>
        </div>
      </div>
      <small class="text-muted"> Last 24 Hours </small>
    </div>
    <!-- END of sales-card -->

    <!-- START of expenses-card -->
    <div class="card expenses-card">
      <i class="fa-solid fa-chart-simple"></i>
      <div class="middle">
        <div class="left">
          <h3>Total Expenses</h3>
          <h2 id="total-sales">150,00K Ks</h2>
        </div>
        <div class="progress">
          <svg>
            <circle cx="38" cy="38" r="36"></circle>
          </svg>
          <div class="number">
            <p>44%</p>
          </div>
        </div>
      </div>
      <small class="text-muted"> Last 24 Hours </small>
    </div>
    <!-- END of expenses-card -->

    <!-- START of income-card -->
    <div class="card income-card">
      <i class="fa-solid fa-magnifying-glass-dollar"></i>
      <div class="middle">
        <div class="left">
          <h3>Total Income</h3>
          <h2 id="total-sales">350,00K Ks</h2>
        </div>
        <div class="progress">
          <svg>
            <circle cx="38" cy="38" r="36"></circle>
          </svg>
          <div class="number">
            <p>81%</p>
          </div>
        </div>
      </div>
      <small class="text-muted"> Last 24 Hours </small>
    </div>
    <!-- END of income-card -->
  </section>

  <!-- END of insights section -->

  <!-- START of recent-order table section-->
  <section class="recent-order">
    <h2>Recent Orders</h2>
    <table id="recent-order-table">
      <thead>
        <tr>
          <th>No.</th>
          <th>Order ID</th>
          <th>Customer</th>
          <th>Payment</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <?php
      $orders = 4;
      for ($i = 1; $i <= $orders; $i++) {
      ?>
        <tr>
          <td><?php echo  $i ?></td>
          <td>85631</td>
          <td>Kyaw Kyi</td>
          <td>K Pay</td>
          <td class="warning">Pending</td>
          <td class="primary">
            <a href="#">View Details</a>
          </td>
        </tr>

      <?php
      }
      ?>
      </tbody>
    </table>
    <a href="#">Show All</a>
  </section>
  <!-- END of recent-order table section-->
</main>