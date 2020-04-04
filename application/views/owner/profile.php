
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Customer</h1>
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
                  Data Customer
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#data-belumlunas" data-toggle="tab">Transaksi belum lunas</a>
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
                          <th class="text-center">ID Customer</th>
                          <th class="text-center">Nama Customer</th>
                          <th class="text-center">Alamat Customer</th>
                          <th class="text-center">Telepon Customer</th>
                          <th class="text-center">Username Customer</th>
                          <th class="text-center">Email Customer</th>
                        </tr>

                        <?php 
                        
                          foreach($dataOwner as $row){
                        
                        ?>
                        
                        <tr>
                          <td><?= $row->id_futsal; ?></td>
                          <td><?= $row->nama_futsal; ?></td>
                          <td><?= $row->alamat_futsal; ?></td>
                          <td><?= $row->telp_futsal; ?></td>
                          <td><?= $row->username_futsal; ?></td>
                          <td><?= $row->email_futsal; ?></td>
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
