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
        add_action('init', array($this, 'custom_author_base') );

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
        wp_enqueue_style( 'customfont', 'https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,700' );
        wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css' );
        wp_enqueue_style( 'font-style', get_stylesheet_directory_uri() . '/assets/css/fonts.css' );
        wp_enqueue_style( 'style_css0', get_stylesheet_directory_uri() . '/assets/css/style.css' );
    }
    

    //  Script Enqueue  

    public function themes_js() {
    	wp_enqueue_script( 'core-js', get_stylesheet_directory_uri() . '/assets/js/core.min.js', '', '', true );
    	wp_enqueue_script( 'script-js', get_stylesheet_directory_uri() . '/assets/js/script.js', '', '', true );
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
                    #your-profile #application-passwords-section{
                        display: none;
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
            #menu-posts-artists .wp-submenu li:nth-child(4) {
                display: none !important;
            }
        </style>';
        }
    }
    
    public function custom_author_base() {
        global $wp_rewrite;
        $wp_rewrite->author_base = 'artist'; // Replace 'profile' with your desired slug
    }
   

}
$customfunc = new customfunction;




