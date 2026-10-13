<?php
/**
 * Image pickers for the designed pages other than the landing page.
 *
 * Each page's photos are listed in a "Page images" box with the section they
 * belong to, and chosen from the media library. A field left empty falls back
 * to the picture the design ships, so emptying one never breaks the page.
 *
 * @package uottawa-online
 */

defined( 'ABSPATH' ) || exit;

/**
 * Which photos each template carries: meta key, label, and the shipped file.
 */
function uottawa_page_image_map() {
	$map = array(
		// Either name: the design is page-home.php, front-page.php loads it.
		'page-home.php' => array(
			array( 'img_home_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ),
			array( 'img_home_beyond_1', 'Beyond the credential &mdash; main photo', '1db0caf7dba8f8cfcd2ab1b78c55589d2203dad2.jpg' ),
			array( 'img_home_beyond_2', 'Beyond the credential &mdash; Life satisfaction', '9755731fb6ea8b22a9d25e00c68d1d505c1bfdbb.jpg' ),
			array( 'img_home_beyond_3', 'Beyond the credential &mdash; Deepen purpose', '07662f640130e427d17ab41521cec900d86b8ee3.jpg' ),
			array( 'img_home_day_1', 'A day in the life &mdash; The working professional', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg' ),
			array( 'img_home_day_2', 'A day in the life &mdash; The parent managing life and work', 'ec6f254c02d7b4af1e49d4a14a837ca24d7ebcbb.jpg' ),
			array( 'img_home_day_3', 'A day in the life &mdash; The lifelong learner', '37a62cab214313cb1ec754ace570845aadd6deb8.jpg' ),
		),
		'page-student-experience.php' => array(
			array( 'img_se_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ),
			array( 'img_se_day_1', 'A flexible day &mdash; The working professional', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg' ),
			array( 'img_se_day_2', 'A flexible day &mdash; The parent managing life and work', 'ec6f254c02d7b4af1e49d4a14a837ca24d7ebcbb.jpg' ),
			array( 'img_se_day_3', 'A flexible day &mdash; The lifelong learner', '37a62cab214313cb1ec754ace570845aadd6deb8.jpg' ),
			array( 'img_se_grad_main', 'What you&rsquo;ll graduate with &mdash; main photo', '1db0caf7dba8f8cfcd2ab1b78c55589d2203dad2.jpg' ),
			array( 'img_se_grad_1', 'What you&rsquo;ll graduate with &mdash; Universal recognition', '9755731fb6ea8b22a9d25e00c68d1d505c1bfdbb.jpg' ),
			array( 'img_se_grad_2', 'What you&rsquo;ll graduate with &mdash; Career integration', '07662f640130e427d17ab41521cec900d86b8ee3.jpg' ),
			array( 'img_se_grad_3', 'What you&rsquo;ll graduate with &mdash; Expanded opportunities', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg' ),
		),
		'page-news-events.php' => array(
			array( 'img_news_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ),
		),
	);

	$map['front-page.php'] = $map['page-home.php'];

	return $map;
}

/**
 * The chosen picture for a slot on the page being viewed, or the design's own.
 */
function uottawa_page_image( $key, $fallback ) {
	$id = get_queried_object_id();

	if ( $id ) {
		$chosen = get_post_meta( $id, $key, true );
		if ( $chosen ) {
			return $chosen;
		}
	}

	return $fallback;
}

/**
 * The template a page will actually render with, so the right slots are shown.
 */
function uottawa_page_template_file( $post ) {
	$assigned = get_post_meta( $post->ID, '_wp_page_template', true );

	if ( $assigned && 'default' !== $assigned ) {
		return $assigned;
	}

	if ( (int) get_option( 'page_on_front' ) === (int) $post->ID ) {
		return 'front-page.php';
	}

	return 'page-' . $post->post_name . '.php';
}

function uottawa_page_images_box() {
	$map = uottawa_page_image_map();

	foreach ( array_keys( $map ) as $template ) {
		add_meta_box(
			'uottawa_page_images_' . sanitize_key( $template ),
			__( 'Page images', 'uottawa-online' ),
			'uottawa_page_images_render',
			'page',
			'normal',
			'high'
		);
		break; // one box; which slots it shows is decided when it renders
	}
}
add_action( 'add_meta_boxes', 'uottawa_page_images_box' );

function uottawa_page_images_render( $post ) {
	$map      = uottawa_page_image_map();
	$template = uottawa_page_template_file( $post );

	if ( empty( $map[ $template ] ) ) {
		echo '<p>' . esc_html__( 'This page has no pictures of its own.', 'uottawa-online' ) . '</p>';
		return;
	}

	wp_nonce_field( 'uottawa_page_images_save', 'uottawa_page_images_nonce' );
	echo '<p>' . esc_html__( 'Every photo on this page, in the order it appears. Leave one empty to keep the design\'s own picture.', 'uottawa-online' ) . '</p>';

	foreach ( $map[ $template ] as $slot ) {
		list( $key, $label, $file ) = $slot;
		uottawa_landing_image_field( $post->ID, $key, $label, uottawa_asset( 'img/' . $file ) );
	}
}

function uottawa_page_images_save( $post_id ) {
	if ( ! isset( $_POST['uottawa_page_images_nonce'] )
		|| ! wp_verify_nonce( sanitize_key( $_POST['uottawa_page_images_nonce'] ), 'uottawa_page_images_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	foreach ( uottawa_page_image_map() as $slots ) {
		foreach ( $slots as $slot ) {
			$key = $slot[0];
			if ( isset( $_POST[ $key ] ) ) {
				update_post_meta( $post_id, $key, esc_url_raw( wp_unslash( $_POST[ $key ] ) ) );
			}
		}
	}
}
add_action( 'save_post', 'uottawa_page_images_save' );
