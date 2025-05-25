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
background: linear-gradient(90deg, rgba(184,17,24,1) 0%, rgba(231,45,57,1) 50%, rgba(184,17,24,1) 100%); ">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container mt-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">New Password</h2>

                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="<?= base_url('auth/changePass'); ?>" class="register-form" id="register-form">
                        <div class="form-group">
                            <label for="password1"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password1" id="password1" placeholder="Enter new password" />
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password2"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password2" id="password2" placeholder="repeat password" />
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group form-button">
                            <input style="background: #e72d39;" type="submit" name="signup" id="signup" class="form-submit" value="Submit" />
                        </div>

                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="<?= base_url(); ?>assets/image/login.jpg" alt="sing up image"></figure>

                </div>
            </div>
        </div>
    </section>

    <!-- JS -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jsku/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>