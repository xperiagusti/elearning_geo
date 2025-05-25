
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
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
              <!-- <div class="card-header text-center" style="background-color:white"><h3>Login</h3></div> -->
              <div class="card-body">
								<?= $this->session->flashdata('message');?>
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
										<input id="email" type="text" class="form-control" name="email" tabindex="1" autofocus value="<?= set_value('email');?>">
										<small class="form-text text-danger"><?= form_error('email');?></small>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right">
                      </div>
                    </div>
										<input id="password" type="password" class="form-control mb-4" name="password" tabindex="2" >
										<small class="form-text text-danger"><?= form_error('password');?></small>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" style="background-color: #162e63;
                  border-color: #163063;">
                      Login
                    </button>
                  </div>
                  <div class="text-muted text-center">
                    Don't have an account? <a href="<?php echo base_url('auth/register');?>">Create One</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
 

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
