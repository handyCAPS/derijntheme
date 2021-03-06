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

// Now adding admin side styles

function derijn_admin_styles() {
	wp_register_style('derijn_admin', THEMEPATH . '/stylesheets/admin.css', false, false );
	wp_enqueue_style('derijn_admin');
}
add_action('admin_enqueue_scripts', 'derijn_admin_styles' );

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
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => THEMEPATH . '/images/slider-icon.png',
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

// Register Custom Post Type
function derijn_homeslides() {

	$slidelabels = array(
		'name'                => _x( 'Homeslides', 'Post Type General Name', 'derijnkapper' ),
		'singular_name'       => _x( 'Homeslide', 'Post Type Singular Name', 'derijnkapper' ),
		'menu_name'           => __( 'Homeslide', 'derijnkapper' ),
		'parent_item_colon'   => __( 'Parent homeslide:', 'derijnkapper' ),
		'all_items'           => __( 'Alle homeslides', 'derijnkapper' ),
		'view_item'           => __( 'Bekijk homeslides', 'derijnkapper' ),
		'add_new_item'        => __( 'Homeslide toevoegen', 'derijnkapper' ),
		'add_new'             => __( 'Nieuwe homeslide', 'derijnkapper' ),
		'edit_item'           => __( 'Homeslide bewerken', 'derijnkapper' ),
		'update_item'         => __( 'Update homeslide', 'derijnkapper' ),
		'search_items'        => __( 'Homeslide zoeken', 'derijnkapper' ),
		'not_found'           => __( 'Geen homeslides gevonden', 'derijnkapper' ),
		'not_found_in_trash'  => __( 'Geen homeslides in prullenbak', 'derijnkapper' ),
	);
	$slideargs = array(
		'label'               => __( 'homeslide', 'derijnkapper' ),
		'description'         => __( 'Posts op de voorpagina in de slider komen', 'derijnkapper' ),
		'labels'              => $slidelabels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => THEMEPATH . '/images/slider-icon.png',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'homeslide', $slideargs );

}

// Hook into the 'init' action
add_action( 'init', 'derijn_homeslides', 0 );

// Cropping all images for Homeslides
add_image_size('homeslide_thumbnail', 1000, 700, true );

// Setting the read more link to the post page
function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[Lees meer ...]</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// Featured images available for post, pages, homeslides and slideposts
add_theme_support('post-thumbnails', array('post', 'page', 'slidepost', 'homeslide'));

// Register Navigation Menus
function derijn_navigation_menus() {

	$locations = array(
		'header_menu' => __( 'Custom Header Menu', 'derijnkapper' ),
		'footer_menu' => __( 'Custom Footer Menu', 'derijnkapper' ),
		'mobile_footer' => __( 'Footer Menu on mobile devices', 'derijnkapper' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'derijn_navigation_menus' );

function derijn_sidebar() {
	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$args = array(
			'name'          => __( 'Sidebar', 'theme_text_domain' ),
			'id'            => 'sidebar1',
			'description'   => '',
			'class'         => '',
			'before_widget' => '<li class="widget_item">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		);

		register_sidebar( $args );
}

add_action('widgets_init', 'derijn_sidebar' );
