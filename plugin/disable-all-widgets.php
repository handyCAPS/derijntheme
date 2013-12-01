<?php
/**
* Plugin Name: Disable all the widgets
* Plugin URI:
* Description: Disables all standard widgets
* Version: 1.0
* Author: Tim Doppenberg
* Author URI:
* License: GPL2
*/

add_action( 'widgets_init', 'derijn_unregister_widgets' );

function derijn_unregister_widgets() {

    $widgets = array(
            'WP_Widget_Pages',
            'WP_Widget_Calendar',
            'WP_Widget_Archives',
            'WP_Widget_Links',
            'WP_Widget_Categories',
            'WP_Widget_Recent_Posts',
            'WP_Widget_Search',
            'WP_Widget_Tag_Cloud',
            'WP_Widget_Search',
            'WP_Widget_Meta',
            'WP_Widget_Recent_Comments',
            'WP_Widget_RSS',
            'WP_Nav_Menu_Widget',
            'WP_Widget_Text'
        );

    foreach ($widgets as $key => $value) {
        unregister_widget($value);
    }

    // unregister_widget( 'WP_Widget_Pages' );
    // unregister_widget( 'WP_Widget_Calendar' );
    // unregister_widget( 'WP_Widget_Archives' );
    // unregister_widget( 'WP_Widget_Links' );
    // unregister_widget( 'WP_Widget_Categories' );
    // unregister_widget( 'WP_Widget_Recent_Posts' );
    // unregister_widget( 'WP_Widget_Search' );
    // unregister_widget( 'WP_Widget_Tag_Cloud' );
    // unregister_widget( 'WP_Widget_Search' );
    // unregister_widget( 'WP_Widget_Meta' );
    // unregister_widget( 'WP_Widget_Recent_Comments' );
    // unregister_widget( 'WP_Widget_RSS' );
    // unregister_widget( 'WP_Nav_Menu_Widget' );
    // unregister_widget('WP_Widget_Text' );
}