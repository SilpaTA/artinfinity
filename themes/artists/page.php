<?php get_header('home'); ?>

<main class="main">
  <?php get_template_part( 'template-parts/artists/section', 'hero' ); ?>
  
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
        $profile_image = get_field('profile_image', 'user_' . $user->ID);
        $description = get_field('about_artist', 'user_' . $user->ID);?>
        <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card-artists">
            <?php if ($profile_image) : ?>
              <img src="<?php echo esc_url($profile_image['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($user->display_name); ?> | Artists Color Pallette">
            <?php else : ?>
              <!-- If no profile image is found -->
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-profile-image.jpg" class="img-fluid" alt="Default Profile Image">
            <?php endif; ?>
            <div class="card-artists-info">
              <h4><?php echo esc_html($user->display_name); ?></h4>
              <?php if($description ) { ?><p><?php echo wp_trim_words( $description, 25, '...' ); ?></p> <?php } ?>
              <a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>" target="_blank" class="btn button">View Profile</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
</main>
<?php get_footer('home');?>