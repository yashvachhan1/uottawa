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
			array( 'img_home_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg', 'Two colleagues talking and laughing across a desk in a bright open-plan office' ),
			array( 'img_home_beyond_1', 'Beyond the credential &mdash; main photo', '1db0caf7dba8f8cfcd2ab1b78c55589d2203dad2.jpg', 'A woman smiling at her laptop at the dining table while her family sits on the sofa behind her' ),
			array( 'img_home_beyond_2', 'Beyond the credential &mdash; Life satisfaction', '9755731fb6ea8b22a9d25e00c68d1d505c1bfdbb.jpg', 'A man holding a pen, smiling at his screen in a busy open-plan office' ),
			array( 'img_home_beyond_3', 'Beyond the credential &mdash; Deepen purpose', '07662f640130e427d17ab41521cec900d86b8ee3.jpg', 'A woman in a suit smiling as she sets her notes down on a shared work table' ),
			array( 'img_home_day_1', 'A day in the life &mdash; The working professional', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg', 'A woman working at a computer in a shared study space' ),
			array( 'img_home_day_2', 'A day in the life &mdash; The parent managing life and work', 'ec6f254c02d7b4af1e49d4a14a837ca24d7ebcbb.jpg', 'A woman holding her baby in one arm while working on a laptop in her kitchen' ),
			array( 'img_home_day_3', 'A day in the life &mdash; The lifelong learner', '37a62cab214313cb1ec754ace570845aadd6deb8.jpg', 'A man pausing to think at his laptop at a kitchen table, a notebook and headphones beside him' ),
		),
		'page-student-experience.php' => array(
			array( 'img_se_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg', 'Two colleagues talking and laughing across a desk in a bright open-plan office' ),
			array( 'img_se_day_1', 'A flexible day &mdash; The working professional', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg', 'A woman working at a computer in a shared study space' ),
			array( 'img_se_day_2', 'A flexible day &mdash; The parent managing life and work', 'ec6f254c02d7b4af1e49d4a14a837ca24d7ebcbb.jpg', 'A woman holding her baby in one arm while working on a laptop in her kitchen' ),
			array( 'img_se_day_3', 'A flexible day &mdash; The lifelong learner', '37a62cab214313cb1ec754ace570845aadd6deb8.jpg', 'A man pausing to think at his laptop at a kitchen table, a notebook and headphones beside him' ),
			array( 'img_se_grad_main', 'What you&rsquo;ll graduate with &mdash; main photo', '1db0caf7dba8f8cfcd2ab1b78c55589d2203dad2.jpg', 'A woman smiling at her laptop at the dining table while her family sits on the sofa behind her' ),
			array( 'img_se_grad_1', 'What you&rsquo;ll graduate with &mdash; Universal recognition', '9755731fb6ea8b22a9d25e00c68d1d505c1bfdbb.jpg', 'A man holding a pen, smiling at his screen in a busy open-plan office' ),
			array( 'img_se_grad_2', 'What you&rsquo;ll graduate with &mdash; Career integration', '07662f640130e427d17ab41521cec900d86b8ee3.jpg', 'A woman in a suit smiling as she sets her notes down on a shared work table' ),
			array( 'img_se_grad_3', 'What you&rsquo;ll graduate with &mdash; Expanded opportunities', '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg', 'A woman working at a computer in a shared study space' ),
		),
		'page-news-events.php' => array(
			array( 'img_news_hero', 'Hero', '007bc2f82e5e246d911896471b7b9f9f39c57034.jpg', 'Two colleagues talking and laughing across a desk in a bright open-plan office' ),
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
 * The alt text for a slot: whatever the page sets, else the description the
 * design ships with. A picture swapped out for another one keeps the old
 * description until someone writes a new one, so the field sits beside the
 * picker rather than out of sight.
 *
 * @param string $key      Meta key of the image slot.
 * @param string $fallback The design's own description.
 */
function uottawa_page_image_alt( $key, $fallback ) {
	$id = get_queried_object_id();

	if ( $id ) {
		$set = get_post_meta( $id, $key . '_alt', true );

		if ( '' !== trim( (string) $set ) ) {
			return $set;
		}

		// Nothing written on the page, so ask the media library about the
		// picture that is actually in the slot. Someone who swapped the
		// picture and described it there expects that description to show,
		// and the design's own wording describes a picture that is no
		// longer on screen.
		$chosen = get_post_meta( $id, $key, true );

		if ( $chosen ) {
			$alt = uottawa_attachment_alt( $chosen );

			if ( '' !== $alt ) {
				return $alt;
			}
		}
	}

	return $fallback;
}

/**
 * The alt text the media library holds for a picture, found by its URL.
 *
 * The pickers store a URL rather than an id, so the attachment has to be
 * looked up. A URL copied at a particular size carries that size in its
 * name, which matches no attachment, so the size is taken off and tried
 * again before giving up.
 *
 * @param string $url Image URL.
 */
function uottawa_attachment_alt( $url ) {
	$url = strtok( $url, '?' );

	$id = attachment_url_to_postid( $url );

	if ( ! $id ) {
		$full = preg_replace( '/-\d+x\d+(\.[a-z0-9]+)$/i', '$1', $url );

		if ( $full !== $url ) {
			$id = attachment_url_to_postid( $full );
		}
	}

	if ( ! $id ) {
		return '';
	}

	return trim( (string) get_post_meta( $id, '_wp_attachment_image_alt', true ) );
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
		list( $key, $label, $file, $alt ) = $slot;
		uottawa_landing_image_field( $post->ID, $key, $label, uottawa_asset( 'img/' . $file ) );

		$set = get_post_meta( $post->ID, $key . '_alt', true );

		echo '<p class="uottawa-img-alt"><label for="' . esc_attr( $key ) . '_alt">'
			. esc_html__( 'Alt text', 'uottawa-online' ) . '</label><br>'
			. '<input type="text" class="widefat" id="' . esc_attr( $key ) . '_alt"'
			. ' name="' . esc_attr( $key ) . '_alt" value="' . esc_attr( $set ) . '"'
			. ' placeholder="' . esc_attr( $alt ) . '"></p>';
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
			if ( isset( $_POST[ $key . '_alt' ] ) ) {
				update_post_meta( $post_id, $key . '_alt', sanitize_text_field( wp_unslash( $_POST[ $key . '_alt' ] ) ) );
			}
		}
	}
}
add_action( 'save_post', 'uottawa_page_images_save' );
