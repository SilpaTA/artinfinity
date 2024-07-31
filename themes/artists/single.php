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
        <li class="nav-item" role="presentation">
          <a class="nav-link active" href="#tabs-1-1" data-toggle="tab">
            <span class="nav-link-main">gallery</span>
          </a>
        </li>
      </ul>
      <!-- Tab panes-->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="tabs-1-1">
          <div class="tabs-custom tabs-horizontal tabs-gallery hide-on-modal" id="tabs-galery">
            <!-- Nav tabs-->
            <!-- Single Post Gallery -->
            <div class="gallery-wrap">
              <div class="gallery-wrap-inner">
                <h4> <?php echo esc_html(get_the_title()); ?> </h4>
                <div class="dots-custom"></div>
                <!-- <a class="back-to-gallery button-link button-link-icon" href="#"><span class="novi-icon icon icon-primary fa fa-angle-left"></span><span>
								<?php //esc_html_e('back to gallery'); ?></span></a> -->
              </div>
              <div class="gallery-wrap-inner">
                <!-- Owl Carousel -->
                <div class="owl-carousel owl-gallery" data-items="1" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-lightgallery="group" data-pagination-class=".dots-custom"> <?php
            $post_id = get_the_ID();
            $galimages = get_field('add_painting_images', $post_id);
            if ($galimages) {
                foreach ($galimages as $image) {
                    $full_image_url = $image['full_image_url'];
                    $img_small = acf_photo_gallery_resize_image($full_image_url, 970, 524); ?> <a class="gallery-item" href="
										<?php echo esc_url($full_image_url); ?>" data-lightgallery="item">
                    <figure>
                      <img src="
												<?php echo esc_url($full_image_url); ?>" alt="
												<?php echo esc_attr(get_the_title($post_id)); ?>" width="970" height="524" />
                    </figure>
                    <div class="caption">
                      <span class="icon novi-icon fa-expand"></span>
                    </div>
                  </a> <?php
                }
            } else { ?> <p> <?php esc_html_e('No images found for this post'); ?> </p> <?php } ?> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> <?php get_footer();
?>