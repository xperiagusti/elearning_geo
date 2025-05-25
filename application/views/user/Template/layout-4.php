<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg" ></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <a href="" class="navbar-brand sidebar-gone-hide">DISASTER.CO</a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
       
        <form class="form-inline ml-auto">
          <!-- <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Cari Topik E-Knowledge" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div> -->
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?php echo $user['nama_depan']; ?></div></a>
            <!-- <div class="dropdown-menu dropdown-menu-right">
             
              <a href="<?php echo base_url(); ?>dist/features_profile" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?php echo base_url(); ?>dist/features_settings" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('')."user/logout";?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div> -->
          </li>
        </ul>
      </nav>
