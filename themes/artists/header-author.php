<!DOCTYPE html>
<html class="wide" lang="en">
  <head>
    <!-- Site Title-->
   
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    
    <?php wp_head(); ?>
	<style>
    .ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} 
    html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}
    </style>
</head>
<body>
<div class="ie-panel">
	<a href="http://windows.microsoft.com/en-US/internet-explorer/">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
	</a>
</div>
<?php $bgimg = get_field('background_image');?>
<div class="page bg-image novi-background" <?php if($bgimg){?>style="background-image:url(<?php echo $bgimg['url']; ?>); box-shadow:inset 0 0 0 60000px rgb(0 0 0 / 82%);" <?php }?>>
      <div class="preloader">
        <div class="preloader-body">
          <div class="cssload-container">
            <div class="cssload-speeding-wheel"></div>
          </div>
          <p>Loading...</p>
        </div>
      </div>
<!-- Header-->
<header class="section page-header">
        <div class="container">
          <div class="row justify-content-between align-items-end row-30">
            <div class="col-12 col-md-6">
            <?php
            $current_author_url = $_SERVER['REQUEST_URI'];
            $parts = explode('/', trim($current_author_url, '/'));
            $author_nicename = $parts[count($parts) - 1]; // Assuming the author nicename is the last segment in the URL

            $user = get_user_by('slug', $author_nicename);
            if ($user) {
                $author_id = $user->ID;
                $author_display_name = $user->display_name;
            }
            $profile_name = get_field('full_name');
            if($profile_name){
            ?>
            <h1 class="brand-logo"><?php echo $profile_name; ?></h1>
            <?php } else{ ?>
            <h1 class="brand-logo"><?php echo $author_display_name; ?></h1>
            <?php } ?>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="head-title">
                <p>Bringing life to canvas with the meticulous artistry of realism.</p>
              </div>
            </div>
          </div>
        </div>
      </header>   
    
