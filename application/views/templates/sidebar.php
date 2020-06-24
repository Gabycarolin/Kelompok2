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
          <a href="#" class="d-block">
              
              <?= $this->session->userdata('nama');?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">            
            <a href="<?= base_url('dashboard/dataProfil'); ?>" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Profil
                <i class="right fas"></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($this->session->userdata('level')=='1'){;?>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/dataBooking'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/dataCust'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/dataOwn')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Owner</p>
                </a>
              </li>
              <?php }else{ ?>
                <li class="nav-item">
                <a href="<?= base_url('dashboard/dataBooking'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/rekapTrx'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Rekap Transaksi</p>
                </a>
              </li>
            <?php } ?>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas"></i>
              <p>
                Dashboard Lapangan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('dashboard/dataLap'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Lapangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('dashboard/tambahLapangan'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Lapangan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Lapangan</p>
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
              <?php if($this->session->userdata('level') == '1'){ ?>
              <li class="nav-item">
                <a href="<?= base_url('auth/daftar')?>" class="nav-link">
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
                <a href="<?= base_url('auth/keluar'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            <?php }else{ ?>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('auth/keluar'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            <?php } ?>
             
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>