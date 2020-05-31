<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminFutsal | Ubah Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>assets/index2.html"><b>Admin</b>Futsal</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">

                <center>
                    <h3>Ubah Password</h3>
                </center>
                <br>

                <!-- alert sukses -->
                <?= $this->session->flashdata('sukses'); ?>

                <!-- alert password baru -->
                <?= form_error('pass_baru', '<div class=" alert alert-danger" role="alert">', '</div>'); ?>
                <?= form_error('confirm_pass', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <form action="<?php echo base_url('ubahPassword') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="password" label="pass1" class="form-control" name="pass_baru" placeholder="Masukkan Password Baru">
                        <!-- <div class="alert">
                            <span class="fas fa-lock"></span>
                        </div> -->
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" label="pass2" class="form-control" name="confirm_pass" placeholder="Konfirmasi Password">
                        <!-- <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <p class="mb-1">
                                <a href="<?= base_url('lupaPassword') ?>">Kembali</a>
                            </p>
                        </div>
                        <div class="col-4">
                            <button type="submit" value="reset password" class="btn btn-primary btn-block">Verifikasi</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <!-- /.login-card-body -->
                </form>
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>