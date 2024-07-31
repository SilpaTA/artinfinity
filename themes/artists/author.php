<?php get_header('author'); 
$current_author_url = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($current_author_url, '/'));
$author_nicename = $parts[count($parts) - 1]; // Assuming the author nicename is the last segment in the URL

$user = get_user_by('slug', $author_nicename);
if ($user) {
  $author_id = $user->ID;
}
?>
  <!-- Page Header-->

<section class="section section-xs">
        <div class="container">
          <!-- Bootstrap tabs-->
          <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
            <!-- Nav tabs-->
            <ul class="nav nav-tabs">
              <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab"><span class="nav-link-main">Gallery</span></a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab"><span class="nav-link-main">About Me</span></a></li>
              <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab"><span class="nav-link-main">services</span></a></li> -->
              <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab"><span class="nav-link-main">Contact Me</span></a></li>
            </ul>
            <!-- Tab panes-->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-1-1">
                <div class="tabs-custom tabs-horizontal tabs-gallery hide-on-modal" id="tabs-galery">
                  <!-- Nav tabs-->
                  
                  <?php
                  get_template_part( 'template-parts/artists/gallery', 'new' ); 
                 // get_template_part( 'template-parts/artists/artists', 'gallery' ); 
                  ?>
                </div>
              </div>
              <div class="tab-pane fade" id="tabs-1-2">
                <div class="content-box hide-on-modal">
                  <div class="content-box-inner">
                    <div class="row align-items-center row-30 row-md-30">
                      <div class="col-12 col-md-6 col-lg-7">
                        <?php
                           $profilename = get_field('full_name', 'user_' . $author_id);
                            $profileimg = get_field('profile_image', 'user_' . $author_id);
                        ?>
                        <figure>
                          <?php if($profileimg) { ?>
                            <img src="<?php echo $profileimg['url']; ?>" alt="<?php echo $profilename; ?>" width="504" height="369"/>
                          <?php } else { ?> 
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-01-504x369.jpg" alt="<?php echo $profilename; ?>" width="504" height="369"/>
                          <?php } ?>
                        </figure>
                      </div>
                      <div class="col-12 col-md-6 col-lg-5">
                        <h3>Who I Am</h3>
                        <?php $description = get_field('about_artist', 'user_' . $author_id);
                        if($description ) //echo $description ;?>
                        <p><?php echo wp_trim_words( $description, 40, '...' ); ?></p>
                        
                            <a class="button button-primary button-icon button-icon-left" href="#" data-toggle="modal" data-target="#modal-about-us">
                                <span>More</span><span class="novi-icon icon fa-angle-right"></span></a> 
                      </div>
                    </div>
                  </div><a class="close-content-box" href="#">x</a>
                </div>
                <div class="modal slideUp" id="modal-about-us" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="content-box">
                        <div class="content-box-inner">
                          <div class="row">
                            <div class="col-12">
                              <h3>A Few Words About Me</h3>
                              <?php $description = get_field('about_artist', 'user_' . $author_id);
                              if($description ) echo $description ;?>
                            </div>
                          </div>
                        </div><a class="close-modal-content-box" href="#" data-dismiss="modal">x</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="tabs-1-4">
                <div class="content-box hide-on-modal">
                  <div class="row row-30 justify-content-center align-items-center">
                      <?php if(  $author_id == 4){ ?>
                    <div class="col-12 col-md-7">
                            <?php echo do_shortcode('[contact-form-7 id="f079adb" title="Conatct form-suma"]'); ?>
                    </div>
                    <div class="col-12 col-md-5">
                      <h3>Contact Info</h3>
                      <!-- <address class="subtitle">8901 Marmora Road,<br> Glasgow, D04 89GR.</address> -->
                      <ul class="contact-info">
                        <?php 
                            $phonenumber = get_field('phone_number', 'user_' . $author_id);
                            $emailid = get_field('email_id', 'user_' . $author_id);
                            $fb = get_field('facebook', 'user_' . $author_id);
                            $insta = get_field('instagram', 'user_' . $author_id);
                            $twitter = get_field('twitter', 'user_' . $author_id);
                            $youtube = get_field('youtube', 'user_' . $author_id);
                            $linkedin = get_field('linkedin', 'user_' . $author_id);
                        ?>
                        <?php if($phonenumber) ?>
                            <li><span>Phone:</span><a href="tel:<?php echo $phonenumber; ?>"><?php echo $phonenumber; ?></a></li>
                        <?php if($emailid) ?>
                            <li><span>E-mail:</span><a href="mailto:<?php echo $emailid; ?>"><?php echo $emailid; ?></a></li>
                        </ul>
                        <ul class="list-inline list-inline-xs">
                        <?php if($fb) ?>
                            <li><a class="novi-icon icon-xxs fa-facebook icon" href="<?php echo $fb; ?>"></a></li>
                        <?php if($insta) ?>
                            <li><a class="novi-icon icon-xxs fa-instagram icon" href="<?php echo $insta; ?>"></a></li>
                        <?php if($twitter) ?>
                            <li><a class="novi-icon icon-xxs fa-twitter icon" href="<?php echo $twitter; ?>"></a></li>
                        <?php if($youtube) ?>
                            <li><a class="novi-icon icon-xxs fa-youtube icon" href="<?php echo $youtube; ?>"></a></li>
                        <?php if($linkedin) ?>
                            <li><a class="novi-icon icon-xxs fa-linkedin icon" href="mailto:<?php echo $linkedin; ?>"></a></li>
                      </ul>
                    </div>
                    <?php } else  { ?>
                       <div class="col-12 col-md-5">
                      <h3>Contact Info</h3>
                      <!-- <address class="subtitle">8901 Marmora Road,<br> Glasgow, D04 89GR.</address> -->
                      <ul class="contact-info">
                        <?php 
                            $phonenumber = get_field('phone_number', 'user_' . $author_id);
                            $emailid = get_field('email_id', 'user_' . $author_id);
                            $fb = get_field('facebook', 'user_' . $author_id);
                            $insta = get_field('instagram', 'user_' . $author_id);
                            $twitter = get_field('twitter', 'user_' . $author_id);
                            $youtube = get_field('youtube', 'user_' . $author_id);
                            $linkedin = get_field('linkedin', 'user_' . $author_id);
                        ?>
                        <?php if($phonenumber) { ?>
                            <li><span>Phone:</span><a href="tel:<?php echo $phonenumber; ?>"><?php echo $phonenumber; ?></a></li>
                        <?php } if($emailid) { ?>
                            <li><span>E-mail:</span><a href="mailto:<?php echo $emailid; ?>"><?php echo $emailid; ?></a></li>
                        </ul>
                        <ul class="list-inline list-inline-xs">
                        <?php } if($fb) { ?>
                            <li><a class="novi-icon icon-xxs fa-facebook icon" href="<?php echo $fb; ?>"></a></li>
                        <?php } if($insta) { ?>
                            <li><a class="novi-icon icon-xxs fa-instagram icon" href="<?php echo $insta; ?>"></a></li>
                        <?php } if($twitter) { ?>
                            <li><a class="novi-icon icon-xxs fa-twitter icon" href="<?php echo $twitter; ?>"></a></li>
                        <?php } if($youtube) { ?>
                            <li><a class="novi-icon icon-xxs fa-youtube icon" href="<?php echo $youtube; ?>"></a></li>
                        <?php } if($linkedin) { ?>
                            <li><a class="novi-icon icon-xxs fa-linkedin icon" href="mailto:<?php echo $linkedin; ?>"></a></li>
                            <?php } ?>
                      </ul>
                    </div>
                    <?php } ?>
                  </div><a class="close-content-box" href="#">x</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
<!-- <a class="section section-banner d-xl-none" href="https://www.templatemonster.com/website-templates/monstroid2.html" 
      style="background-image: url(images/banner/background-03-1920x310.jpg); background-image: -webkit-image-set( url(images/banner/background-03-1920x310.jpg) 1x, 
      url(images/banner/background-03-3840x620.jpg) 2x )" target="_blank"><img src="images/banner/foreground-03-1600x310.png" 
      srcset="images/banner/foreground-03-1600x310.png 1x, images/banner/foreground-03-3200x620.png 2x" alt="" width="1600" height="310"></a> -->
<?php $whatsappnum = get_field('whatsapp_number', 'user_' . $author_id); 
if($whatsappnum){ ?>
  <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsappnum;?>&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
<i class="icon fa fa-whatsapp my-float"></i>
</a>
<?php 
}

get_footer();
?>