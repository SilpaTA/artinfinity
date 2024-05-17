<?php get_header(); ?>
  <!-- Page Header-->
  <header class="section page-header">
        <div class="container">
          <div class="row justify-content-between align-items-end row-30">
            <div class="col-12 col-md-6">
            <?php
            $profile_name = get_field('full_name');
            if($profile_name)
            ?>
            <h1 class="brand-logo"><?php echo $profile_name; ?></h1>
            </div>
            <div class="col-12 col-md-6 col-xl-4">
              <div class="head-title">
                <p>Bringing life to canvas with the meticulous artistry of realism.</p>
              </div>
            </div>
          </div>
        </div>
      </header>
<section class="section section-xs">
        <div class="container">
          <!-- Bootstrap tabs-->
          <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
            <!-- Nav tabs-->
            <ul class="nav nav-tabs">
              <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab"><span class="nav-link-main">gallery</span></a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab"><span class="nav-link-main">about me</span></a></li>
              <!-- <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab"><span class="nav-link-main">services</span></a></li> -->
              <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-4" data-toggle="tab"><span class="nav-link-main">contacts</span></a></li>
            </ul>
            <!-- Tab panes-->
            <div class="tab-content">
              <div class="tab-pane fade show active" id="tabs-1-1">
                <div class="tabs-custom tabs-horizontal tabs-gallery hide-on-modal" id="tabs-galery">
                  <!-- Nav tabs-->
                  
                  <?php
                  get_template_part( 'template-parts/artists/artists', 'gallery' ); ?>



                    
                  
       
                </div>
              </div>
              <div class="tab-pane fade" id="tabs-1-2">
                <div class="content-box hide-on-modal">
                  <div class="content-box-inner">
                    <div class="row align-items-center row-30 row-md-30">
                      <div class="col-12 col-md-6 col-lg-7">
                        <?php
                          $profilename = get_field('full_name'); 
                          $profileimg = get_field('profile_image'); 
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
                        <?php $description = get_field('about_artist');
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
                              <?php $description = get_field('about_artist');
                        if($description ) echo $description ;?>
                            </div>
                          </div>
                        </div><a class="close-modal-content-box" href="#" data-dismiss="modal">x</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabs-1-3">
                <div class="content-box hide-on-modal">
                  <div class="content-box-inner row-30">
                    <h3>Services Overview</h3>
                    <div class="row align-items-center row-30">
                      <div class="col-12 col-md-6">
                        <div class="unit service-box">
                          <div class="unit-left"><span class="novi-icon icon icon-lg fa-clock-o"></span></div>
                          <div class="unit-body"><a class="subtitle" href="#" data-toggle="modal" data-target="#modal-service-1">bermodi tempora incidunt ut labore et dolore magna maliquam</a>
                            <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore et dolore magnam. Naliquam quae.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="unit service-box">
                          <div class="unit-left"><span class="novi-icon icon icon-lg fa-cloud"></span></div>
                          <div class="unit-body"><a class="subtitle" href="#" data-toggle="modal" data-target="#modal-service-2">cidunt ut labore t dolore magna maliqua mquaerat voleneni.</a>
                            <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore et dolore magnam. Naliquam quae.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="unit service-box">
                          <div class="unit-left"><span class="novi-icon icon icon-lg fa-bell"></span></div>
                          <div class="unit-body"><a class="subtitle" href="#" data-toggle="modal" data-target="#modal-service-3">empora incidunt ut labore et dolore magna maliquam lroep oirta.</a>
                            <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore et dolore magnam. Naliquam quae.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="unit service-box">
                          <div class="unit-left"><span class="novi-icon icon icon-lg fa-image"></span></div>
                          <div class="unit-body"><a class="subtitle" href="#" data-toggle="modal" data-target="#modal-service-4">dunt ut labore et dolore magna aliquam lroep oirta lreo prota.</a>
                            <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore et dolore magnam. Naliquam quae.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><a class="close-content-box" href="#">x</a>
                </div>
                <div class="modal slideUp" id="modal-service-1" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="content-box">
                        <div class="content-box-inner">
                          <div class="row">
                            <div class="col-12">
                              <h3>bermodi tempora incidunt ut labore et dolore magna maliquam</h3>
                              <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae.</p>
                              <p>Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempo. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea</p>
                            </div>
                          </div>
                        </div><a class="close-modal-content-box" href="#" data-dismiss="modal">x</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal slideUp" id="modal-service-2" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="content-box">
                        <div class="content-box-inner">
                          <div class="row">
                            <div class="col-12">
                              <h3>cidunt ut labore t dolore magna maliqua mquaerat voleneni.</h3>
                              <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae.</p>
                              <p>Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempo. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea</p>
                            </div>
                          </div>
                        </div><a class="close-modal-content-box" href="#" data-dismiss="modal">x</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal slideUp" id="modal-service-3" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="content-box">
                        <div class="content-box-inner">
                          <div class="row">
                            <div class="col-12">
                              <h3>empora incidunt ut labore et dolore magna maliquam lroep oirta.</h3>
                              <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae.</p>
                              <p>Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempo. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea</p>
                            </div>
                          </div>
                        </div><a class="close-modal-content-box" href="#" data-dismiss="modal">x</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal slideUp" id="modal-service-4" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="content-box">
                        <div class="content-box-inner">
                          <div class="row">
                            <div class="col-12">
                              <h3>dunt ut labore et dolore magna aliquam lroep oirta lreo prota.</h3>
                              <p>Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae.</p>
                              <p>Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea commodi consequatur. Aquis autem vel eum iure reprehenderit, muytasas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempo. Asas dresasaser. Esse, quam nihil molestiae consequatur, vel illum. Dastqui dolorem ipsumquia dolsitmet conse tequam eius. Asmodi tempora incid. Dent ut labore t dolore magnam. Naliquam quae. Rat voleneni ullam corporis suscipit labasic ut aliquidea</p>
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
                    <div class="col-12 col-md-12">
                      <h3>Contact Info</h3>
                      <!-- <address class="subtitle">8901 Marmora Road,<br> Glasgow, D04 89GR.</address> -->
                      <ul class="contact-info">
                        <?php 
                            $phonenumber = get_field('phone_number');
                            $emailid = get_field('email_id');
                            $fb = get_field('facebook');
                            $insta = get_field('instagram');
                            $twitter = get_field('twitter');
                            $youtube = get_field('youtube');
                            $linkedin = get_field('linkedin');
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
                  </div><a class="close-content-box" href="#">x</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section><a class="section section-banner d-xl-none" href="https://www.templatemonster.com/website-templates/monstroid2.html" 
      style="background-image: url(images/banner/background-03-1920x310.jpg); background-image: -webkit-image-set( url(images/banner/background-03-1920x310.jpg) 1x, 
      url(images/banner/background-03-3840x620.jpg) 2x )" target="_blank"><img src="images/banner/foreground-03-1600x310.png" 
      srcset="images/banner/foreground-03-1600x310.png 1x, images/banner/foreground-03-3200x620.png 2x" alt="" width="1600" height="310"></a>
<?php get_footer();
?>