<?php

/**
 * Registers the `news` post type.
 */
function news_init() {
	register_post_type( 'news', array(
		'labels'                => array(
			'name'                  => __( 'News', 'tru-cms' ),
			'singular_name'         => __( 'News', 'tru-cms' ),
			'all_items'             => __( 'All News', 'tru-cms' ),
			'archives'              => __( 'News Archives', 'tru-cms' ),
			'attributes'            => __( 'News Attributes', 'tru-cms' ),
			'insert_into_item'      => __( 'Insert into news', 'tru-cms' ),
			'uploaded_to_this_item' => __( 'Uploaded to this news', 'tru-cms' ),
			'featured_image'        => _x( 'Featured Image', 'news', 'tru-cms' ),
			'set_featured_image'    => _x( 'Set featured image', 'news', 'tru-cms' ),
			'remove_featured_image' => _x( 'Remove featured image', 'news', 'tru-cms' ),
			'use_featured_image'    => _x( 'Use as featured image', 'news', 'tru-cms' ),
			'filter_items_list'     => __( 'Filter news list', 'tru-cms' ),
			'items_list_navigation' => __( 'News list navigation', 'tru-cms' ),
			'items_list'            => __( 'News list', 'tru-cms' ),
			'new_item'              => __( 'New News', 'tru-cms' ),
			'add_new'               => __( 'Add New', 'tru-cms' ),
			'add_new_item'          => __( 'Add New News', 'tru-cms' ),
			'edit_item'             => __( 'Edit News', 'tru-cms' ),
			'view_item'             => __( 'View News', 'tru-cms' ),
			'view_items'            => __( 'View News', 'tru-cms' ),
			'search_items'          => __( 'Search news', 'tru-cms' ),
			'not_found'             => __( 'No news found', 'tru-cms' ),
			'not_found_in_trash'    => __( 'No news found in trash', 'tru-cms' ),
			'parent_item_colon'     => __( 'Parent News:', 'tru-cms' ),
			'menu_name'             => __( 'News', 'tru-cms' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-welcome-widgets-menus',
		'show_in_rest'          => true,
		'rest_base'             => 'news',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'news_init' );

/**
 * Sets the post updated messages for the `news` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `news` post type.
 */
function news_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['news'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'News updated. <a target="_blank" href="%s">View news</a>', 'tru-cms' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'tru-cms' ),
		3  => __( 'Custom field deleted.', 'tru-cms' ),
		4  => __( 'News updated.', 'tru-cms' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'News restored to revision from %s', 'tru-cms' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'News published. <a href="%s">View news</a>', 'tru-cms' ), esc_url( $permalink ) ),
		7  => __( 'News saved.', 'tru-cms' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'News submitted. <a target="_blank" href="%s">Preview news</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'News scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview news</a>', 'tru-cms' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'News draft updated. <a target="_blank" href="%s">Preview news</a>', 'tru-cms' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'news_updated_messages' );
