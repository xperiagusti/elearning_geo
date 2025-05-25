<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | DISASTER.CO</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/styleku.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  
  <script src="<?php echo base_url();?>assets/modules/jquery.min.js"></script>
    <!-- Select 2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  

  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/modules/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/modules/ionicons/css/ionicons.min.css">

  <!-- Template CSS -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/stylebaru.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">


<!-- JavaScript Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>


<!-- /END GA -->
</head>
<style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
<body >
  <div id="app" >
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg " style="     background: rgb(29,49,91);
      background: linear-gradient(90deg, rgba(29,49,91,1) 0%, rgba(50,80,129,1) 47%, rgba(29,49,91,1) 100%);    "></div>
      <nav class="navbar navbar-expand-lg main-navbar" >
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <!-- <img alt="image" src="<?php echo base_url();?>./assets/img/avatar/avatar-5.png" class="rounded-circle mr-1"> -->
            <div class="d-sm-none d-lg-inline-block">Hai, <?php echo $user['nama_depan']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Menu</div>              
                <div class="dropdown-divider"></div>
                <a href="<?php echo base_url(); ?>admin/editUser" class="dropdown-item has-icon text-primary">
                  <i class="fa fa-cog"></i> Setting Akun 
                </a>
                <a href="<?php echo base_url('')."admin/akun/ubah";?>" class="dropdown-item has-icon text-primary">
                  <i class="fa fa-cog"></i> Ubah Pass 
                </a>
                <a href="<?php echo base_url('')."admin/logout";?>" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
          </li>
        </ul>
      </nav>
