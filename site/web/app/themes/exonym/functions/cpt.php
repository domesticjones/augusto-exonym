<?php
/*
===========================
  [[[ Custom Post Types ]]]
===========================
*/

// Clear Rewrite Rules for CPT's
function ex_theme_terlet() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'ex_theme_terlet');

// CPT - Collections
function cpt_collections() {

	$labels = array(
		'name'                  => _x( 'Collections', 'Post Type General Name', 'collections' ),
		'singular_name'         => _x( 'Collection', 'Post Type Singular Name', 'collections' ),
		'menu_name'             => __( 'Collections', 'collections' ),
		'name_admin_bar'        => __( 'Collection', 'collections' ),
		'archives'              => __( 'Collection Archives', 'collections' ),
		'attributes'            => __( 'Collection Attributes', 'collections' ),
		'parent_item_colon'     => __( 'Parent Collection:', 'collections' ),
		'all_items'             => __( 'All Collections', 'collections' ),
		'add_new_item'          => __( 'Add New Collection', 'collections' ),
		'add_new'               => __( 'Add New', 'collections' ),
		'new_item'              => __( 'New Collection', 'collections' ),
		'edit_item'             => __( 'Edit Collection', 'collections' ),
		'update_item'           => __( 'Update Collection', 'collections' ),
		'view_item'             => __( 'View Collection', 'collections' ),
		'view_items'            => __( 'View Collections', 'collections' ),
		'search_items'          => __( 'Search Collection', 'collections' ),
		'not_found'             => __( 'Not found', 'collections' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'collections' ),
		'featured_image'        => __( '', 'collections' ),
		'set_featured_image'    => __( '', 'collections' ),
		'remove_featured_image' => __( '', 'collections' ),
		'use_featured_image'    => __( '', 'collections' ),
		'insert_into_item'      => __( 'Insert into Collection', 'collections' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Collection', 'collections' ),
		'items_list'            => __( 'Collections list', 'collections' ),
		'items_list_navigation' => __( 'Collections list navigation', 'collections' ),
		'filter_items_list'     => __( 'Filter Collections list', 'collections' ),
	);
	$args = array(
		'label'                 => __( 'Collection', 'collections' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'collections',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'collection', $args );

}
add_action( 'init', 'cpt_collections', 0 );
