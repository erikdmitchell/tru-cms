<?php

/**
 * Registers the `about` post type.
 */
function about_init() {
	register_post_type( 'about', array(
		'labels'                => array(
			'name'                  => __( 'Abouts', 'tru-cms' ),
			'singular_name'         => __( 'About', 'tru-cms' ),
			'all_items'             => __( 'All Abouts', 'tru-cms' ),
			'archives'              => __( 'About Archives', 'tru-cms' ),
			'attributes'            => __( 'About Attributes', 'tru-cms' ),
			'insert_into_item'      => __( 'Insert into about', 'tru-cms' ),
			'uploaded_to_this_item' => __( 'Uploaded to this about', 'tru-cms' ),
			'featured_image'        => _x( 'Featured Image', 'about', 'tru-cms' ),
			'set_featured_image'    => _x( 'Set featured image', 'about', 'tru-cms' ),
			'remove_featured_image' => _x( 'Remove featured image', 'about', 'tru-cms' ),
			'use_featured_image'    => _x( 'Use as featured image', 'about', 'tru-cms' ),
			'filter_items_list'     => __( 'Filter abouts list', 'tru-cms' ),
			'items_list_navigation' => __( 'Abouts list navigation', 'tru-cms' ),
			'items_list'            => __( 'Abouts list', 'tru-cms' ),
			'new_item'              => __( 'New About', 'tru-cms' ),
			'add_new'               => __( 'Add New', 'tru-cms' ),
			'add_new_item'          => __( 'Add New About', 'tru-cms' ),
			'edit_item'             => __( 'Edit About', 'tru-cms' ),
			'view_item'             => __( 'View About', 'tru-cms' ),
			'view_items'            => __( 'View Abouts', 'tru-cms' ),
			'search_items'          => __( 'Search abouts', 'tru-cms' ),
			'not_found'             => __( 'No abouts found', 'tru-cms' ),
			'not_found_in_trash'    => __( 'No abouts found in trash', 'tru-cms' ),
			'parent_item_colon'     => __( 'Parent About:', 'tru-cms' ),
			'menu_name'             => __( 'About', 'tru-cms' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-info',
		'menu_position'        => 23,
		'show_in_rest'          => true,
		'rest_base'             => 'about',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'about_init' );

/**
 * Sets the post updated messages for the `about` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `about` post type.
 */
function about_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['about'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'About updated. <a target="_blank" href="%s">View about</a>', 'tru-cms' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'tru-cms' ),
		3  => __( 'Custom field deleted.', 'tru-cms' ),
		4  => __( 'About updated.', 'tru-cms' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'About restored to revision from %s', 'tru-cms' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'About published. <a href="%s">View about</a>', 'tru-cms' ), esc_url( $permalink ) ),
		7  => __( 'About saved.', 'tru-cms' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'About submitted. <a target="_blank" href="%s">Preview about</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'About scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview about</a>', 'tru-cms' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'About draft updated. <a target="_blank" href="%s">Preview about</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'about_updated_messages' );
