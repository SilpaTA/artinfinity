<section id="hero" class="hero section">
  <?php if (has_post_thumbnail()) : 
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $thumbnail_id = get_post_thumbnail_id(get_the_ID());
    $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
  ?>
    <img src="<?php echo esc_url($featured_image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>" data-aos="fade-in" class="">
  <?php else : ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/home/img/hero-bg.jpg" alt="Default Hero Background" data-aos="fade-in" class="">
  <?php endif; ?>
  <div class="container d-flex flex-column align-items-center text-center mt-auto">
    <?php if(is_front_page())  { ?>
        <h1 data-aos="fade-up" data-aos-delay="100" class="">THE COLOR<br><span>PALLETE</span></h1>
        <p data-aos="fade-up" data-aos-delay="200">Welcome to Color Palette, where every stroke of the brush tells a story and every artist finds their canvas.</p>
    <?php } else { ?>
        <h1 data-aos="fade-up" data-aos-delay="100" class=""><?php the_title(); ?></h1>
    <?php } ?>
   
  </div>
  <div class="about-info mt-auto position-relative">
    <div class="container position-relative" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-6">
          <h2>Together, let's paint a brighter, more colorful world.</h2>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->
