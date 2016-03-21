<?php
/**
 * ZFWP Base Theme functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 */
if ( ! function_exists( 'theme_setup' ) ) :
	/**
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 */
	function theme_setup() {
		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );
		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 660, 230 );
		add_image_size( 'news-thumb', 270, 196, true );
		add_image_size( 'wide-thumb', 452, 196, true );
		add_image_size( 'profile-thumb', 340, 470, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'   =>  'Header menu',
			'secondary' => 'Footer menu'
		) );
		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
		//Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
		) );
		//Creating custom theme settings
		require get_template_directory() . '/includes/custom-settings.php';
	}
endif;

add_action( 'after_setup_theme', 'theme_setup' );

require get_template_directory() . '/includes/foundation-wp-navwalker.php';

//Initialize and Register sidebars for theme
function theme_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Primary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-1',
		'description' => __( 'Main sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Secondary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-2',
		'description' => __( 'Alternate sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __('Tertiary Sidebar', 'zfwpbase' ),
		'id' => 'sidebar-3',
		'description' => __( 'Alternate sidebar content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer One', 'zfwpbase' ),
		'id' => 'sidebar-4',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Two', 'zfwpbase' ),
		'id' => 'sidebar-5',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
	register_sidebar(array(
		'name' => __( 'Footer Three', 'zfwpbase' ),
		'id' => 'sidebar-6',
		'description' => __( 'Footer area content for site', 'zfwpbase' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}
add_action( 'widgets_init', 'theme_widgets_init' );

//function theme_scripts () {
	//wp_deregister_script( 'jquery' );
	//wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery.js', array(), '2.1.4', false );
	//wp_enqueue_script('jquery');
//}
//add_action( 'wp_enqueue_scripts', 'theme_scripts' );

//remove_filter ('the_content', 'wpautop');
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);
function init_gform_scripts() {
	return true;
}
add_filter('gform_init_scripts_footer', 'init_gform_scripts');

//Create custom display for Company Name.
function display_cta_info(){
	$custom_option = get_option('custom_option_name');
	$location_info = $custom_option['co_info'];
	echo '<span>'.$location_info.'</span>';
}
add_action( 'cta_info', 'display_cta_info', 10, 1 );

//Create custom display for Company Address.
function display_cta_address(){
	$custom_option = get_option('custom_option_name');
	$location_address = $custom_option['ad_info'];
	echo '<span>'.$location_address.'</span>';
}
add_action( 'cta_address', 'display_cta_address', 10, 1 );

//Create custom display for Company Phone Number Call To Action.
function display_cta_phone(){
	$custom_option = get_option('custom_option_name');
	$location_phone = $custom_option['ph_info'];
	echo '<a href="tel://'.$location_phone.'">'.$location_phone.'</a>';
}
add_action( 'cta_phone', 'display_cta_phone', 10, 1 );

//Create custom display for Social Media icons as grouped set.
function display_social_media_icons(){
	$custom_option = get_option('custom_option_name');

	if ($custom_option['fb_link']) :
		echo '&nbsp;<a href="'.$custom_option['fb_link'].'" target="_blank"><i class="fa fa-facebook-square"></i></a>&nbsp;';
	endif;
	if ($custom_option['li_link']) :
		echo '&nbsp;<a href="'.$custom_option['li_link'].'" target="_blank"><i class="fa fa-linkedin-square"></i></a>&nbsp;';
	endif;
	if ($custom_option['tw_link']) :
		echo '&nbsp;<a href="'.$custom_option['tw_link'].'" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;';
	endif;
}
add_action( 'social_icons', 'display_social_media_icons', 10, 1 );

add_post_type_support( 'page', 'excerpt');

// Alter length of the Excerpt.
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Alter the more of the Excerpt.
function new_excerpt_more( $more ) {
	//return ' ...';
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More &gt;', 'fwp-base' ) . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Enable Shortcodes in Widgets
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

function get_id_by_slug($page_slug) {
	$find_page = get_page_by_path($page_slug);
	if ($find_page) {
		return $find_page->ID;
	} else {
		return null;
	}
}

// gets the slug of the parent
function the_parent_slug() {
	global $post;
	if($post->post_parent == 0) return '';
	$post_data = get_post($post->post_parent);
	return $post_data->post_name;
}

// show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}

function r7_login_redirect( $redirect_to, $request, $user  ) {
//	$redirect_url = ( is_array( $user->roles ) && in_array( 'manager', $user->roles ) ) ? site_url('/development-team/') : admin_url();
//	return $redirect_url;
	if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
		if( $user->has_cap( 'administrator' ) ) {
			$redirect_to = admin_url();
		} elseif( $user->has_cap( 'manager' ) ) {
			$redirect_to = site_url('/development-team-presentation/');
		} elseif( $user->has_cap( 'manager' ) ) {
			$redirect_to = site_url('/development-team-presentation/');
		} elseif( $user->has_cap( 'manager' ) ) {
			$redirect_to = site_url('/development-team-presentation/');
		} elseif( $user->has_cap( 'manager' ) ) {
			$redirect_to = site_url('/development-team-presentation/');
		} elseif( $user->has_cap( 'fran_aap' ) ) {
			$redirect_to = site_url('/franchisor/all-about-people/');
		} elseif( $user->has_cap( 'fran_pma' ) ) {
			$redirect_to = site_url('/franchisor/pro-martial-arts/');
		} elseif( $user->has_cap( 'fran_sam' ) ) {
			$redirect_to = site_url('/franchisor/scout-mollys/');
		} elseif( $user->has_cap( 'fran_sgr' ) ) {
			$redirect_to = site_url('/franchisor/storm-guard-restoration');
		} else {
			$redirect_to = home_url();
		}
	}
	return $redirect_to;
}
add_filter( 'login_redirect', 'r7_login_redirect', 10, 3 );

// adds staff shortcode
function custom_staffer_shortcode( $atts ) {
	ob_start();
	extract( shortcode_atts( array (
		'order' => 'DESC',
		'orderby' => 'date',
		'number' => -1,
		'department' => '',
	), $atts ) );

	if ( $department != '' ) {
		$tax_query = array (
			array (
				'taxonomy'	=> 'department',
				'field'		=> 'slug',
				'terms'		=> $department,
			),
		);
	} else {
		$tax_query = null;
	}
	$args = array(
		'post_type' => 'staff',
		'order' => $order,
		'orderby' => $orderby,
		'posts_per_page' => $number,
		'tax_query' => $tax_query,
	);
	$staff_query = new WP_Query( $args );
	if ( $staff_query->have_posts() ) {
		global $post;
		$stafferoptions = get_option ( 'staffer' );

		if (isset ($stafferoptions['gridlayout']) ) {
			echo '<ul class="staffer-archive-grid">';
		} else {
			echo  '<ul class="staffer-archive-list">';
		}

		while ( $staff_query->have_posts() ) : $staff_query->the_post();
			echo '<li>';
				echo '<header class="staffer-staff-header">';
					if (isset ($stafferoptions['gridlayout']) ) {
						echo '<a href="' . get_the_permalink() .'">';
						echo the_post_thumbnail( 'medium', array ('class' => 'aligncenter') );
						echo '</a>';
					} else {
						echo '<a href="' . get_the_permalink() .'">';
						echo the_post_thumbnail( 'medium', array ('class' => 'alignleft') );
						echo '</a>';
					}

					echo '<h3 class="staffer-staff-title"><a href="' . get_the_permalink() .'">';
							echo the_title();
					echo '</a>';
					echo '</h3>';

					if ( get_post_meta ($post->ID,'staffer_staff_title', true) != '' ) {
						echo '<em>';
						echo get_post_meta ($post->ID,'staffer_staff_title', true) . '</em><br>';
					}

				echo '</header>';
				echo '<div class="staff-content">';
					if ($stafferoptions['estyle'] == null or $stafferoptions['estyle'] == 'excerpt' ) {
						the_excerpt();
					} elseif ($stafferoptions['estyle'] == 'full' ) {
						the_content();
					} elseif ($stafferoptions['estyle'] == 'none' ) {
						// nothing to see here
						echo '<a href="' . get_the_permalink() .'" rel="button">READ BIO</a>';
					}
				echo '</div>';
			echo '</li>';
		endwhile;
		wp_reset_postdata();
		echo '</ul>';
		$output = ob_get_clean();
		return $output;
	}
}
add_shortcode( 'custom_staffer', 'custom_staffer_shortcode' );