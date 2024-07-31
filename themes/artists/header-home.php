<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
  <?php wp_head(); ?>
</head>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo get_site_url(); ?>" class="logo d-flex align-items-center me-auto">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/colorpallatte_logo_black.png" alt="Color Pallette Logo">
        <!-- Uncomment the line below if you also wish to use an text logo -->
        <!-- <h1 class="sitename">TheEvent</h1>  -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo get_site_url(); ?>/#hero" class="active">Home<br></a></li>
          <li><a href="<?php echo get_site_url(); ?>/#about">About</a></li>
          <li><a href="<?php echo get_site_url(); ?>/#we-offer">What We Offer</a></li>
          <li><a href="<?php echo get_site_url(); ?>/artists">Artists</a></li>
          <li><a href="<?php echo get_site_url(); ?>/#categories">Categories</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="cta-btn d-none d-sm-block" href="#buy-tickets">Buy Tickets</a> -->

    </div>
  </header>
    
