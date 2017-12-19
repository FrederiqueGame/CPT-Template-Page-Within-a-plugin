<?php
/*
Plugin Name: Activites
Author: Colormyweb
Author URI: https://www.colormyweb.fr
Description: A simple plugin to add some Custom Post Types as Activites - Activities
Version: 1.0
License: GPL2
Text Domain: activites
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exist;
}

/*
--------------------------------------------------------------------------
 CONSTANTS
--------------------------------------------------------------------------
*/
 
if ( ! defined( 'COL_BASE_FILE' ) )
    define( 'COL_BASE_FILE', __FILE__ );
if ( ! defined( 'COL_BASE_DIR' ) )
    define( 'COL_BASE_DIR', dirname( COL_BASE_FILE ) );
if ( ! defined( 'COL_PLUGIN_URL' ) )
    define( 'COL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
    
/*
--------------------------------------------------------------------------
 Register Custom Post Type activite
 Post Type Key: activite
--------------------------------------------------------------------------
*/

register_activation_hook( __FILE__, 'flush_rewrite_rules' );
	
function color_activite_cpt() {

	$labels = array(
		'name' => __( 'Activites', 'Post Type General Name', 'activity' ),
		'singular_name' => __( 'activite', 'Post Type Singular Name', 'activity' ),
		'menu_name' => __( 'Activites', 'activity' ),
		'name_admin_bar' => __( 'activite', 'activity' ),
		'archives' => __( 'activite Archives', 'activity' ),
		'attributes' => __( 'activite Attributes', 'activity' ),
		'parent_item_colon' => __( 'Parent activite:', 'activity' ),
		'all_items' => __( 'Toutes les Activites', 'activity' ),
		'add_new_item' => __( 'Ajouter activite', 'activity' ),
		'add_new' => __( 'Ajouter', 'activity' ),
		'new_item' => __( 'Nouvelle activite', 'activity' ),
		'edit_item' => __( 'Modifier activite', 'activity' ),
		'update_item' => __( 'Update activite', 'activity' ),
		'view_item' => __( 'Voir activite', 'activity' ),
		'view_items' => __( 'View activites', 'activity' ),
		'search_items' => __( 'Search activite', 'activity' ),
		'not_found' => __( 'Not found', 'activity' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'activity' ),
		'featured_image' => __( 'Featured Image', 'activity' ),
		'set_featured_image' => __( 'Set featured image', 'activity' ),
		'remove_featured_image' => __( 'Remove featured image', 'activity' ),
		'use_featured_image' => __( 'Use as featured image', 'activity' ),
		'insert_into_item' => __( 'Insert into activite', 'activity' ),
		'uploaded_to_this_item' => __( 'Uploaded to this activite', 'activity' ),
		'items_list' => __( 'activites list', 'activity' ),
		'items_list_navigation' => __( 'activites list navigation', 'activity' ),
		'filter_items_list' => __( 'Filter activites list', 'activity' ),
	);
	
	$args = array(
		'label' => __( 'activite', 'activity' ),
		'description' => __( 'simple custom post type for activities stuff', 'activity' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-heart',
		'supports' => array(),
		'taxonomies' => array('activite', 'activites', ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
	);
	
	register_post_type( 'activite', $args );
	flush_rewrite_rules();

}

add_action( 'init', 'color_activite_cpt', 0 );


/*
--------------------------------------------------------------------------
 FILTERS
--------------------------------------------------------------------------
*/

add_filter( 'template_include', 'col_page_template' );
function col_page_template( $page_template ) {
    if ( is_singular( 'activite' ) ) {
        $page_template = dirname( __FILE__ ) . '/templates/cpt-activites.php';
    }
    return $page_template;
}