<?php
$current_author_url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $current_author_url);
$author_nicename = $parts[count($parts) - 2]; // Assuming the author nicename is before the last segment in the URL

$user = get_user_by('slug', $author_nicename);

if ($user) {
    $author_id = $user->ID;
    $author_term_ids = get_objects_in_term($author_id, 'type-of-work');
    
    $args = array(
        'taxonomy' => 'type-of-work',
        'hide_empty' => true,
        'include' => $author_term_ids,
    );
} else {
    $args = array(
        'taxonomy' => 'type-of-work',
        'hide_empty' => true,
    );
}

$terms = get_terms($args);

if ($terms) { ?>
    <ul class="nav nav-tabs">
        <?php foreach ($terms as $term) {
            $term_img = get_field('category_image', $term);
            ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="#tabs-gallery-<?php echo $term->term_id; ?>" data-toggle="tab">
                    <?php if ($term_img) { ?>
                        <img src="<?php echo $term_img['url']; ?>" alt="<?php echo $term->name; ?>" width="180" height="180" />
                    <?php } else { ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gallery-01-180x180.jpg" alt="<?php echo $term->name; ?>" width="180" height="180" />
                    <?php } ?>
                    <span><?php echo $term->name; ?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content">
        <?php foreach ($terms as $term) { ?>
            <div class="tab-pane fade" id="tabs-gallery-<?php echo $term->term_id; ?>">
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
                                'author' => $author_id, // Filter by author ID
                            );
                            $art_post = new WP_Query($art);
                            if ($art_post->have_posts()) {
                                while ($art_post->have_posts()) : $art_post->the_post();
                                    $post_id = get_the_ID();
                                    $galimages = get_field('add_painting_images', $post_id);
                                    if ($galimages) {
                                        foreach ($galimages as $image) {
                                            $full_image_url = $image['full_image_url'];
                                            $img_small = acf_photo_gallery_resize_image($full_image_url, 970, 524); ?>
                                            <a class="gallery-item" href="<?php echo $full_image_url; ?>" data-lightgallery="item">
                                                <figure>
                                                    <img src="<?php echo $full_image_url; ?>" alt="<?php the_title(); ?>" width="970" height="524" />
                                                </figure>
                                                <div class="caption">
                                                    <span class="icon novi-icon fa-expand"></span>
                                                </div>
                                            </a>
                                        <?php }
                                    } else {
                                        echo 'No images found for post: ' . get_the_title($post_id);
                                    }
                                endwhile;
                                wp_reset_postdata();
                            } else { ?>
                                <p><?php esc_html_e('No posts found'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
