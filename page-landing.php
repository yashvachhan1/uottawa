<?php
/**
 * Template Name: Program landing page
 *
 * Renders the landing page built from the meta boxes on the page edit screen.
 * The same markup is available anywhere through the [uottawa_landing]
 * shortcode; this template just saves dropping it into the editor.
 *
 * @package uottawa-online
 */

get_header();

// The catalogue links and anything typed into the page's own fields are
// built here rather than by a template, so the rule that sends off-site
// links to their own tab is applied to the finished markup.
echo uottawa_external_links( do_shortcode( '[uottawa_landing]' ) ); // phpcs:ignore WordPress.Security.EscapeOutput

get_footer();
