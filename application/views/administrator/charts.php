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
                <i class="fas fa-chart-area me-1"></i> Hasil Flow Rate
              </div>
              <div class="card-body">
                <canvas id="flow_inlet_outlet" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="flowrate" name="tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="flowrate" name="bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> Inlet Outlet
              </div>
              <div class="card-body">
                <canvas id="inlet_outlet" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="i_o" name="i_o_tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="i_o" name="i_o_bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> Chemical
              </div>
              <div class="card-body">
                <canvas id="chemical" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="chemical" name="chemical_tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="chemical" name="chemical_bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> MBBR
              </div>
              <div class="card-body">
                <canvas id="mbbr" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="mbbr" name="mbbr_tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="mbbr" name="mbbr_bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> Hasil Olahan Sludge
              </div>
              <div class="card-body">
                <canvas id="hos" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="hos" name="hos_tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="hos" name="hos_bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area me-1"></i> Buang Limbah di Sumpit
              </div>
              <div class="card-body">
                <canvas id="bls" width="100%" height="30"></canvas>
              </div>
              <select class="form-select filter" data-type="bls" name="bls_tahun">
                  <?php
                      foreach(range(2000, (int)date("Y")) as $year) {
                          $selected = $year == date('Y') ? ' selected' : '';
                          echo "\t<option value='".$year."'".$selected.">".$year."</option>\n\r";
                      }
                  ?>
              </select>
              <select class="form-select filter" data-type="bls" name="bls_bulan">
                  <?php
                      foreach (arr_bulan() as $k => $v) {
                          $selected = $k == (int) date('m') ? ' selected' : '';
                          echo "\t<option value='".$k."'".$selected.">".$v."</option>\n\r";
                      }
                  ?>
              </select>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            <div class="row">
              <div class="col-lg-6">
              </div>
            </div>
          </div>
        </main> <?php $this->load->view('administrator/layouts/footer'); ?>
      </div>
    </div> <?php $this->load->view('administrator/layouts/_js'); ?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
      var base_url = "<?php echo base_url(); ?>";
      var option_line = {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              maxTicksLimit: 5
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: true,
          position : 'bottom',
        }
      };
      $(document).ready(function(){
        flow_inlet_outlet();
        inlet_outlet();
        chemical();
        mbbr();
        hos();
        bls();
      })

      // chart flowrate
      var ctx = document.getElementById("flow_inlet_outlet");
      var chart_flow_inlet_outlet = new Chart(ctx, {
        type: 'line',
        options: option_line,
      });
      function flow_inlet_outlet(){
        var tahun = $('[name="tahun"] option:selected').val();
        var bulan = $('[name="bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_flow_inlet_outlet/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_flow_inlet_outlet.data = res;
          chart_flow_inlet_outlet.update();
        });
      }

      //inlet outlet
      var ctx = document.getElementById("inlet_outlet");
      var chart_inlet_outlet = new Chart(ctx, {
        type: 'line',
        options: option_line,
      });

      function inlet_outlet(){
        var tahun = $('[name="i_o_tahun"] option:selected').val();
        var bulan = $('[name="i_o_bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_inlet_outlet/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_inlet_outlet.data = res;
          chart_inlet_outlet.update();
        });
      }

    //chemical
      var ctx = document.getElementById("chemical");
      var chart_chemical = new Chart(ctx, {
        type: 'line',
        options: option_line,
      });

      function chemical(){
        var tahun = $('[name="chemical_tahun"] option:selected').val();
        var bulan = $('[name="chemical_bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_chemical/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_chemical.data = res;
          chart_chemical.update();
        });
      }

      //mbbr
      var ctx = document.getElementById("mbbr");
      var chart_mbbr = new Chart(ctx, {
        type: 'line',
        options: option_line,
      });

      function mbbr(){
        var tahun = $('[name="mbbr_tahun"] option:selected').val();
        var bulan = $('[name="mbbr_bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_mbbr/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_mbbr.data = res;
          chart_mbbr.update();
        });
      }

      //hasil olahan sludge
      var ctx = document.getElementById("hos");
      var chart_hos = new Chart(ctx, {
        type: 'line',
        options: option_line,
      });

      function hos(){
        var tahun = $('[name="hos_tahun"] option:selected').val();
        var bulan = $('[name="hos_bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_hos/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_hos.data = res;
          chart_hos.update();
        });
      }

      //buang limbah 
      var ctx = document.getElementById("bls");
      var chart_bls = new Chart(ctx, {
        type: 'bar',
        options: option_line,
      });

      function bls(){
        var tahun = $('[name="bls_tahun"] option:selected').val();
        var bulan = $('[name="bls_bulan"] option:selected').val();
        $.ajax({
          url: base_url+"chart_bls/"+tahun+"/"+bulan,
          method:'get',
          dataType: "json"
        }).done(function(res) {
          chart_bls.data = res;
          chart_bls.update();
        });
      }
      //filter
      $(document).on('change','.filter',function(){
        var type = $(this).attr('data-type');
        switch(type){
          case 'flowrate':
            flow_inlet_outlet();
            break;
          case 'i_o':
            inlet_outlet();
            break;
          case 'chemical':
            chemical();
            break;
          case 'mbbr':
            mbbr();
            break;
          case 'hos':
            hos();
            break;
          case 'bls':
            bls();
            break;
        }
      })
    </script>
  </body>
</html>