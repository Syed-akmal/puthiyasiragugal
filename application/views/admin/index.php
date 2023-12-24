  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Jumlah Mobil -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total loan Customers</div>
              <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->m_rental->get_data('mobil')->num_rows(); ?></div> -->
              <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $customercount; ?></div>

            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Kostumer -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Loan Amount</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $total_loan_amount_in_process; ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Jumlah Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Balance Loan Amount</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_amount_difference; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Transaksi Selesai -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Savings Customer</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $savingscustomercount; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </div> -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Savings Amount</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_savings_amount_in_process; ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-12">
      <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">EMI Calculator</h6>

        </div>

        <div class="card-body">
          <div class="chart-area">
            <!-- <canvas id="monthlyLoanChart" width="400" height="200"></canvas> -->

            <!-- <canvas id="myAreaChart"></canvas> -->

            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Loan Amount: </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="loan-amount" class="form-control m-input" placeholder="Enter loan amount" required>

              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Annual Interest Rate (%): </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="interest-rate" class="form-control m-input" placeholder="Enter annual interest rate" required>

              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Loan Tenure (Months): </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="loan-tenure" class="form-control m-input" placeholder="Enter loan tenure in months" required>
              </div>
            </div>
            <button onclick="calculateEMI()" class="btn btn-primary">Calculate EMI</button>
            <div class="col-lg-7 mt-4">
              <h3><b> EMI:</b> <span id="emi-result"></span></h3>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col" style="padding: 0">

      <div class="col-12">
        <div class="card shadow mb-4">

          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">EMI Calculator</h6> -->
    <!-- <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Pilih tampilan:</div>
                <a class="dropdown-item" href="#">Tersedia</a>
                <a class="dropdown-item" href="#">Dirental</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Semua mobil</a>
              </div>
            </div> -->
    <!-- </div> -->

    <!-- <ul class="list-group list-group-flush">
            <?php foreach ($mobil as $m) { ?>
              <a href="#" class="list-group-item list-group-item-action">
                <i class="fas fa-car"></i> <?php echo $m->mobil_merk; ?>
                <?php
                if ($m->mobil_status == 1) {
                  echo '<span class="badge badge-pill badge-primary">Tersedia</span>';
                } else {
                  echo '<span class="badge badge-pill badge-danger">Dirental</span>';
                }
                ?>
              </a>
            <?php } ?>
          </ul> -->

    <!-- <div class="card-body">
            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Loan Amount: </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="loan-amount" class="form-control m-input" placeholder="Enter loan amount" required>
                
              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Annual Interest Rate (%): </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="interest-rate" class="form-control m-input" placeholder="Enter annual interest rate" required>
               
              </div>
            </div>

            <div class="form-group m-form__group row">
              <label class="col-lg-4 col-form-label">
                <b> Loan Tenure (Months): </b>
              </label>
              <div class="col-lg-7">
                <input type="number" id="loan-tenure" class="form-control m-input" placeholder="Enter loan tenure in months" required>
              </div>
            </div> -->


    <!-- <label for="loan-amount">Loan Amount (INR):</label>
            <input type="number" id="loan-amount" placeholder="Enter loan amount" required>

            <label for="interest-rate">Annual Interest Rate (%):</label>
            <input type="number" id="interest-rate" placeholder="Enter annual interest rate" required>

            <label for="loan-tenure">Loan Tenure (Months):</label>
            <input type="number" id="loan-tenure" placeholder="Enter loan tenure in months" required> -->

    <!-- <button onclick="calculateEMI()" class="btn btn-primary">Calculate EMI</button>
            <div class="col-lg-7 mt-4">
              <h3><b> EMI:</b> <span id="emi-result"></span></h3>
            </div>
          </div>
        </div>
      </div> -->

    <!-- Status Kostumer -->
    <!-- <div class="col-12">
        <div class="card shadow mb-4">

          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kostumer Baru</h6>
            <div class="dropdown no-arrow">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-header">Pilih tampilan:</div>
                <a class="dropdown-item" href="#">Laki-laki</a>
                <a class="dropdown-item" href="#">Perempuan</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Semua</a>
              </div>
            </div>
          </div>


          <ul class="list-group list-group-flush">
            <?php foreach ($kostumer as $k) { ?>
              <a href="#" class="list-group-item list-group-item-action">
                <i class="far fa-user"></i> <?php echo $k->kostumer_nama; ?>
                <?php
                if ($k->kostumer_jk == 'L') {
                  echo ' <span class="badge badge-primary badge-pill"><i class="fas fa-male"></i></span>';
                } else {
                  echo ' <span class="badge badge-success badge-pill"><i class="fas fa-female"></i></span>';
                }
                ?>
              </a>
            <?php } ?>
          </ul>

        </div>
      </div> -->
    <!-- </div> -->
    <!-- </div> -->

    <!-- Content Row -->
    <!-- <div class="row">
      <div class="col">
      
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Transaksi Terakhir</h6>
              <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                  <div class="dropdown-header">Pilih tampilan:</div>
                  <a class="dropdown-item" href="#">Transaksi Selesai</a>
                  <a class="dropdown-item" href="#">Transaksi Jatuh Tempo</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Semua Transaksi</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tgl Transaksi</th>
                      <th>Kostumer</th>
                      <th>Mobil</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($transaksi as $t) { ?>
                      <tr>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl)); ?></td>
                        <td><?php echo $t->kostumer_nama; ?></td>
                        <td><?php echo $t->mobil_merk; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_pinjam)); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($t->transaksi_tgl_kembali)); ?></td>
                        <td><?php echo 'Rp. ' . number_format($t->transaksi_harga) . ',-'; ?></td>
                        <td><?php echo ($t->transaksi_status == 1) ? 'Selesai' : 'Belum Selesai'; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  </div> -->
    <script src="<?php echo base_url() . 'assets/'; ?>js/demo/chart-area-demo.js"></script>
    <!-- <script src="<?php echo base_url() . 'assets/'; ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- EMI Calculator -->
    <script>
      function calculateEMI() {
        var loanAmount = parseFloat(document.getElementById('loan-amount').value);
        var interestRate = parseFloat(document.getElementById('interest-rate').value);
        var loanTenure = parseFloat(document.getElementById('loan-tenure').value);

        var monthlyInterestRate = (interestRate / 100) / 12;
        var emi = (loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTenure)) / (Math.pow(1 + monthlyInterestRate, loanTenure) - 1);

        document.getElementById('emi-result').innerText = '₹' + emi.toFixed(2);
      }
    </script>

    <!-- Chart  -->
    <script>
      // Parse PHP data to JavaScript variables
      var chartLabels = <?php echo $chartLabels; ?>;
      var chartData = <?php echo $chartData; ?>;

      // Render the chart
      var ctx = document.getElementById('monthlyLoanChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: chartLabels,
          datasets: [{
            label: 'Monthly Loan Count',
            data: chartData,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Fetch data using AJAX
        fetch('<?= base_url('Admin') ?>') // Correct URL to your controller method
          .then(response => response.json())
          .then(data => {
            var months = data.map(item => item.month);
            var counts = data.map(item => item.count);

            var ctx = document.getElementById('myAreaChart').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                labels: months,
                datasets: [{
                  label: 'Monthly Loan Count',
                  data: counts,
                  fill: true,
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  x: {
                    type: 'time',
                    time: {
                      unit: 'month'
                    }
                  },
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          });
      });
    </script>