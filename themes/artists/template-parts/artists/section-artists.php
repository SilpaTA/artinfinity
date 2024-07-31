<section id="artists" class="speakers section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Meet the Artists</h2>
    <p>
    Join us for an exclusive opportunity to meet the talented artists who bring their unique visions to life. 
    Engage in conversations that delve into their creative processes, inspirations, and the stories behind their masterpieces</p>
  </div><!-- End Section Title -->
  <div class="container">
    <div class="row justify-content-center gy-4">
    <?php
      $blogusers = get_users( array( 'role__in' => array( 'artisteditor' ) ) );
      foreach ( $blogusers as $user ) { 
        // Get custom field value for profile image
        $profile_image = get_field('profile_image', 'user_' . $user->ID);
        $fb = get_field('facebook', 'user_' . $user->ID);
        $insta = get_field('instagram', 'user_' . $user->ID);
        $twitter = get_field('twitter', 'user_' . $user->ID);
        $youtube = get_field('youtube', 'user_' . $user->ID);
        $linkedin = get_field('linkedin', 'user_' . $user->ID);
      ?>
      <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <?php if ($profile_image) : ?>
            <img src="<?php echo esc_url($profile_image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($user->display_name); ?>">
          <?php else : ?>
            <!-- If no profile image is found -->
            <img src="<?php echo get_template_directory_uri(); ?>/default-profile-image.jpg" class="img-fluid" alt="Default Profile Image">
          <?php endif; ?>
          <div class="member-info">
            <div class="member-info-content">
              <h4><a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>" target="_blank"><?php echo esc_html($user->display_name); ?></a></h4>
            </div>
            <div class="social">
              <?php if($fb) :?>
                <a href="<?php echo $fb; ?>"><i class="bi bi-facebook"></i></a>
              <?php endif; if($insta) : ?>
                <a href="<?php echo $insta; ?>"><i class="bi bi-instagram"></i></a>
              <?php endif; if($twitter) :?>
                <a href="<?php echo $twitter; ?>"><i class="bi bi-twitter-x"></i></a>
              <?php endif; if($youtube) : ?>
                <a href="<?php echo $youtube; ?>"><i class="bi bi-youtube"></i></a>
              <?php endif; if($linkedin) :?>
                <a href="mailto:<?php echo $linkedin; ?>"><i class="bi bi-linkedin"></i></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->
    <?php } ?>
    <div class="btn-wrap col-lg-12 text-center mt-5">
        <a href="<?php echo get_site_url(); ?>/artists/" class="btn btn-more">View All Artists</a>
    </div>
  </div>
</div>
</section><!-- /Artists -->