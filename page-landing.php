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

echo do_shortcode( '[uottawa_landing]' );

get_footer();
