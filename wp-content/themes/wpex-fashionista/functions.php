<?php
/**
 * Fashionista functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Fashionista
 */
 


/*--------------------------------------*/
/* Define Constants
/*--------------------------------------*/
define( 'WPEX_FRAMEWORK_URL', get_template_directory_uri().'/framework' );
define( 'WPEX_JS_DIR', get_template_directory_uri().'/js' );
define( 'WPEX_CSS_DIR', get_template_directory_uri().'/css' );


/*--------------------------------------*/
/* Include core functions & framework
/*--------------------------------------*/

require_once( get_template_directory() .'/functions/commons.php' );
require_once( get_template_directory() .'/functions/social-output.php' );
require_once ( get_template_directory() .'/functions/load-admin.php' );
require_once ( get_template_directory() .'/options.php' );
require_once( get_template_directory() .'/functions/theme-customizer.php' );
require_once( get_template_directory() .'/functions/scripts.php' );
require_once( get_template_directory() .'/functions/hooks.php' );
require_once( get_template_directory() .'/functions/mobile-menu.php' );
require_once( get_template_directory() .'/functions/load-more.php' );
require_once( get_template_directory() .'/functions/aqua-resizer.php' );
require_once( get_template_directory() .'/functions/widgets/widget-areas.php' );
require_once( get_template_directory() . '/functions/widgets/flickr.php');
require_once( get_template_directory() . '/functions/widgets/video.php');
require_once( get_template_directory() . '/functions/widgets/recent-posts-thumb.php');
require_once( get_template_directory() .'/functions/entry-meta.php');
require_once( get_template_directory() .'/functions/entry-thumbnail.php');

// Load on the admin side only
if( is_admin() ) {
	require_once( get_template_directory() .'/functions/meta/usage.php' );
	require_once ( get_template_directory() .'/functions/recommend-plugins.php' );
	require_once( get_template_directory() .'/functions/gallery-metabox/gmb-admin.php' );

// Load on the front end only
} else {
	require_once( get_template_directory() .'/functions/gallery-metabox/gmb-display.php' );
	require_once( get_template_directory() .'/functions/custom-css.php' );
	require_once( get_template_directory() .'/functions/comments-callback.php');
	require_once( get_template_directory() .'/functions/post-thumbnail.php');
	require_once( get_template_directory() .'/functions/post-meta.php');
	require_once( get_template_directory() .'/functions/social-share.php');
}

// Pagination functions - default, load more, infinite scroll
require_once( get_template_directory() .'/functions/pagination.php');



/*--------------------------------------*/
/* Theme Setup
/*--------------------------------------*/

//default width of primary content area
$content_width = 660;

// Setup the theme - yay!
add_action( 'after_setup_theme', 'fashionista_setup' );

if( ! function_exists( 'fashionista_setup' ) ) {
	function fashionista_setup() {
		
		//localization support
		load_theme_textdomain( 'wpex', get_template_directory() .'/lang' );
		
		//register navigation menus
		register_nav_menus(
			array(
				'main_menu'		=> __('Main','wpex'),
				'footer_menu'	=> __('Footer','wpex')
			)
		);
		
		// Add auto feeds to the <head> tag
		add_theme_support('automatic-feed-links');
		
		// Add the WP custom background support
		add_theme_support('custom-background');
		
		// Add support for featured images
		add_theme_support('post-thumbnails');
		
		// Add support for various post formats
		add_theme_support( 'post-formats', array( 'video', 'quote', 'link', 'audio', 'image', 'gallery' ) );
		
	}
}



/*--------------------------------------*/
/* Image Sizes
/*--------------------------------------*/

if( ! function_exists( 'wpex_new_excerpt_length' ) ) {
	function wpex_img_size( $type, $param ) {
		// Vars
		$entry_img_height = of_get_option( 'entry_img_height', '9999' ) ? of_get_option( 'entry_img_height', '9999' ) : '9999';
		$post_img_width = ( of_get_option( 'sidebar_layout' ) != 'none' ) ? '630' : '970';
		// Return
		if ( 'entry' == $type ) {
			if ( 'width' == $param ) {
				return of_get_option( 'entry_img_width', '440' ) ? of_get_option( 'entry_img_width', '440' ) : '440';
			} elseif ( 'height' == $param ) {
				return $entry_img_height;
			} elseif ( 'crop' == $param ) {
				if ( '9999' == $entry_img_height ) {
					return false;
				} else{
					return true;
				}
			}
		}
		if ( 'post' == $type ) {
			if ( 'width' == $param ) {
				return $post_img_width;
			} elseif ( 'height' == $param ) {
				return '9999';
			} elseif ( 'crop' == $param ) {
				return false;
			}
		}
	}
}


/*--------------------------------------*/
/* Useful functions
/*--------------------------------------*/

//shortcode support in widgets
add_filter('widget_text', 'do_shortcode');

//set a default post excerpt length
if( ! function_exists( 'wpex_new_excerpt_length' ) ) {
	function wpex_new_excerpt_length($length) {
		return of_get_option( 'excerpt_length', '15' );
	}
}
add_filter( 'excerpt_length', 'wpex_new_excerpt_length' );

//replace excerpt link
if( ! function_exists( 'wpex_new_excerpt_more' ) ) {
	function wpex_new_excerpt_more($more) {
		global $post;
		return '...';
	}
}
add_filter( 'excerpt_more', 'wpex_new_excerpt_more' );

//add thumbnails to post view
add_filter('manage_posts_columns', 'wpex_thumbnail_column', 5);
add_action('manage_posts_custom_column', 'wpex_custom_thumbnail_column', 5, 2);
if( ! function_exists('wpex_thumbnail_column')) {
	function wpex_thumbnail_column($defaults){
		$defaults['wpex_post_thumbs'] = __('Thumbs','wpex');
		return $defaults;
	}
}

if( ! function_exists('wpex_custom_thumbnail_column')) {
	function wpex_custom_thumbnail_column( $column_name, $id ){
		if( $column_name != 'wpex_post_thumbs' )
			return;
			if(has_post_thumbnail()) {
			echo '<img src="'. aq_resize( wp_get_attachment_url(get_post_thumbnail_id()), 80, 80, true ) .'" />';
		} else { echo '-'; }
	}
}

if ( ! function_exists( 'wpex_embed_oembed_html' ) ) {
	function wpex_embed_oembed_html( $html, $url, $attr, $post_id ) {
		return '<div class="responsive-video-wrap entry-video">' . $html . '</div>';
	}
}
add_filter( 'embed_oembed_html', 'wpex_embed_oembed_html', 99, 4 );

function category_filter_array(){
	$slugs_arr = array('day-trips', 'my-favourite-things', 'walking-tours');

	$category_array = array();
	foreach ($slugs_arr as $slug) {
		$category = get_category_by_slug($slug);
		$category_array[$slug]['title'] = $category->cat_name;
		$category_array[$slug]['link'] = get_category_link($category->term_id);
	}
	return $category_array;
}