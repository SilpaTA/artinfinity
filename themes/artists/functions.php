<?php

class customfunction{
    function __construct(){
        add_action( 'init', array($this, 'wpb_custom_new_menu' ) );
        add_action( 'after_setup_theme' , array($this, 'setup' ) );
        add_filter('login_errors',array($this, 'login_error_message') );
        add_action( 'wp_enqueue_scripts', array($this, 'themes_styles' ) );
        add_action( 'wp_enqueue_scripts',  array($this,'themes_js' ) );
        add_action('pre_get_posts', array($this, 'restrict_dashboard_posts_to_author'));
        add_action('admin_init', array($this,'hide_user_profile_sections'));
        add_action('admin_head', array($this,'custom_admin_styles'));
        add_action( 'admin_bar_menu', array($this, 'custom_admin_bar_site_name'), 999 );
        add_filter('login_redirect', array($this, 'admin_default_page') , 10, 3);
        add_action('init',  array($this, 'change_author_base') );
        add_action('wp_footer', array($this, 'disable_right_click'));

    }

    // Menu Register Code
   
    public function wpb_custom_new_menu() {
        register_nav_menus(
            array(
                'main-menu' => __( 'Main Menu' ),
                'footer-menu-one' => __( 'Footer Menu' ),

            )
        );
    }
    //Featured Image
    
    public function setup() {
        // ...
         
        add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme
        add_image_size( 'header', 600, 200, true ); // header image
        add_image_size( 'home-gallery', 450, 269 ); // 400 pixel wide and 200 pixel tall, resized proportionally
        add_image_size( 'custom-size2', 400, 200, true ); // 400 pixel wide and 200 pixel tall, cropped
        add_image_size( 'media-thumb', 350, 267, true  ); // Media page post thumbnails
        add_image_size( 'media-gal-thumb', 180, 120, true  ); // Media page gallery thumbnails
        add_image_size( 'media-full-img', 1110, 343, true  ); //Media single page featured image.
        add_image_size( 'bannerfull', 1349, 632, true  );
    }
    
    //Change error message
    public function login_error_message($error){
        //check if that's the error you are looking for
            $error = "Wrong information";
       
        return $error;
    }

    // Style enqueue

    public function themes_styles() {
         if (is_front_page() || (!is_author() && !is_single())) {
            wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', 
            array(), null);
            wp_enqueue_style('bootstrapmin-home', get_template_directory_uri() . '/assets/home/vendor/bootstrap/css/bootstrap.min.css');
            wp_enqueue_style('bootstrapicons-home', get_template_directory_uri() . '/assets/home/vendor/bootstrap-icons/bootstrap-icons.css');
            wp_enqueue_style('aos-home', get_template_directory_uri() . '/assets/home/vendor/aos/aos.css');
            wp_enqueue_style('lightbox-home', get_template_directory_uri() . '/assets/home/vendor/glightbox/css/glightbox.min.css');
            wp_enqueue_style('swiper-home', get_template_directory_uri() . '/assets/home/vendor/swiper/swiper-bundle.min.css');
            wp_enqueue_style('main-home', get_template_directory_uri() . '/assets/home/css/main.css');
        }else{
            wp_enqueue_style( 'customfont', 'https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,700' );
            wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css' );
            wp_enqueue_style( 'font-style', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
            wp_enqueue_style( 'style_css0', get_stylesheet_directory_uri() . '/assets/css/style.css' );
        }
    }
    

    //  Script Enqueue  

    public function themes_js() {
         if (is_front_page() || (!is_author() && !is_single())) {
            wp_enqueue_script( 'bundle-js-home', get_stylesheet_directory_uri() . '/assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js', '', '', true );
            wp_enqueue_script( 'aos-js-home', get_stylesheet_directory_uri() . '/assets/home/vendor/aos/aos.js', '', '', true );
            wp_enqueue_script( 'lightbox-js-home', get_stylesheet_directory_uri() . '/assets/home/vendor/glightbox/js/glightbox.min.js', '', '', true );
            wp_enqueue_script( 'swiper-js-home', get_stylesheet_directory_uri() . '/assets/home/vendor/swiper/swiper-bundle.min.js', '', '', true );
            wp_enqueue_script( 'main-js-home', get_stylesheet_directory_uri() . '/assets/home/js/main.js', '', '', true );
        }
        else{
            wp_enqueue_script( 'core-js', get_stylesheet_directory_uri() . '/assets/js/core.min.js', '', '', true );
            wp_enqueue_script( 'script-js', get_stylesheet_directory_uri() . '/assets/js/script.js', '', '', true );
        }
    }

    //Restrict post
    public function restrict_dashboard_posts_to_author($query) {
        // Check if it's the admin dashboard and if the user can edit posts
        if (is_admin() && $query->is_main_query() && current_user_can('edit_posts')) {
            // Get the current user's ID
            $current_user_id = get_current_user_id();
    
            // Set the query to only show posts authored by the current user
            if (!current_user_can('administrator')) {
                $query->set('author', $current_user_id);
            }
        }
    }

    public function hide_user_profile_sections() {
        global $pagenow;
    
        // Check if the current page is the user edit screen and the user is logged in
        if ($pagenow === 'profile.php' && is_user_logged_in() && !current_user_can('administrator')) {
    
            // Remove Personal Options section
            remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
    
            add_action('admin_print_styles-profile.php', function() {
                echo '
                <style>
                    #your-profile h2:first-of-type,
                    #your-profile .user-rich-editing-wrap,
                    #your-profile .user-rich-editing-wrap,
                    #your-profile h2:nth-of-type(2),
                    #your-profile .user-comment-shortcuts-wrap,
                    #your-profile .user-admin-bar-front-wrap,
                    #your-profile .user-nickname-wrap,
                    #your-profile h2:nth-of-type(3),
                    #your-profile h2:nth-of-type(4),
                    #your-profile .user-description-wrap,
                    #your-profile .user-profile-picture,
                    #your-profile #application-passwords-section,
                    #wp-admin-bar-comments,
                    #wp-admin-bar-view-site,
                    #wp-admin-bar-new-content,
                    #wp-admin-bar-wp-logo{
                        display: none !important;
                    }
                    .
                </style>';
            });
    
            
        }
    }
   
    
    
    
    public function custom_admin_styles() {
        if (is_user_logged_in() && !current_user_can('administrator')) {
        echo '<style>
            #wp-admin-bar-comments,
            #wp-admin-bar-new-content,
            #screen-meta-links,#menu-posts,#menu-dashboard,#menu-media,#menu-pages,#menu-tools,#menu-comments,
            #menu-posts-artists .wp-submenu li:nth-child(4),
            .form-table .user-email-wrap,
            .form-table .user-url-wrap,
            .form-table .user-twitter-wrap,
            .form-table .user-facebook-wrap,
            .form-table .user-additional_profile_urls-wrap,
            #toplevel_page_wpcf7,
            #toplevel_page_wpseo_workouts,
            #wp-admin-bar-wpseo-menu,
            .user-instagram-wrap,
            .user-linkedin-wrap,
            .user-myspace-wrap,
            .user-pinterest-wrap,
            .user-soundcloud-wrap,
            .user-tumblr-wrap,
            .user-wikipedia-wrap,
            .user-twitter-wrap,
            .user-youtube-wrap,
            #wp-admin-bar-view-site,
            #wp-admin-bar-new-content,
            #wp-admin-bar-wp-logo{
                display: none !important;
            }
        </style>';
        }
    }
    
    // Function to replace site name with user name and URL in admin bar
    public function custom_admin_bar_site_name( $wp_admin_bar ) {
        if ( ! is_user_logged_in() ) {
            return;
        }

        $current_user = wp_get_current_user();

        // Build the URL to the user's profile page
        // $profile_url = admin_url( 'profile.php' );
        $profile_url = get_author_posts_url( $current_user->ID );

        // Add the user's name and profile URL to the admin bar
        $wp_admin_bar->add_node( array(
            'id'    => 'site-name',
            'title' => '<span class="ab-label">' . $current_user->display_name . '</span>',
            'href'  => $profile_url,
        ) );
    }
    public function admin_default_page($redirect_to, $request, $user) {
        // If the user is not an administrator
        if ( !current_user_can('administrator') && !is_wp_error($user) ) {
            // Redirect non-admin users to the specified URL
            $artworks_page_url = admin_url('edit.php?post_type=artworks');
            return $artworks_page_url;
        }
        // Otherwise, redirect administrators to the default WordPress dashboard
        return $redirect_to;
    }

    public function change_author_base() {
        global $wp_rewrite;
        $wp_rewrite->author_base = 'artist'; // Change 'new-author-slug' to whatever you want the base slug to be
        $wp_rewrite->flush_rules();
    }
    public function disable_right_click() {
        echo '
        <script type="text/javascript">
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);
        </script>
    ';
    }

}
$customfunc = new customfunction;




// Remove <p> tags from Contact Form 7 form output
add_filter( 'wpcf7_autop_or_not', '__return_false' );


















