<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
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
                    <h3>LOGIN</h3>
                </center>
                <br>
                <?php
                $success    = $this->session->flashdata('success');
                $error        = $this->session->flashdata('error');
                $warning    = $this->session->flashdata('warning');

                if ($success) {
                    $alert_status    = 'alert-success';
                    $status            = 'Success!';
                    $message        = $success;
                }

                if ($error) {
                    $alert_status    = 'alert-danger';
                    $status            = 'Error!';
                    $message        = $error;
                }

                if ($warning) {
                    $alert_status    = 'alert-warning';
                    $status            = 'Warning!';
                    $message        = $warning;
                }
                ?>

                <?php if ($success || $error || $warning) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
                                <strong><?= $status ?></strong> <?= $message ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <!--dikirim ke form action 'login auth'-->
                <form action="<?php echo base_url('login/auth') ?>" method="post">
                    <div class="input-group mb-3">
                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email', 'required' => true]) ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?= form_error('email') ?>
                    </div>
                    <div class="input-group mb-3">
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password', 'required' => true]) ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?= form_error('password') ?>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="<?= base_url('LupaPassword') ?>">Lupa Password ?</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('Daftar') ?>" class="text-center">Belum punya akun? Daftar disini!</a>
                </p>
            </div>
            <!-- /.login-card-body -->
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