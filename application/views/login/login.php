<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Proposta | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">

        <div class="col-md-8 col-md-offset-2">
            <?php if ($formErrors) { ?>
                <div class="alert alert-danger">
                    <?= $formErrors ?>
                </div>
                <?php
            } else {
                if ($this->session->flashdata('success_msg')) {
                    ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success_msg') ?>
                    </div>
                    <?php
                }
            }
            ?>

        </div> 
        <div class="login-box">
            <div class="login-logo">
                <figure>
                    <img src="<?php echo base_url() ?>assets/imagens/logo.png" height="50%" width="50%" alt="Logo" title="Logo"/>
                </figure>  
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Digite seu e-mail e sua senha para continuar</p>

                <form action="<?php echo base_url() ?>index.php/login/login" method="post">
                    <div class="form-group has-feedback">
                        <input name="email" type="text" class="form-control" placeholder="E-mail" value="<?php echo set_value('login'); ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="senha" type="password" class="form-control" placeholder="Senha" value="">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Lembrar senha
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <?php echo form_close() ?>


                    <a href="#">Esqueci minha senha</a><br>

                    </div>
                    <!-- /.login-box-body -->
                    </div>
                    <!-- /.login-box -->

                    <!-- jQuery 3 -->
                    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
                    <!-- Bootstrap 3.3.7 -->
                    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
                    <!-- iCheck -->
                    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
                    <script>
                        $(function () {
                            $('input').iCheck({
                                checkboxClass: 'icheckbox_square-blue',
                                radioClass: 'iradio_square-blue',
                                increaseArea: '20%' // optional
                            });
                        });
                    </script>
                    </body>
                    </html>
