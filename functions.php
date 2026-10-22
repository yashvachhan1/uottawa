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

define( 'UOTTAWA_VERSION', '1.1.0' );

// Program landing page: editor meta boxes + the [uottawa_landing] shortcode.
require_once get_template_directory() . '/inc/landing-page.php';
require_once get_template_directory() . '/inc/page-images.php';
require_once get_template_directory() . '/inc/page-form.php';
require_once get_template_directory() . '/inc/language-link.php';

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

	// The landing page carries its own self-contained stylesheet.
	if ( uottawa_is_landing_page() ) {
		wp_enqueue_style( 'uottawa-landing', $dir . '/assets/css/landing.css', array( 'uottawa-online' ), $v );
	}

	// A blog post is long-form and sizes its own type, so it carries its own
	// stylesheet rather than bending the page scale.
	if ( is_singular( 'post' ) ) {
		wp_enqueue_style( 'uottawa-blog', $dir . '/assets/css/blog.css', array( 'uottawa-online' ), $v );
	}

	// The privacy policy keeps the microsite's own look, in its own file.
	if ( is_page_template( 'page-privacy-policy.php' ) ) {
		wp_enqueue_style( 'uottawa-legal', $dir . '/assets/css/legal.css', array( 'uottawa-online' ), $v );
	}

	// Forminator draws its own markup, which needs bringing into line with
	// whichever card it is standing in — the landing page's or the contact
	// page's. Only loaded where a form is actually shown.
	if ( uottawa_is_landing_page() || uottawa_page_form_shortcode() ) {
		// After landing.css where that is loaded, so the two never tie.
		$uottawa_after = wp_style_is( 'uottawa-landing', 'enqueued' ) ? 'uottawa-landing' : 'uottawa-online';
		wp_enqueue_style( 'uottawa-forminator', $dir . '/assets/css/forminator.css', array( $uottawa_after ), $v );
	}

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
 * URL of a file under assets/, e.g. uottawa_asset( 'icons/logo.png' ).
 */
function uottawa_asset( $path ) {
	return get_template_directory_uri() . '/assets/' . ltrim( $path, '/' );
}

/**
 * True on a page that renders the program landing page, either through the
 * template or the [uottawa_landing] shortcode.
 */
/**
 * Whether the landing design has actually been rendered on this request.
 *
 * uottawa_is_landing_page() also answers yes to a page that merely has the
 * shortcode sitting in its content while a different template is assigned,
 * which is right for loading the stylesheet but wrong for the footer: that
 * page never shows a Final CTA, so it still needs the site-wide band.
 */
function uottawa_landing_rendered() {
	return ! empty( $GLOBALS['uottawa_landing_rendered'] );
}

function uottawa_is_landing_page() {
	if ( ! is_singular() ) {
		return false;
	}

	if ( is_page_template( 'page-landing.php' ) ) {
		return true;
	}

	$post = get_post();

	return $post && has_shortcode( $post->post_content, 'uottawa_landing' );
}

/**
 * Where the "FR" switch points.
 *
 * Defaults follow the Pantheon environment, as the original plugin did, and
 * can be overridden under Appearance > Customize.
 */
function uottawa_french_url() {
	$default = 'https://enligne.uottawa.ca/';

	if ( defined( 'PANTHEON_ENVIRONMENT' ) ) {
		switch ( PANTHEON_ENVIRONMENT ) {
			case 'dev':
				$default = 'https://dev-borealuottawa-enligne.pantheonsite.io/';
				break;
			case 'test':
				$default = 'https://test-borealuottawa-enligne.pantheonsite.io/';
				break;
			case 'live':
				$default = 'https://enligne.uottawa.ca/';
				break;
			default:
				$default = 'https://live-borealuottawa-enligne.pantheonsite.io/';
		}
	}

	return get_theme_mod( 'uottawa_french_url', $default );
}

/**
 * The program page's slug, and its counterpart on the other language's site.
 *
 * The client set both: EN bachelor-of-arts-interdisciplinary-studies-online-accelerated,
 * FR baccalaureat-es-arts-etudes-interdisciplinaire-accelere-en-ligne.
 */
function uottawa_program_slug() {
	return 'bachelor-of-arts-interdisciplinary-studies-online-accelerated';
}

function uottawa_program_slug_other() {
	return 'baccalaureat-es-arts-etudes-interdisciplinaire-accelere-en-ligne';
}

/**
 * The slug the program page used to carry. A site built before the rename
 * still has it, and links to it are already out in the world.
 */
function uottawa_program_slug_old() {
	return 'online-programs';
}

/**
 * The two sites name the program page differently, so the language switch
 * cannot just carry the path across for that one page.
 */
function uottawa_program_slug_map( $map ) {
	$map[ uottawa_program_slug() ]     = uottawa_program_slug_other();
	$map[ uottawa_program_slug_old() ] = uottawa_program_slug_other();

	return $map;
}
add_filter( 'uottawa_language_slug_map', 'uottawa_program_slug_map' );

/**
 * URL of a page by slug, falling back to the home page if it does not exist yet.
 */
function uottawa_page_url( $slug ) {
	$page = uottawa_program_slug() === $slug
		? uottawa_program_page()
		: get_page_by_path( $slug );

	// Empty, not the home page: a menu item that cannot find its page should
	// be left out rather than quietly sending people somewhere else.
	return $page ? get_permalink( $page ) : '';
}

/**
 * The program page, wherever it currently sits.
 *
 * Its slug changed, and a site only moves across when setup next runs, so
 * look under the new name, then the old one, then for whichever page carries
 * the landing template.
 */
function uottawa_program_page() {
	$page = get_page_by_path( uottawa_program_slug() );

	if ( $page ) {
		return $page;
	}

	$page = get_page_by_path( uottawa_program_slug_old() );

	if ( $page ) {
		return $page;
	}

	$found = get_posts(
		array(
			'post_type'   => 'page',
			'numberposts' => 1,
			'meta_key'    => '_wp_page_template',
			'meta_value'  => 'page-landing.php',
		)
	);

	return $found ? $found[0] : null;
}

/**
 * The two site-wide call-to-action links, editable under Appearance > Customize.
 */
function uottawa_cta_url( $which ) {
	$defaults = array(
		'apply'      => 'https://www.uottawa.ca/study/applying-uottawa',
		'request'    => '/contact/',
		// The copy deck calls for a course map download but does not name the
		// file yet; set it under Appearance > Customize when it exists.
		'coursemap'  => '',
	);
	if ( ! isset( $defaults[ $which ] ) ) {
		return '#';
	}
	$value = get_theme_mod( 'uottawa_' . $which . '_url', $defaults[ $which ] );
	if ( '' === $value ) {
		return '#';
	}
	return 0 === strpos( $value, 'http' ) ? $value : home_url( $value );
}

/**
 * Attributes for a link, so that anything leaving this site opens in its own
 * tab. Links back into online.uottawa.ca get none, as do placeholders.
 */
function uottawa_link_atts( $url ) {
	$host = wp_parse_url( $url, PHP_URL_HOST );
	if ( ! $host || $host === wp_parse_url( home_url(), PHP_URL_HOST ) ) {
		return '';
	}
	return ' target="_blank" rel="noopener noreferrer"';
}

/**
 * Where the language switch sends you: the same page on the other site, not
 * its home page.
 *
 * Both sites use the same slugs today, so the path carries across as it is.
 * Should one side's slugs ever be translated, map them through the
 * uottawa_language_slug_map filter rather than changing this.
 */
function uottawa_language_switch_url() {
	// Set by hand on the page itself, when the two sites no longer name it
	// the same. Appearance > Customize cannot know that per page, so the
	// page's own field wins over anything worked out below.
	$set = uottawa_language_url_override();

	if ( $set ) {
		return $set;
	}

	$base = untrailingslashit( uottawa_french_url() );
	$map  = (array) apply_filters( 'uottawa_language_slug_map', array() );

	if ( is_front_page() || is_home() ) {
		return $base . '/';
	}

	$object = get_queried_object();
	$slug   = ( $object instanceof WP_Post ) ? $object->post_name : '';

	if ( ! $slug ) {
		return $base . '/';
	}

	if ( isset( $map[ $slug ] ) ) {
		$slug = $map[ $slug ];
	}

	return $base . '/' . $slug . '/';
}

/**
 * Where the uOttawa lockup in the header points: the university's own site,
 * in this site's language.
 */
function uottawa_logo_url() {
	return get_theme_mod( 'uottawa_logo_url', 'https://www.uottawa.ca/en' );
}

/**
 * Header navigation when no menu has been assigned yet.
 */
function uottawa_primary_menu_fallback() {
	$items = array(
		'home'               => __( 'Home', 'uottawa-online' ),
		uottawa_program_slug() => __( 'Online programs', 'uottawa-online' ),
		'student-experience' => __( 'Student experience', 'uottawa-online' ),
		'news-events'        => __( 'News &amp; events', 'uottawa-online' ),
	);

	$here = (int) get_queried_object_id();

	echo '<ul>';
	foreach ( $items as $slug => $label ) {
		$page = uottawa_program_slug() === $slug
			? uottawa_program_page()
			: get_page_by_path( $slug );

		if ( ! $page ) {
			continue;
		}

		printf(
			'<li><a href="%s"%s>%s</a></li>',
			esc_url( get_permalink( $page ) ),
			( $here && (int) $page->ID === $here ) ? ' aria-current="page"' : '',
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

	$shown = 0;

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
			++$shown;
		}
		wp_reset_postdata();
	}

	// The design lays this row out for a fixed number of cards. Until the site
	// has that many posts, fill the rest with the design's own placeholder so
	// the row keeps its shape instead of collapsing to whatever exists.
	for ( $i = $shown; $i < (int) $args['count']; $i++ ) {
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
			<a class="btn btn--red btn--read" href="<?php echo esc_url( $card['url'] ); ?>"><?php esc_html_e( 'Read more', 'uottawa-online' ); ?></a>
		</div>
	</article>
	<?php
}

/* -------------------------------------------------------------------------
 * First-run setup
 *
 * Activating the theme builds the four designed pages, points the front page
 * at Home, fills the header menu and switches on pretty permalinks. Anything
 * that already exists is left alone, so re-activating is safe.
 * ---------------------------------------------------------------------- */

function uottawa_first_run() {
	$pages = array(
		'home'               => array( __( 'Home', 'uottawa-online' ), 'page-home.php' ),
		uottawa_program_slug() => array( __( 'Online programs', 'uottawa-online' ), 'page-landing.php' ),
		'student-experience' => array( __( 'Student experience', 'uottawa-online' ), 'page-student-experience.php' ),
		'news-events'        => array( __( 'News & events', 'uottawa-online' ), 'page-news-events.php' ),
		'contact'            => array( __( 'Contact', 'uottawa-online' ), 'page-contact.php' ),
		'privacy-policy'     => array( __( 'Privacy policy', 'uottawa-online' ), 'page-privacy-policy.php' ),
	);

	// The program page may be sitting under the slug it used to have, or
	// under the other language's, if this install has been through the
	// companion theme. Move it across once, and only while it carries one of
	// those — a slug someone has since chosen is theirs, and a page already
	// at the right slug is left alone.
	if ( ! get_page_by_path( uottawa_program_slug() ) ) {
		foreach ( array( uottawa_program_slug_old(), uottawa_program_slug_other() ) as $was ) {
			$old = get_page_by_path( $was );

			if ( $old ) {
				wp_update_post(
					array(
						'ID'        => $old->ID,
						'post_name' => uottawa_program_slug(),
					)
				);
				break;
			}
		}
	}

	$ids = array();

	// Slugs this theme has already set up. A page removed afterwards was
	// removed on purpose, so it is not built again; only slugs the theme has
	// never created are.
	$done = (array) get_option( 'uottawa_pages_setup', array() );

	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );

		if ( ! $existing && in_array( $slug, $done, true ) ) {
			continue;
		}

		if ( ! $existing ) {
			// Trashing a page renames it "<slug>__trashed" but keeps its
			// content and meta, so bring that one back rather than leaving a
			// second, empty copy beside it.
			$trashed = get_posts(
				array(
					'post_type'   => 'page',
					'post_status' => 'trash',
					'name'        => $slug . '__trashed',
					'numberposts' => 1,
				)
			);

			if ( $trashed ) {
				$existing = $trashed[0];
				wp_untrash_post( $existing->ID );
				wp_update_post(
					array(
						'ID'          => $existing->ID,
						'post_name'   => $slug,
						'post_status' => 'publish',
					)
				);
			}
		}

		if ( $existing ) {
			$ids[ $slug ] = $existing->ID;
		} else {
			$id = wp_insert_post(
				array(
					'post_type'    => 'page',
					'post_name'    => $slug,
					'post_title'   => $page[0],
					'post_status'  => 'publish',
					'post_content' => '',
				)
			);

			if ( is_wp_error( $id ) ) {
				continue;
			}

			$ids[ $slug ] = $id;
		}

		// page-<slug>.php already wins by slug; the meta keeps the right
		// template if someone later renames the page.
		if ( $page[1] ) {
			update_post_meta( $ids[ $slug ], '_wp_page_template', $page[1] );
		}

		if ( ! in_array( $slug, $done, true ) ) {
			$done[] = $slug;
		}
	}

	update_option( 'uottawa_pages_setup', $done );

	// Static front page, set once. Whichever page the site points at later is
	// the site's business.
	if ( isset( $ids['home'] ) && ! get_option( 'page_on_front' ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $ids['home'] );
	}

	uottawa_first_run_menu( $ids );

	// Pretty permalinks, unless the site already has a structure set.
	if ( ! get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();

	update_option( 'uottawa_setup_version', uottawa_theme_version() );
}
add_action( 'after_switch_theme', 'uottawa_first_run' );

/**
 * front-page.php outranks a page's own template, so the landing page set as
 * the front page would render the home design instead of itself. Step aside
 * whenever the front page carries a template of its own.
 */
function uottawa_front_page_template( $template ) {
	$front = (int) get_option( 'page_on_front' );

	if ( ! $front ) {
		return $template;
	}

	$assigned = get_post_meta( $front, '_wp_page_template', true );

	if ( ! $assigned || 'default' === $assigned ) {
		return $template;
	}

	// Name the file rather than returning an empty string: that would hand the
	// front page back to the template hierarchy, which picks by slug and can
	// land on another page's template altogether.
	$located = locate_template( $assigned );

	return $located ? $located : $template;
}
add_filter( 'frontpage_template', 'uottawa_front_page_template' );

/**
 * The theme's own version, used to decide whether setup should run again.
 */
function uottawa_theme_version() {
	$theme = wp_get_theme( get_template() );
	return $theme->get( 'Version' );
}

/**
 * after_switch_theme only fires when the theme is activated by hand, so a
 * pull that brings a new version down never re-runs setup - and a page the
 * client trashed in the meantime stays gone. Re-run it once per version.
 */
function uottawa_maybe_first_run() {
	if ( get_option( 'uottawa_setup_version' ) === uottawa_theme_version() ) {
		return;
	}
	uottawa_first_run();
}
add_action( 'admin_init', 'uottawa_maybe_first_run' );

/**
 * Put the home page at the front of an existing header menu.
 *
 * The menu was built before the design called for it, so a site set up
 * earlier is missing it. Added once, and only if it is not there already —
 * a menu someone has since arranged is otherwise left alone.
 */
function uottawa_menu_add_home( $ids ) {
	if ( empty( $ids['home'] ) ) {
		return;
	}

	$menu_id = (int) ( get_theme_mod( 'nav_menu_locations', array() )['primary'] ?? 0 );

	if ( ! $menu_id ) {
		return;
	}

	$items = wp_get_nav_menu_items( $menu_id );

	if ( ! is_array( $items ) ) {
		return;
	}

	foreach ( $items as $item ) {
		if ( 'post_type' === $item->type && (int) $item->object_id === (int) $ids['home'] ) {
			return;
		}
	}

	$new_id = wp_update_nav_menu_item(
		$menu_id,
		0,
		array(
			'menu-item-object'    => 'page',
			'menu-item-object-id' => (int) $ids['home'],
			'menu-item-type'      => 'post_type',
			'menu-item-status'    => 'publish',
		)
	);

	if ( is_wp_error( $new_id ) ) {
		return;
	}

	// A new item lands at the end. Renumber so it leads and the rest keep
	// the order they were already in.
	$order = 1;
	wp_update_post( array( 'ID' => $new_id, 'menu_order' => $order++ ) );

	foreach ( $items as $item ) {
		wp_update_post( array( 'ID' => $item->ID, 'menu_order' => $order++ ) );
	}
}

/**
 * Build the header menu and assign it, without touching an existing one.
 */
function uottawa_first_run_menu( $ids ) {
	if ( has_nav_menu( 'primary' ) ) {
		uottawa_menu_add_home( $ids );
		return;
	}

	$name = __( 'Primary', 'uottawa-online' );
	$menu = wp_get_nav_menu_object( $name );

	if ( $menu ) {
		$menu_id = $menu->term_id;
	} else {
		$menu_id = wp_create_nav_menu( $name );
		if ( is_wp_error( $menu_id ) ) {
			return;
		}
	}

	if ( ! wp_get_nav_menu_items( $menu_id ) ) {
		foreach ( array( 'home', uottawa_program_slug(), 'student-experience', 'news-events' ) as $slug ) {
			if ( ! isset( $ids[ $slug ] ) ) {
				continue;
			}
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-object'    => 'page',
					'menu-item-object-id' => $ids[ $slug ],
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				)
			);
		}
	}

	$locations            = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

/* -------------------------------------------------------------------------
 * Customizer
 * ---------------------------------------------------------------------- */

/**
 * The footer line, with its middle pieces linked where a URL is set.
 *
 * The line stays one editable string so the wording is still the site's own.
 * Splitting it on the pipe gives the Privacy and Accessibility pieces, and
 * each is linked only if its URL exists — the privacy page WordPress already
 * knows about, or whatever is set under Appearance > Customize. A piece with
 * no URL is left as plain text.
 */
function uottawa_footer_line() {
	$text = get_theme_mod( 'uottawa_footer_text', '© University of Ottawa  |  Privacy  |  Accessibility' );
	$urls = array( 1 => uottawa_privacy_url(), 2 => uottawa_accessibility_url() );

	$parts = explode( '|', $text );
	$out   = array();

	foreach ( $parts as $i => $part ) {
		$label = esc_html( trim( $part ) );

		if ( ! empty( $urls[ $i ] ) ) {
			$label = '<a href="' . esc_url( $urls[ $i ] ) . '">' . $label . '</a>';
		}

		$out[] = $label;
	}

	// Figma puts two spaces either side of each pipe; HTML would collapse them.
	return implode( '&nbsp;&nbsp;|&nbsp;&nbsp;', $out );
}

/**
 * Where "Privacy" points: the Customizer field, else the page WordPress has
 * set as its privacy policy, else a page at /privacy-policy/.
 */
function uottawa_privacy_url() {
	$set = get_theme_mod( 'uottawa_privacy_url', '' );

	if ( '' !== $set ) {
		return 0 === strpos( $set, 'http' ) ? $set : home_url( $set );
	}

	$url = get_privacy_policy_url();

	if ( $url ) {
		return $url;
	}

	$page = get_page_by_path( 'privacy-policy' );

	return $page ? get_permalink( $page ) : '';
}

/**
 * Where "Accessibility" points. Empty by default, so it reads as plain text
 * until there is a page to send people to.
 */
function uottawa_accessibility_url() {
	$set = get_theme_mod( 'uottawa_accessibility_url', '' );

	if ( '' === $set ) {
		return '';
	}

	return 0 === strpos( $set, 'http' ) ? $set : home_url( $set );
}

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
		'uottawa_privacy_url'  => array( __( '"Privacy" link (blank: the site&rsquo;s privacy page)', 'uottawa-online' ), '' ),
		'uottawa_accessibility_url' => array( __( '"Accessibility" link (blank: not a link)', 'uottawa-online' ), '' ),
		'uottawa_logo_url'     => array( __( 'uOttawa logo link', 'uottawa-online' ), uottawa_logo_url() ),
		'uottawa_french_url'   => array( __( '"FR" language switch link', 'uottawa-online' ), uottawa_french_url() ),
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
