<?php
/**
 * uOttawa Online theme setup.
 *
 * Ports the static HTML/CSS build to WordPress. The stylesheets are loaded in
 * the same order they were concatenated in the static page, so the rendered
 * output matches the original build.
 *
 * @package uottawa-online
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'UOTTAWA_VERSION', '1.0.0' );

/* -------------------------------------------------------------------------
 * Setup
 * ---------------------------------------------------------------------- */

function uottawa_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation (header)', 'uottawa-online' ),
		)
	);
}
add_action( 'after_setup_theme', 'uottawa_setup' );

/* -------------------------------------------------------------------------
 * Assets
 * ---------------------------------------------------------------------- */

function uottawa_assets() {
	$dir = get_template_directory_uri();
	$v   = UOTTAWA_VERSION;

	wp_enqueue_style(
		'uottawa-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'uottawa-tokens',     $dir . '/assets/css/tokens.css',     array(), $v );
	wp_enqueue_style( 'uottawa-base',       $dir . '/assets/css/base.css',       array( 'uottawa-tokens' ), $v );
	wp_enqueue_style( 'uottawa-components', $dir . '/assets/css/components.css', array( 'uottawa-base' ), $v );
	wp_enqueue_style( 'uottawa-sections',   $dir . '/assets/css/sections.css',   array( 'uottawa-components' ), $v );
	wp_enqueue_style( 'uottawa-mobile',     $dir . '/assets/css/mobile.css',     array( 'uottawa-sections' ), $v );

	// style.css only carries the theme header, but WordPress tooling expects it.
	wp_enqueue_style( 'uottawa-online', get_stylesheet_uri(), array( 'uottawa-mobile' ), $v );

	wp_enqueue_script( 'uottawa-main', $dir . '/assets/js/main.js', array(), $v, true );
}
add_action( 'wp_enqueue_scripts', 'uottawa_assets' );

function uottawa_resource_hints( $urls, $relation ) {
	if ( 'preconnect' === $relation ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => '',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'uottawa_resource_hints', 10, 2 );

/* -------------------------------------------------------------------------
 * Helpers
 * ---------------------------------------------------------------------- */

/**
 * URL of a file under assets/, e.g. uottawa_asset( 'icons/logo-group.svg' ).
 */
function uottawa_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * URL of a page by slug, falling back to the home page if it does not exist yet.
 */
function uottawa_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' );
}

/**
 * The two site-wide call-to-action links, editable under Appearance > Customize.
 */
function uottawa_cta_url( $which ) {
	$defaults = array(
		'apply'   => 'https://www.uottawa.ca/study/applying-uottawa',
		'request' => '/contact/',
	);
	$value = get_theme_mod( 'uottawa_' . $which . '_url', $defaults[ $which ] );
	return 0 === strpos( $value, 'http' ) ? $value : home_url( $value );
}

/**
 * Header navigation when no menu has been assigned yet.
 */
function uottawa_primary_menu_fallback() {
	$items = array(
		'online-programs'    => __( 'Online programs', 'uottawa-online' ),
		'student-experience' => __( 'Student experience', 'uottawa-online' ),
		'news-events'        => __( 'News &amp; events', 'uottawa-online' ),
	);

	echo '<ul>';
	foreach ( $items as $slug => $label ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( uottawa_page_url( $slug ) ),
			wp_kses_post( $label )
		);
	}
	echo '</ul>';
}

/* -------------------------------------------------------------------------
 * Article cards
 *
 * The Figma design ships these as "[Image placeholder]" cards. Once posts
 * exist they are rendered from the real posts instead; until then the
 * placeholder markup from the design is kept so the layout still reads.
 * ---------------------------------------------------------------------- */

function uottawa_article_cards( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'count'  => 3,
			'offset' => 0,
			'labels' => array(
				'kicker'  => '[Program Name]',
				'title'   => '[Blog post title]',
				'excerpt' => '[Brief description of the blog post]',
				'meta'    => '[By] [Date]',
			),
		)
	);

	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'posts_per_page'      => (int) $args['count'],
			'offset'              => (int) $args['offset'],
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			$terms  = get_the_category();
			$kicker = $terms ? $terms[0]->name : $args['labels']['kicker'];
			$meta   = sprintf(
				/* translators: 1: author name, 2: publish date */
				__( 'By %1$s | %2$s', 'uottawa-online' ),
				get_the_author(),
				get_the_date()
			);

			uottawa_article_card(
				array(
					'url'     => get_permalink(),
					'media'   => has_post_thumbnail() ? get_the_post_thumbnail( null, 'large' ) : '',
					'kicker'  => $kicker,
					'title'   => get_the_title(),
					'excerpt' => wp_trim_words( get_the_excerpt(), 22 ),
					'meta'    => $meta,
				)
			);
		}
		wp_reset_postdata();
		return;
	}

	for ( $i = 0; $i < (int) $args['count']; $i++ ) {
		uottawa_article_card(
			array(
				'url'     => '#',
				'media'   => '',
				'kicker'  => $args['labels']['kicker'],
				'title'   => $args['labels']['title'],
				'excerpt' => $args['labels']['excerpt'],
				'meta'    => $args['labels']['meta'],
			)
		);
	}
}

function uottawa_article_card( $card ) {
	?>
	<article class="article-card">
		<div class="article-card__media">
			<?php if ( $card['media'] ) : ?>
				<?php echo wp_kses_post( $card['media'] ); ?>
			<?php else : ?>
				<span class="article-card__placeholder"><?php esc_html_e( '[Image placeholder]', 'uottawa-online' ); ?></span>
			<?php endif; ?>
		</div>
		<div class="article-card__body">
			<p class="article-card__kicker"><?php echo esc_html( $card['kicker'] ); ?></p>
			<h3 class="article-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
			<p class="article-card__excerpt"><?php echo esc_html( $card['excerpt'] ); ?></p>
			<p class="article-card__meta"><?php echo esc_html( $card['meta'] ); ?></p>
			<a class="btn btn--red btn--md" href="<?php echo esc_url( $card['url'] ); ?>"><?php esc_html_e( 'Read more', 'uottawa-online' ); ?></a>
		</div>
	</article>
	<?php
}

/* -------------------------------------------------------------------------
 * Customizer
 * ---------------------------------------------------------------------- */

function uottawa_customize( $wp_customize ) {
	$wp_customize->add_section(
		'uottawa_site',
		array(
			'title'    => __( 'uOttawa Online', 'uottawa-online' ),
			'priority' => 30,
		)
	);

	$fields = array(
		'uottawa_apply_url'    => array( __( '"Apply now" link', 'uottawa-online' ), 'https://www.uottawa.ca/study/applying-uottawa' ),
		'uottawa_request_url'  => array( __( '"Request info" link', 'uottawa-online' ), '/contact/' ),
		'uottawa_footer_text'  => array( __( 'Footer text', 'uottawa-online' ), '© University of Ottawa  |  Privacy  |  Accessibility' ),
	);

	foreach ( $fields as $id => $field ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $field[1],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $field[0],
				'section' => 'uottawa_site',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'uottawa_customize' );
