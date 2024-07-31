<?php
$current_author_url = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($current_author_url, '/'));
$author_nicename = $parts[count($parts) - 1]; // Assuming the author nicename is the last segment in the URL

$user = get_user_by('slug', $author_nicename);

if ($user) {
    $author_id = $user->ID;

    // Get all posts by the author
    $author_posts = get_posts(array(
        'post_type' => 'artworks',
        'author' => $author_id,
        'numberposts' => -1
    ));

    // Collect all term IDs associated with these posts
    $author_term_ids = array();
    foreach ($author_posts as $post) {
        $post_terms = wp_get_post_terms($post->ID, 'type-of-work', array('fields' => 'ids'));
        $author_term_ids = array_merge($author_term_ids, $post_terms);
    }
    $author_term_ids = array_unique($author_term_ids);

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
$i = 1;

if ($terms) { ?>
    <ul class="nav nav-tabs">
        <?php foreach ($terms as $term) {
            // Get posts by the author in the current term
            $author_term_posts = get_posts(array(
                'post_type' => 'artworks',
                'author' => $author_id,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type-of-work',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                    ),
                ),
                'numberposts' => 1, // We only need to know if there is at least one post
            ));

            if (!empty($author_term_posts)) {
                $term_img = get_field('category_image', $term); ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="#tabs-gallery-<?php echo $i; ?>" data-toggle="tab">
                        <?php if ($term_img) { ?>
                            <img src="<?php echo esc_url($term_img['url']); ?>" alt="<?php echo esc_attr($term->name); ?> Painting Category - Color Pallette" width="180" height="180" />
                        <?php } else { ?>
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/gallery-01-180x180.jpg" alt="<?php echo esc_attr($term->name); ?> Painting Category - Color Pallette" width="180" height="180" />
                        <?php } ?>
                        <span><?php echo esc_html($term->name); ?></span>
                    </a>
                </li>
                <?php $i++;
            }
        }  if (empty($author_term_posts)) { ?><li class="nav-item" role="presentation">
                    <a class="nav-link" href="javascript:void(0)" data-toggle="tab" style="cursor: none;">
                        <img src="https://www.test.colorpallette.in/wp-content/uploads/2024/05/abstract.jpg" alt="Abstract Painting Category - Color Pallette" width="180" height="180">
                        <span>Stay Tuned for Stunning Additions!</span>
                    </a>
                </li>
            <?php } ?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <?php $i = 1;
        foreach ($terms as $term) {
            // Get posts by the author in the current term
            $author_term_posts = get_posts(array(
                'post_type' => 'artworks',
                'author' => $author_id,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type-of-work',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                    ),
                ),
                'numberposts' => 1, // We only need to know if there is at least one post
            ));

            if (!empty($author_term_posts)) { ?>
                <div class="tab-pane fade" id="tabs-gallery-<?php echo $i; ?>">
                    <div class="gallery-wrap">
                        <div class="gallery-wrap-inner">
                            <h4><?php echo esc_html($term->name); ?></h4>
                            <div class="dots-custom-<?php echo esc_attr($term->slug); ?>"></div>
                            <a class="back-to-gallery button-link button-link-icon" href="#">
                                <span class="novi-icon icon icon-primary fa fa-angle-left"></span>
                                <span>back to gallery</span>
                            </a>
                        </div>
                        <div class="gallery-wrap-inner">
                            <!-- Owl Carousel -->
                            <div class="owl-carousel owl-gallery" data-items="1" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-margin="0" data-mouse-drag="false" data-lightgallery="group" data-pagination-class=".dots-custom-<?php echo esc_attr($term->slug); ?>">
                                <?php
                                $art_posts = get_posts(array(
                                    'post_type' => 'artworks',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'type-of-work',
                                            'field'    => 'slug',
                                            'terms'    => $term->slug,
                                        ),
                                    ),
                                    'numberposts' => -1,
                                    'author' => $author_id
                                ));
                                if ($art_posts) {
                                    foreach ($art_posts as $art_post) {
                                        $post_id = $art_post->ID;
                                        $galimages = get_field('add_painting_images', $post_id);
                                        if ($galimages) {
                                            foreach ($galimages as $image) {
                                                $full_image_url = $image['full_image_url'];
                                                $img_small = acf_photo_gallery_resize_image($full_image_url, 970, 524); ?>
                                                <a class="gallery-item" href="<?php echo esc_url($full_image_url); ?>" data-lightgallery="item">
                                                    <figure>
                                                        <img src="<?php echo esc_url($full_image_url); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?> Painting - Color Pallette" width="970" height="524" />
                                                    </figure>
                                                    <div class="caption">
                                                        <span class="icon novi-icon fa-expand"></span>
                                                    </div>
                                                </a>
                                                <?php
                                            }
                                        } else {
                                            echo 'No images found for post: ' . esc_html(get_the_title($post_id));
                                        }
                                    }
                                } else { ?>
                                    <p><?php esc_html_e('No posts found'); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;
            }
        } ?>
    </div>
<?php }
?>
