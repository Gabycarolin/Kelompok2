<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/jqvmap/jqvmap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/summernote/summernote-bs4.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('home'); ?>" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('Home/listCustomer'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Lapangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Informasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Admin</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Aksi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('home/daftar');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftarkan Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password</p>
                </a>
              </li>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Data Booking
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#data-belumlunas" data-toggle="tab">Transaksi belum lunas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#data-lunas" data-toggle="tab">Transaksi apa</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="data-belumlunas"
                       style="position: relative; height: 300px;">
                     <table class="table table-responsive">
                        <tr>
                          <th class="text-center">ID Booking</th>
                          <th class="text-center">ID Customer</th>
                          <th class="text-center">Nama Lapangan</th>
                          <th class="text-center">Waktu Mulai</th>
                          <th class="text-center">Waktu Berakhir</th>
                          <th class="text-center">Durasi</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Aksi</th>
                        </tr>

                        <?php 
                        
                          foreach($dataBooking as $row){
                        
                        ?>
                        
                        <tr>
                          <td><?= $row->id_booking; ?></td>
                          <td><?= $row->id_cust; ?></td>
                          <td><?= $row->nama_lapangan; ?></td>
                          <td><?= $row->waktu_mulai; ?></td>
                          <td><?= $row->waktu_berakhir; ?></td>
                          <td><?= $row->total_durasi; ?></td>
                          <td><?= $row->total_harga; ?></td>
                          <td><?= $row->status; ?></td>
                          <td><a class="btn btn-success" href="#">Lunas</a></td>
                        </tr>
                        <?php } ?>

                     </table>
                      <!-- <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas> -->
                   </div>
                  <div class="chart tab-pane" id="data-lunas" style="position: relative; height: 300px;">
                    <table class="table table-responsive">
                        <tr>
                          <th class="text-center">ID Booking</th>
                          <th class="text-center">ID Customer</th>
                          <th class="text-center">Nama Lapangan</th>
                          <th class="text-center">Waktu Mulai</th>
                          <th class="text-center">Waktu Berakhir</th>
                          <th class="text-center">Durasi</th>
                          <th class="text-center">Harga</th>
                          <th class="text-center">Status</th>
                        </tr>

                        <?php 
                        foreach($dataLunas as $row){
                        ?>
                        
                        <tr>
                          <td><?= $row->id_booking; ?></td>
                          <td><?= $row->id_cust; ?></td>
                          <td><?= $row->nama_lapangan; ?></td>
                          <td><?= $row->waktu_mulai; ?></td>
                          <td><?= $row->waktu_berakhir; ?></td>
                          <td><?= $row->total_durasi; ?></td>
                          <td><?= $row->total_harga; ?></td>
                          <td><?= $row->status; ?></td>
                        </tr>
                      <?php  } ?>

                     </table>
                    <!-- <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas> -->                         
                  </div>  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            
            <!-- /.card -->

            <!-- solid sales graph -->
    
            <!-- /.card -->

            <!-- Calendar -->
            
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js')?>"></script>
</body>
</html>
