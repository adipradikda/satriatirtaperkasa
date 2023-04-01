<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daily Report - Satria Tirta Perkasa</title> <?php $this->load->view('administrator/layouts/_css'); ?>
  </head>
  <body class="sb-nav-fixed"> <?php $this->load->view('administrator/layouts/header'); ?> <div id="layoutSidenav"> <?php $this->load->view('administrator/layouts/sidebar'); ?> <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <h1 class="mt-4">Satria Tirta Perkasa</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Diagram WWTP PT KERRY CIKARANG</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> Awal Inlet
              </div>
              <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30"></canvas>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i> Bar Chart Example
                  </div>
                  <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="50"></canvas>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card mb-4">
                  <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i> Pie Chart Example
                  </div>
                  <div class="card-body">
                    <canvas id="myPieChart" width="100%" height="50"></canvas>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
              </div>
            </div>
          </div>
        </main> <?php $this->load->view('administrator/layouts/footer'); ?>
      </div>
    </div> <?php $this->load->view('administrator/layouts/_js'); ?> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/assets/demo/chart-area-demo.js"></script>
    <script src="assets/assets/demo/chart-bar-demo.js"></script>
    <script src="assets/assets/demo/chart-pie-demo.js"></script>
  </body>
</html>