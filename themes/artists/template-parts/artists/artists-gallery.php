<?php
$terms = get_terms([
    'taxonomy' => 'type-of-work',
    //'hide_empty' => false,
]);

$i = 1;
if ($terms) { ?>
    <ul class="nav nav-tabs">
        <?php foreach ($terms as $term) {
            $term_img = get_field('category_image', $term);
            ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#tabs-gallery-<?php echo $i; ?>" data-toggle="tab">
                    <?php if ($term_img) { ?>
                        <img src="<?php echo $term_img['url']; ?>" alt="<?php echo $term->name; ?>" width="180" height="180" />
                    <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery-01-180x180.jpg" alt="<?php echo $term->name; ?>" width="180" height="180" />
                    <?php } ?>
                    <span><?php echo $term->name; ?></span>
                </a>
            </li>
        <?php $i++;
        } ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <?php $i = 1;
        foreach ($terms as $term) { ?>
            <div class="tab-pane fade" id="tabs-gallery-<?php echo $i; ?>">
                <div class="gallery-wrap">
                    <div class="gallery-wrap-inner">
                        <h4><?php echo $term->name; ?></h4>
                        <div class="dots-custom-<?php echo $term->slug; ?>"></div>
                        <a class="back-to-gallery button-link button-link-icon" href="#">
                            <span class="novi-icon icon icon-primary fa fa-angle-left"></span>
                            <span>back to gallery</span>
                        </a>
                    </div>
                    <div class="gallery-wrap-inner">
                        <!-- Owl Carousel -->
                        <div class="owl-carousel owl-gallery" data-items="1" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-lightgallery="group" data-pagination-class=".dots-custom-<?php echo $term->slug; ?>">
                            <?php
                            $art = array(
                                'post_type' => 'artworks', 
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'type-of-work',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug,
                                    ),
                                ),
                            );
                            $art_post = new WP_Query($art);
                            if ($art_post->have_posts()) :
                                while ($art_post->have_posts()) : $art_post->the_post();
                                $galimages = get_field('add_painting_images'); 
                                foreach( $galimages as $image ):
                                    $full_image_url= $image['full_image_url']; 
                                    $img_small = acf_photo_gallery_resize_image($full_image_url, 970, 524);    ?>
                                    <a class="gallery-item" href="<?php echo $full_image_url; ?>" data-lightgallery="item">
                                        <figure>
                                            <img src="<?php echo $full_image_url; ?>" alt="<?php echo the_title(); ?>" width="970" height="524"/>
                                        </figure>
                                        <div class="caption">
                                            <span class="icon novi-icon fa-expand"></span>
                                        </div>
                                    </a>
                                <?php
                                endforeach; 
                                endwhile;
                                wp_reset_postdata();
                               
                            else : ?>
                                <p><?php esc_html_e('No posts found'); ?></p>
                            <?php endif;  wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php $i++;
        } ?>
    </div>
<?php } ?>
