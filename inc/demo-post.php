<?php
/**
 * The sample blog post.
 *
 * The blog templates have nothing to show on a fresh install, so the news
 * row falls back to placeholders and the post design cannot be reviewed at
 * all. This writes one real post — copy, category and a featured image from
 * the theme's own pictures — so both are there the moment the theme is in.
 *
 * It runs from first-run setup, once. Delete the post afterwards and it
 * stays deleted; the option below is what remembers that.
 *
 * @package uottawa-online
 */

defined( 'ABSPATH' ) || exit;

/**
 * The post's fixed slug, so the thing is only ever created once.
 */
function uottawa_demo_post_slug() {
	return 'five-questions-before-you-start-an-online-degree';
}

/**
 * Title, category, excerpt and body.
 */
function uottawa_demo_post_content() {
	return array(
		'title'    => __( 'Five questions to ask before you start an online degree', 'uottawa-online' ),
		'category' => __( 'Online learning', 'uottawa-online' ),
		'image'    => '3e1772b0e58a5483675ed988eb03ba7aea539c1f.jpg',
		'alt'      => __( 'A student working at a desk in a shared study space', 'uottawa-online' ),
		'excerpt'  => __( 'Studying online is a different rhythm, not an easier one. These five questions are the ones worth answering before you apply, not after.', 'uottawa-online' ),
		'body'     => '
<p>An online degree asks the same of you as a degree on campus: the reading, the deadlines, the thinking. What changes is where the structure comes from. On campus a timetable holds the week together. Online, you hold it together yourself — and that is a skill, not a personality trait. It can be learned, and it is worth being honest with yourself about before you start.</p>

<p>Here are the five questions we are asked most often, and the answers we give.</p>

<h2>1. How many hours will this actually take?</h2>

<p>Plan on six to nine hours a week for each course. Some weeks are lighter, and the weeks with an assignment due are heavier. The number that matters is not the total but whether those hours exist in your week at all — most people find them in early mornings, lunch breaks and one weekend block, rather than in one long evening.</p>

<h2>2. Can I keep working full time?</h2>

<p>Most of our students do. Two courses a term alongside a full-time job is the pace that works for the majority; three is possible for a term or two, and rarely sustainable for longer. You are not behind if you take the slower route — an accelerated program is built so that the pace is yours to set.</p>

<blockquote><p>The students who finish are not the ones with the most free time. They are the ones who decided in advance which hours belonged to the degree.</p></blockquote>

<h2>3. Will I be learning on my own?</h2>

<p>No. Courses run on a weekly rhythm with the same group of people, and there is a mix of discussion, group work and live sessions alongside the material you work through at your own time. Your instructors hold regular office hours, and the academic advising team is there for everything from course planning to a term that has gone sideways.</p>

<h2>4. Do my previous studies count?</h2>

<p>Often, yes. College credentials, previous university study and, in some cases, professional qualifications can be assessed for transfer credit, which can take a meaningful amount of time off the degree. This is assessed individually, so the only way to know is to ask — and it is worth asking before you apply, not after.</p>

<h2>5. What happens if a term goes badly?</h2>

<p>Life does not stop for a degree. Illness, a new job, a family that needs you — these are ordinary, and the program is built to absorb them. You can reduce your course load, defer a term or pick the degree back up later. Talk to an advisor early; almost everything is easier to solve in week three than in week eleven.</p>

<h3>Still deciding?</h3>

<p>If you are weighing this up, the most useful next step is a conversation rather than more reading. Tell us where you are and what you are hoping the degree will do for you, and we will tell you honestly whether this is the right fit.</p>
',
	);
}

/**
 * Put the theme's own picture in the media library and hand back its id.
 *
 * The file lives in the theme, so it is copied into uploads rather than
 * downloaded — a fresh site may not be reachable from itself yet.
 *
 * @param string $file Filename inside assets/img.
 * @param string $alt  Alternative text.
 * @param int    $post Post to attach it to.
 */
function uottawa_demo_post_image( $file, $alt, $post ) {
	$source = get_theme_file_path( 'assets/img/' . $file );

	if ( ! file_exists( $source ) ) {
		return 0;
	}

	$upload = wp_upload_bits( $file, null, file_get_contents( $source ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( ! empty( $upload['error'] ) ) {
		return 0;
	}

	$id = wp_insert_attachment(
		array(
			'post_mime_type' => 'image/jpeg',
			'post_title'     => sanitize_text_field( $alt ),
			'post_status'    => 'inherit',
		),
		$upload['file'],
		$post
	);

	if ( is_wp_error( $id ) || ! $id ) {
		return 0;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	wp_update_attachment_metadata( $id, wp_generate_attachment_metadata( $id, $upload['file'] ) );
	update_post_meta( $id, '_wp_attachment_image_alt', $alt );

	return $id;
}

/**
 * Write the post, once.
 */
function uottawa_demo_post() {
	if ( get_option( 'uottawa_demo_post_setup' ) ) {
		return;
	}

	// Marked done before anything else: a half-finished attempt should not
	// leave the site writing the post again on every admin page load.
	update_option( 'uottawa_demo_post_setup', 1 );

	if ( get_page_by_path( uottawa_demo_post_slug(), OBJECT, 'post' ) ) {
		return;
	}

	$demo = uottawa_demo_post_content();

	// Left to itself wp_insert_post files this under user 0 when it runs from
	// setup rather than from a logged-in screen, and the byline comes out
	// empty. Put it under an administrator.
	$admins = get_users(
		array(
			'role'    => 'administrator',
			'number'  => 1,
			'orderby' => 'ID',
			'fields'  => 'ID',
		)
	);

	$id = wp_insert_post(
		array(
			'post_type'    => 'post',
			'post_author'  => $admins ? (int) $admins[0] : 1,
			'post_name'    => uottawa_demo_post_slug(),
			'post_title'   => $demo['title'],
			'post_excerpt' => $demo['excerpt'],
			'post_content' => trim( $demo['body'] ),
			'post_status'  => 'publish',
		)
	);

	if ( is_wp_error( $id ) || ! $id ) {
		return;
	}

	$term = term_exists( $demo['category'], 'category' );

	if ( ! $term ) {
		$term = wp_insert_term( $demo['category'], 'category' );
	}

	if ( ! is_wp_error( $term ) ) {
		wp_set_post_categories( $id, array( (int) $term['term_id'] ) );
	}

	$image = uottawa_demo_post_image( $demo['image'], $demo['alt'], $id );

	if ( $image ) {
		set_post_thumbnail( $id, $image );
	}
}
