<?php
/**
 * Where a post's card button goes.
 *
 * The blog is written in English and kept on the English site. The French
 * site still lists the posts, but sending a reader to a French copy of
 * something that only exists in English means keeping two of everything —
 * so the button on the card can be pointed at the English post instead.
 *
 * Left empty it goes to the post here, as it always did.
 *
 * @package uottawa-online
 */

defined( 'ABSPATH' ) || exit;

/**
 * The URL set on a post, if any.
 *
 * @param int $post_id Post to ask about.
 */
function uottawa_card_url( $post_id ) {
	$url = trim( (string) get_post_meta( $post_id, 'uottawa_card_url', true ) );

	if ( '' === $url ) {
		return '';
	}

	return 0 === strpos( $url, 'http' ) ? $url : 'https://' . ltrim( $url, '/' );
}

/**
 * Whether that URL opens in a tab of its own.
 *
 * Asked rather than worked out: a link to the other site would otherwise be
 * given a new tab automatically, and which it should be is a choice here
 * rather than a rule.
 *
 * @param int $post_id Post to ask about.
 */
function uottawa_card_new_tab( $post_id ) {
	return '1' === get_post_meta( $post_id, 'uottawa_card_new_tab', true );
}

/**
 * Both, ready for the card: the address and the attributes to go with it.
 *
 * @param int    $post_id  Post to ask about.
 * @param string $fallback Where the button goes when nothing is set.
 */
function uottawa_card_link( $post_id, $fallback ) {
	$url = uottawa_card_url( $post_id );

	if ( '' === $url ) {
		return array( $fallback, '' );
	}

	$atts = uottawa_card_new_tab( $post_id ) ? ' target="_blank" rel="noopener noreferrer"' : '';

	return array( $url, $atts );
}

/**
 * The box, on a post.
 */
function uottawa_post_link_meta_box() {
	add_meta_box(
		'uottawa-post-link',
		__( 'Read more link', 'uottawa-online' ),
		'uottawa_post_link_render',
		'post',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'uottawa_post_link_meta_box' );

/**
 * The fields.
 *
 * @param WP_Post $post The post being edited.
 */
function uottawa_post_link_render( $post ) {
	$url = get_post_meta( $post->ID, 'uottawa_card_url', true );
	$new = uottawa_card_new_tab( $post->ID );

	wp_nonce_field( 'uottawa_post_link', 'uottawa_post_link_nonce' );
	?>
	<p>
		<label for="uottawa-card-url"><?php esc_html_e( 'Address the button on this post&rsquo;s card goes to:', 'uottawa-online' ); ?></label>
		<input type="url" class="widefat" id="uottawa-card-url"
			name="uottawa_card_url" value="<?php echo esc_attr( $url ); ?>"
			placeholder="https://enligne.uottawa.ca/&hellip;">
	</p>
	<p>
		<label for="uottawa-card-new-tab">
			<input type="checkbox" id="uottawa-card-new-tab" name="uottawa_card_new_tab" value="1" <?php checked( $new ); ?>>
			<?php esc_html_e( 'Open it in a new tab', 'uottawa-online' ); ?>
		</label>
	</p>
	<p class="description">
		<?php esc_html_e( 'Leave the address empty and the button goes to this post, as usual. Fill it in to send readers somewhere else — the version of this post on the other site, for instance.', 'uottawa-online' ); ?>
	</p>
	<?php
}

/**
 * Save them.
 *
 * @param int $post_id The post being saved.
 */
function uottawa_post_link_save( $post_id ) {
	if ( ! isset( $_POST['uottawa_post_link_nonce'] )
		|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['uottawa_post_link_nonce'] ) ), 'uottawa_post_link' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$url = isset( $_POST['uottawa_card_url'] )
		? esc_url_raw( trim( wp_unslash( $_POST['uottawa_card_url'] ) ) )
		: '';

	if ( '' === $url ) {
		delete_post_meta( $post_id, 'uottawa_card_url' );
	} else {
		update_post_meta( $post_id, 'uottawa_card_url', $url );
	}

	if ( isset( $_POST['uottawa_card_new_tab'] ) ) {
		update_post_meta( $post_id, 'uottawa_card_new_tab', '1' );
	} else {
		delete_post_meta( $post_id, 'uottawa_card_new_tab' );
	}
}
add_action( 'save_post', 'uottawa_post_link_save' );
