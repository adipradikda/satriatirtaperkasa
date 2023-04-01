<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard - Satria Tirta Perkasa</title>
        <?php $this->load->view('administrator/layouts/_css'); ?>
        <style type="text/css">
            .card .icon{
                text-align: center;
                font-size: 100px !important;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view('administrator/layouts/header'); ?>
        <div id="layoutSidenav">
        <?php $this->load->view('administrator/layouts/sidebar'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Satria Tirta Perkasa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php echo base_url('daily_report'); ?>">
                                    <div class="card">
                                      <div class="icon"><i class="fas fa-book"></i></div>
                                      <div class="card-body">
                                        <p class="card-text text-center">Daily Report</p>
                                      </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="<?php echo base_url('improvment'); ?>">
                                    <div class="card text-success">
                                      <div class="icon"><i class="fas fa-file-text"></i></div>
                                      <div class="card-body text-center">
                                        <p class="card-text">Improvment</p>
                                      </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-6 mb-4 mt-4">
                                <a href="<?php echo base_url('charts'); ?>">
                                    <div class="card">
                                      <div class="icon"><i class="fas fa-chart-area"></i></div>
                                      <div class="card-body">
                                        <p class="card-text text-center">Charts</p>
                                      </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
        <?php $this->load->view('administrator/layouts/footer'); ?>
            </div>
        </div>
        <?php $this->load->view('administrator/layouts/_js'); ?>
    </body>
</html>
