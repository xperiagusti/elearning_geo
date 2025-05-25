<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DISNAKER KOTA SEMARANG</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cssku/style.css">
</head>

<body style=" background: rgb(184,17,24);
background: linear-gradient(90deg, rgba(184,17,24,1) 0%, rgba(231,45,57,1) 50%, rgba(184,17,24,1) 100%);  ">
    <!-- Sign up form -->
    <section class="signup" >
        <div class="container  mt-5"  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="signup-content">
                <div class="signup-form" style="margin-top: 7%;">
                    <h3 class="form-title text-center">Lupa Password</h3>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" class="register-form" id="register-form">

                        <div class="card-body">

                            <form method="post" action="<?= base_url('auth/forgotPass'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Masukkan email anda"  />
                                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                                </div>

                                <div class="form-group form-button text-center">
                                    <input style="background : #e72d39" type="submit" name="signup" id="signup" class="form-submit" value="Reset Password" />
                                </div>
                            </form>
                        </div>

                    </form>

                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url(); ?>assets/image/forgot.jpg" alt="sing up image"></figure>

                </div>
            </div>
    </section>

    <!-- JS -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jsku/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>