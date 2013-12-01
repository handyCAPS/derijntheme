<?php
/**
* Plugin Name: Picture Widget
* Plugin URI:
* Description: Put a picture in a widget
* Version: 1.0
* Author: Tim Doppenberg
* Author URI: http://timdoppenberg.nl
* License: GPL2
**/

register_activation_hook( __FILE__, 'register_picture_widget' );

function register_picture_widget() {
	$version = '1.0';
	add_option('picwid_version', $version );
	add_option('picwid_image');
}