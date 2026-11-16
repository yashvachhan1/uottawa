<?php
/**
 * Which posts stand in the Featured articles row.
 *
 * The row used to take whatever was newest, which is also what the row
 * under it takes, so the two showed the same thing. This lets the choice be
 * made on the post itself: tick the box and it stands there, untick it and
 * it drops back into the run of posts.
 *
 * Nothing ticked anywhere leaves the row empty, which would read as broken
 * rather than as a choice, so until something is ticked the row falls back
 * to the newest posts and behaves as it always did.
 *
 * @package uottawa-online
 */

defined( 'ABSPATH' ) || exit;

/**
 * The meta key the box writes to.
 */
function uottawa_featured_key() {
	return 'uottawa_featured';
}

/**
 * The ids in the Featured row, newest first.
 *
 * @param int $count How many to return.
 */
function uottawa_featured_ids( $count ) {
	$ids = get_posts(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => (int) $count,
			'fields'              => 'ids',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
			'meta_key'            => uottawa_featured_key(), // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
			'meta_value'          => '1',                    // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_value
		)
	);

	if ( $ids ) {
		return $ids;
	}

	// Nothing chosen yet: the newest, as before.
	return get_posts(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => (int) $count,
			'fields'              => 'ids',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
}

/**
 * The box, on a post.
 */
function uottawa_featured_meta_box() {
	add_meta_box(
		'uottawa-featured',
		__( 'Featured articles', 'uottawa-online' ),
		'uottawa_featured_render',
		'post',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'uottawa_featured_meta_box' );

/**
 * The checkbox itself.
 *
 * @param WP_Post $post The post being edited.
 */
function uottawa_featured_render( $post ) {
	$on = '1' === get_post_meta( $post->ID, uottawa_featured_key(), true );

	wp_nonce_field( 'uottawa_featured', 'uottawa_featured_nonce' );
	?>
	<p>
		<label for="uottawa-featured">
			<input type="checkbox" id="uottawa-featured" name="uottawa_featured" value="1" <?php checked( $on ); ?>>
			<?php esc_html_e( 'Show this post in the Featured articles row', 'uottawa-online' ); ?>
		</label>
	</p>
	<p class="description">
		<?php esc_html_e( 'The row holds three, newest first. With none of them ticked it shows the three most recent posts.', 'uottawa-online' ); ?>
	</p>
	<?php
}

/**
 * Save it.
 *
 * @param int $post_id The post being saved.
 */
function uottawa_featured_save( $post_id ) {
	if ( ! isset( $_POST['uottawa_featured_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['uottawa_featured_nonce'] ) ), 'uottawa_featured' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['uottawa_featured'] ) ) {
		update_post_meta( $post_id, uottawa_featured_key(), '1' );
	} else {
		delete_post_meta( $post_id, uottawa_featured_key() );
	}
}
add_action( 'save_post', 'uottawa_featured_save' );
