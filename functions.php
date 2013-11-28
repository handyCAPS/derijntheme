<?php

define('THEMEPATH', get_stylesheet_directory_uri());

function derijn_register_scripts() {
	// first the styles
	wp_register_style('owl', THEMEPATH . '/javascripts/owl/owl.carousel.css', array(), false, 'all' );
	wp_register_style( 'owltheme', THEMEPATH . '/javascripts/owl/owl.theme.css', array(), false, 'all');
	wp_register_style('app', THEMEPATH . '/stylesheets/app.css', array(), false, 'all' );

	wp_enqueue_style('owl');
	wp_enqueue_style('owltheme' );
	wp_enqueue_style('app' );

	// then the scripts
	wp_register_script( 'jquerylocal', THEMEPATH . '/javascripts/vendor/jquery.js' , array(), false, true );
	wp_register_script('owlscript', THEMEPATH . '/javascripts/owl/owl.carousel.min.js', array(), false, true );

	wp_enqueue_script('jquerylocal' );
	wp_enqueue_script('owlscript' );

}

add_action('wp_enqueue_scripts', 'derijn_register_scripts' );

// Register Custom Post Type
function derijn_custom_post_type() {

	$labels = array(
		'name'                => _x( 'Slideposts', 'Post Type General Name', 'derijnkapper' ),
		'singular_name'       => _x( 'Slidepost', 'Post Type Singular Name', 'derijnkapper' ),
		'menu_name'           => __( 'Slidepost', 'derijnkapper' ),
		'parent_item_colon'   => __( 'Parent slidepost:', 'derijnkapper' ),
		'all_items'           => __( 'Alle slideposts', 'derijnkapper' ),
		'view_item'           => __( 'Bekijk slideposts', 'derijnkapper' ),
		'add_new_item'        => __( 'Slidepost toevoegen', 'derijnkapper' ),
		'add_new'             => __( 'Nieuwe slidepost', 'derijnkapper' ),
		'edit_item'           => __( 'Slidepost bewerken', 'derijnkapper' ),
		'update_item'         => __( 'Update slidepost', 'derijnkapper' ),
		'search_items'        => __( 'Slidepost zoeken', 'derijnkapper' ),
		'not_found'           => __( 'Geen slideposts gevonden', 'derijnkapper' ),
		'not_found_in_trash'  => __( 'Geen slideposts in prullenbak', 'derijnkapper' ),
	);
	$args = array(
		'label'               => __( 'slidepost', 'derijnkapper' ),
		'description'         => __( 'Posts die boven de pagina in de slider komen', 'derijnkapper' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slidepost', $args );

}

// Hook into the 'init' action
add_action( 'init', 'derijn_custom_post_type', 0 );

add_theme_support('post-thumbnails',array('post', 'page', 'slidepost'));