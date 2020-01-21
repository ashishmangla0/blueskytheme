<?php

/**
 * Register a book post type, with REST API support
 *
 * Based on example at: https://codex.wordpress.org/Function_Reference/register_post_type
 */
add_action( 'init', 'my_product_cpt' );
function my_product_cpt() {
  $labels = array(
    'name'               => _x( 'Products', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Product', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Products', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'Product', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New Product', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New Product', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit Product', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View Product', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All Products', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search Products', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Products:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No Products found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No Products found in Trash.', 'your-plugin-textdomain' )
  );
 
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'product' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_rest'       => true,
    'rest_base'          => 'products',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies' => array( 'post_tag','category')
  );
 
  register_post_type( 'product', $args );
}



add_filter( 'enter_title_here', 'custom_enter_title' );
function custom_enter_title( $input ) {
    if ( 'product' === get_post_type() ) {
        return __( 'Enter Product name', 'your_textdomain' );
    }

    return $input;
}


add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );
    
    add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
        'show_in_rest'          => true

			)
		);
?>

