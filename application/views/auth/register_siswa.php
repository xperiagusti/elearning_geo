
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login | DISASTER.CO</title>
  

  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap-social/bootstrap-social.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">

  <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/fontawesome.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/templatemo-grad-school.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section main-banner" style="position:absolute; width:100%" id="top" data-section="section1">
      <!-- <video autoplay muted loop id="bg-video">
          <source src="<?php echo base_url();?>assets2/images/1.mp4" type="video/mp4" />
      </video> -->
      <div id="bg-video" style="background: url('<?php echo base_url("assets2/images/sea.gif"); ?>'); background-size: 100vw 100vh;
        height:100%; 
        background-repeat: no-repeat;" >
         
          
     </div>




       <div class="video-overlay header-text">
        <div class="caption text-left">

        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <!-- <div class="card-header"><h4>Register</h4></div> -->
              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label for="nama_depan">Nama Depan</label>
					 						<input id="nama_depan" type="text" class="form-control" name="nama_depan" autofocus value="<?= set_value('nama_depan');?>">
					  					<small class="form-text text-danger"><?= form_error('nama_depan');?></small>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="nama_belakang">Nama Belakang</label>
					  					<input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="<?= set_value('nama_belakang');?>">
					 						 <small class="form-text text-danger"><?= form_error('nama_belakang');?></small>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
											<input id="email" type="email" class="form-control" name="email" value="<?= set_value('email');?>">
											<small class="form-text text-danger"><?= form_error('email');?></small>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12 col-md-6">
                      <label for="password" class="d-block">Password</label>
					  					<input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1">
					 					 <small class="form-text text-danger"><?= form_error('password1');?></small>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-12 col-md-6">
                      <label for="password2" class="d-block">Konfirmasi Password</label>
						<input id="password2" type="password" class="form-control" name="password2">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: #162e63;
                  border-color: #163063;">
                      Register
                    </button>
                  </div>
								</form>
							<div class="mt-3 text-muted text-center">
              		Have an account? <a href="<?php echo base_url('auth/login');?>">Login</a>
            	</div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?php echo base_url();?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url();?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url();?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url();?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/stisla.js"></script>
  <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url();?>assets/js/custom.js"></script>

  <!-- <script src="<?php echo base_url();?>assets2/jquery/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets2/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url();?>assets2/js/video.js"></script>
</body>
</html>
