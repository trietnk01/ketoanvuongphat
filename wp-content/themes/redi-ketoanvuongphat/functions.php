<?php
//date_default_timezone_set('Asia/Ho_Chi_Minh');
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}
clearstatcache();
ob_start();

// global $content_width;
if ( ! isset( $content_width ) ) {
   $content_width = 1170; // px
}

// inc core
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
// show admin bar
if ( is_localhost() ) {
	show_admin_bar( false );
}

//add_action("admin_head","func_sub_redirect", -100 );
function func_sub_redirect(){

	if ( p_var_ar("is_role") == "subscriber"  ){
		header("location:" . home_url()  );
		exit;
	} 
}



ob_get_clean();

/**
 * Remove inline Emoji detection script...
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
/**
 * Remove Emoji styles...
 */
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Remove version styles...
 */
add_filter('style_loader_src', 'raf_remove_wp_ver_css_js', 15, 1);
/**
 * Remove version scripts...
 */
add_filter('script_loader_src', 'raf_remove_wp_ver_css_js', 15, 1);

/**
 * Remove version number...
 *
 * @param $src
 * @return string
 */
function raf_remove_wp_ver_css_js($src)
{
    return $src ? esc_url(remove_query_arg('ver', $src)) : false;
}