<?php

/**
 * Registers the `faq` post type.
 */
function faq_init() {
	register_post_type( 'faq', array(
		'labels'                => array(
			'name'                  => __( 'Faqs', 'tru-cms' ),
			'singular_name'         => __( 'Faq', 'tru-cms' ),
			'all_items'             => __( 'All Faqs', 'tru-cms' ),
			'archives'              => __( 'Faq Archives', 'tru-cms' ),
			'attributes'            => __( 'Faq Attributes', 'tru-cms' ),
			'insert_into_item'      => __( 'Insert into faq', 'tru-cms' ),
			'uploaded_to_this_item' => __( 'Uploaded to this faq', 'tru-cms' ),
			'featured_image'        => _x( 'Featured Image', 'faq', 'tru-cms' ),
			'set_featured_image'    => _x( 'Set featured image', 'faq', 'tru-cms' ),
			'remove_featured_image' => _x( 'Remove featured image', 'faq', 'tru-cms' ),
			'use_featured_image'    => _x( 'Use as featured image', 'faq', 'tru-cms' ),
			'filter_items_list'     => __( 'Filter faqs list', 'tru-cms' ),
			'items_list_navigation' => __( 'Faqs list navigation', 'tru-cms' ),
			'items_list'            => __( 'Faqs list', 'tru-cms' ),
			'new_item'              => __( 'New Faq', 'tru-cms' ),
			'add_new'               => __( 'Add New', 'tru-cms' ),
			'add_new_item'          => __( 'Add New Faq', 'tru-cms' ),
			'edit_item'             => __( 'Edit Faq', 'tru-cms' ),
			'view_item'             => __( 'View Faq', 'tru-cms' ),
			'view_items'            => __( 'View Faqs', 'tru-cms' ),
			'search_items'          => __( 'Search faqs', 'tru-cms' ),
			'not_found'             => __( 'No faqs found', 'tru-cms' ),
			'not_found_in_trash'    => __( 'No faqs found in trash', 'tru-cms' ),
			'parent_item_colon'     => __( 'Parent Faq:', 'tru-cms' ),
			'menu_name'             => __( 'FAQs', 'tru-cms' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-editor-help',
		'menu_position'        => 22,
		'show_in_rest'          => true,
		'rest_base'             => 'faq',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'faq_init' );

/**
 * Sets the post updated messages for the `faq` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `faq` post type.
 */
function faq_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['faq'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Faq updated. <a target="_blank" href="%s">View faq</a>', 'tru-cms' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'tru-cms' ),
		3  => __( 'Custom field deleted.', 'tru-cms' ),
		4  => __( 'Faq updated.', 'tru-cms' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Faq restored to revision from %s', 'tru-cms' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Faq published. <a href="%s">View faq</a>', 'tru-cms' ), esc_url( $permalink ) ),
		7  => __( 'Faq saved.', 'tru-cms' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Faq submitted. <a target="_blank" href="%s">Preview faq</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Faq scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview faq</a>', 'tru-cms' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Faq draft updated. <a target="_blank" href="%s">Preview faq</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'faq_updated_messages' );
