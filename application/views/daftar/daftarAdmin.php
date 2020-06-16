<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Daftar Owner Baru</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftarkan Admin Baru</p>

      <form action="<?= base_url('Auth/daftar')?>" method="post">
        <div class=" mb-3">
          <input type="text" class="form-control" name="namaF" placeholder="Nama" value="<?= set_value('namaF'); ?>">
          <?= form_error('namaF', '<small class="text-danger">', '</small>');?>
        </div>
          
        <div class=" mb-3">
          <input type="text" class="form-control" name="alamatF" placeholder="Alamat" value="<?= set_value('alamatF');?>">
          <?= form_error('alamatF', '<small class="text-danger">', '</small>');?>
        </div>

        <div class=" mb-3">
          <input type="number" class="form-control" name="telpF" placeholder="Telepon" value="<?= set_value('telpF'); ?>">
        <small class="text-danger"><?= form_error('telpF');?></small>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="usernameF" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="emailF" placeholder="Email">
          <small class="text-danger"><?= form_error('emailF');?></small>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="passwordF" placeholder="Password">
          <?= form_error('passwordF', '<small class="text-danger">', '</small>');?>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            <!-- <button href="<?= base_url('dashboard/dataOwn')?>" class=" btn-block">Kembali ke Dashboard</button> -->
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
