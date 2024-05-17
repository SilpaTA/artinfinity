<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

//**********************custom code start***********************/

//Change error message

add_filter('login_errors','login_error_message');

function login_error_message($error){
    //check if that's the error you are looking for
        $error = "Wrong information";
   
    return $error;
}
//Hide version info
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;

    
}

add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
 
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


//User Role
// $wp_roles = new WP_Roles(); // create new role object
// $wp_roles->remove_role('artisteditor');
add_role( 'artisteditor', 'Artist', get_role( 'editor' )->capabilities );
function custom_menu_page_removing() {
    $current_user_id = get_current_user_id();

    if ($current_user_id !== 0) {
        $current_user = get_userdata($current_user_id);
        $current_user_roles = $current_user->roles;

        // Check if 'artisteditor' role is in the array of user roles
        if (in_array('artisteditor', $current_user_roles)) {
            remove_menu_page( 'edit.php' );
            remove_menu_page( 'index.php' );
            remove_menu_page( 'upload.php' );
            remove_menu_page( 'edit.php?post_type=page' );
            remove_menu_page( 'themes.php' );
            remove_menu_page( 'plugins.php' );
            remove_menu_page( 'tools.php' );
            remove_menu_page( 'options-general.php' );
            remove_menu_page( 'edit.php?post_type=acf-field-group' );
        }
    }
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

//Restrict post 
function restrict_dashboard_posts_to_author($query) {
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
add_action('pre_get_posts', 'restrict_dashboard_posts_to_author');
//
function custom_author_base() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'artist'; // Replace 'profile' with your desired slug
}
add_action('init', 'custom_author_base');

function hide_user_profile_sections() {
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
add_action('admin_init', 'hide_user_profile_sections');



function custom_admin_styles() {
	if (is_user_logged_in() && !current_user_can('administrator')) {
    echo '<style>
        #wp-admin-bar-comments,
		#wp-admin-bar-new-content,
		#screen-meta-links {
            display: none !important;
        }
    </style>';
	}
}
add_action('admin_head', 'custom_admin_styles');


