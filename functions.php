<?php
function load_css() {
	wp_enqueue_style( 'sixtysecondtheme_stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'sixtysecondtheme_gfonts', 'https://fonts.googleapis.com/css?family=Bentham|PT+Serif:400,700,400italic,700italic' );
}
add_action( 'wp_enqueue_scripts', 'load_css' );




/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'chalet', 'Post Type General Name', 'adwaita' ),
        'singular_name'       => _x( 'Chalet', 'Post Type Singular Name', 'adwaita' ),
        'menu_name'           => __( 'Chalets!', 'adwaita' ),
        'parent_item_colon'   => __( 'Parent Chalet', 'adwaita' ),
        'all_items'           => __( 'All Chalets', 'adwaita' ),
        'view_item'           => __( 'View Chalet', 'adwaita' ),
        'add_new_item'        => __( 'Add New Chalet', 'adwaita' ),
        'add_new'             => __( 'Add New', 'adwaita' ),
        'edit_item'           => __( 'Edit Chalet', 'adwaita' ),
        'update_item'         => __( 'Update Chalet', 'adwaita' ),
        'search_items'        => __( 'Search Chalet', 'adwaita' ),
        'not_found'           => __( 'Not Found', 'adwaita' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'adwaita' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Chalet', 'adwaita' ),
        'description'         => __( 'Chalet info', 'adwaita' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'info', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 3,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'chalet', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );








/**
 * Define Video Background's post types
 *
 * @since 2.5.7
 * @author Push Labs
 * @param array $post_types
 * @return array Array of post types Video Background should use
 */
function themeprefix_vidbg_post_types( $post_types ) {
  /**
   * list the post types you would like Video Background
   * to use in the form of an array
   */
  $post_types = array( 'chalet', 'page', 'post' );
  return $post_types;
}
add_filter( 'vidbg_post_types', 'themeprefix_vidbg_post_types' );
