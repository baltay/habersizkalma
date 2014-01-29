<?php

/*-----------------------------------------------------------------------------------

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/


// Define Theme Name for localization
if (!defined('THB_THEME_NAME')) {
	define('THB_THEME_NAME', 'exquisite');
}

// Translation
add_action('after_setup_theme', 'lang_setup');
function lang_setup(){
	load_theme_textdomain(THB_THEME_NAME, get_template_directory() . '/inc/languages');
}

// Option-Tree Theme Mode
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'inc/ot-fonts.php' );
include_once( 'inc/ot-radioimages.php' );
include_once( 'inc/ot-metaboxes.php' );
include_once( 'inc/ot-themeoptions.php' );

if ( ! class_exists( 'OT_Loader' ) ) {
	include_once( 'admin/ot-loader.php' );
}
// Script Calls
require_once('inc/script-calls.php');

// Breadcrumbs
require_once('inc/breadcrumbs.php');

// Excerpts
require_once('inc/excerpts.php');

// Custom Titles
require_once('inc/wptitle.php');

// Pagination
require_once('inc/wp-pagenavi.php');

// Post Formats
add_theme_support('post-formats', array('video', 'image', 'gallery'));

// Masonry Load More
require_once('inc/masonry-ajax.php');
add_action("wp_ajax_nopriv_thb_ajax_home", "load_more_posts");
add_action("wp_ajax_thb_ajax_home", "load_more_posts");
add_action("wp_ajax_nopriv_thb_ajax_home2", "load_more_posts_type2");
add_action("wp_ajax_thb_ajax_home2", "load_more_posts_type2");

// TGM Plugin Activation Class
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/plugins.php');

// Enable Featured Images
require_once('inc/postthumbs.php');

// Activate WP3 Menu Support
require_once('inc/wp3menu.php');

// Enable Sidebars
require_once('inc/sidebar.php');

// Custom Comments
require_once('inc/comments.php');

// Widgets
require_once('inc/widgets.php');

// Like functionality
require_once('inc/themelike.php');

// Related Posts
require_once('inc/related.php');

// Weather
require_once('inc/weather.php');

// Custom Login Logo
require_once('inc/customloginlogo.php');

// Do Shortcodes inside Widgets
add_filter('widget_text', 'do_shortcode');

// Twitter oAuth
require_once('inc/twitter_oauth.php');
require_once('inc/twitter_gettweets.php');

// Misc 
require_once('inc/misc.php');

require_once('inc/custom.php');

?>