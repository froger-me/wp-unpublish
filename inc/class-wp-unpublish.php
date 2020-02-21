<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class WP_Unpublish {

	public function __construct() {

		// Uninstall cleanup
		register_uninstall_hook( WP_UNPUBLISH_PLUGIN_PATH, array( 'WP_Unpublish', 'uninstall' ) );

		// Add translation
		add_action( 'init', array( $this, 'load_textdomain' ), 0, 0 );
		// Register Unpublished post status
		add_action( 'init', array( $this, 'unpublish_post_status' ), 10, 0 );
		// Add admin scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_scripts' ), 10, 1 );

		// Show Unpublished status next to post titles in lists
		add_filter( 'display_post_states', array( $this, 'display_unpublish_state' ) );
	}

	/*******************************************************************
	* Public methods
	*******************************************************************/

	public static function uninstall() {
		include_once WP_UNPUBLISH_PLUGIN_PATH . 'uninstall.php';
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'wp-unpublish', false, 'unpublish/languages' );
	}

	public function unpublish_post_status() {
		$args = array(
			'label'                     => _x( 'Unpublished', 'general name', 'wp-unpublish' ),
			// translators: $1$s is the number of posts
			'label_count'               => _n_noop( 'Unpublished <span class="count">(%1$s)</span>', 'Unpublished<span class="count">(%1$s)</span>', 'wp-unpublish' ),
			'public'                    => false,
			'private'                   => false,
			'protected'                 => true,
			'internal'                  => false,
			'show_in_admin_all_list'    => true,
			'show_in_admin_status_list' => true,
			'exclude_from_search'       => true,
		);

		register_post_status( 'unpublish', $args );
	}

	public function display_unpublish_state( $states ) {
		global $post;

		$arg = get_query_var( 'post_status' );

		if ( 'unpublish' !== $arg ) {

			if ( $post && 'unpublish' === $post->post_status ) {

				return array( __( 'Unpublished', 'wp-unpublish' ) );
			}
		}

		return $states;
	}

	public function add_admin_scripts( $hook ) {

		if ( 'post.php' === $hook || 'post-new.php' === $hook || 'edit.php' === $hook ) {
			$debug   = apply_filters( 'wp_unpublish_debug', false );
			$js_ext  = ( $debug ) ? '.js' : '.min.js';
			$version = filemtime( WP_UNPUBLISH_PLUGIN_PATH . '/js/main' . $js_ext );
			$params  = array(
				'unpublish'       => __( 'Unpublished', 'wp-unpublish' ),
				'saveUnpublished' => __( 'Save Unpublished', 'wp-unpublish' ),
			);

			if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
				global $post;

				$params['screen']     = 'single';
				$params['postStatus'] = $post->post_status;
			}

			if ( 'edit.php' === $hook ) {
				$params['screen'] = 'list';
			}

			wp_enqueue_script( 'wp-unpublish-script', WP_UNPUBLISH_PLUGIN_URL . '/js/main' . $js_ext, array( 'jquery' ), $version, true );
			wp_localize_script( 'wp-unpublish-script', 'WP_Unpublish', $params );
		}
	}

}
