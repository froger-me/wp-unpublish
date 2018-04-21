<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpdb;

$sql = "UPDATE FROM $wpdb->posts SET `post_status` = 'private' WHERE `post_status` = 'unpublish'";

$wpdb->query( $sql );
