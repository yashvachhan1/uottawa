<?php
/**
 * Fallback template — blog index, archives, search and single posts.
 *
 * The four designed pages have their own templates; this keeps everything
 * else on-brand instead of falling back to bare markup.
 *
 * @package uottawa-online
 */

get_header();
?>

<section class="section">
  <div class="container">
    <h1 class="section-title">
      <?php
      if ( is_home() ) {
        esc_html_e( 'Latest articles', 'uottawa-online' );
      } elseif ( is_search() ) {
        /* translators: %s: search term */
        printf( esc_html__( 'Search results for %s', 'uottawa-online' ), '&ldquo;' . esc_html( get_search_query() ) . '&rdquo;' );
      } else {
        the_archive_title();
      }
      ?>
    </h1>

    <?php if ( have_posts() ) : ?>
      <div class="articles-grid articles-grid--3">
        <?php
        while ( have_posts() ) :
          the_post();

          $uottawa_terms = get_the_category();
          uottawa_article_card(
            array(
              'url'     => get_permalink(),
              'media'   => has_post_thumbnail() ? get_the_post_thumbnail( null, 'large' ) : '',
              'kicker'  => $uottawa_terms ? $uottawa_terms[0]->name : get_bloginfo( 'name' ),
              'title'   => get_the_title(),
              'excerpt' => wp_trim_words( get_the_excerpt(), 22 ),
              /* translators: 1: author name, 2: publish date */
              'meta'    => sprintf( esc_html__( 'By %1$s | %2$s', 'uottawa-online' ), get_the_author(), get_the_date() ),
            )
          );
        endwhile;
        ?>
      </div>

      <div class="lede">
        <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
      </div>

    <?php else : ?>
      <p class="lede"><?php esc_html_e( 'Nothing here yet. Please check back soon.', 'uottawa-online' ); ?></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
