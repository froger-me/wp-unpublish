<?php
/**
Plugin Name: Unpublish
Plugin URI: https://truerun.com/
Description: Adds the post status Unpublished.
Version: 1.0
Author: Alexandre Froger
Author URI: https://froger.me
Text Domain: wp-unpublish
Domain Path: /languages
WC tested up to: 3.3.4
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
if ( ! defined( 'UNPUBLISH_PLUGIN_PATH' ) ) {
	define( 'UNPUBLISH_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'UNPUBLISH_PLUGIN_URL' ) ) {
	define( 'UNPUBLISH_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

function wp_unpublish_run() {
	require_once UNPUBLISH_PLUGIN_PATH . '/inc/class-wp-unpublish.php';

	$unpublish = new WP_Unpublish();
}
add_action( 'plugins_loaded', 'wp_unpublish_run', 10, 0 );
