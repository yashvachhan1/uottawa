<?php
/**
 * A single blog post.
 *
 * The article runs in the main column with the recent posts beside it, the
 * same arrangement the client pointed at on online.unb.ca. Everything is
 * drawn from the theme's own tokens, so it reads as part of this site.
 *
 * @package uottawa-online
 */

get_header();

while ( have_posts() ) :
	the_post();

	$uottawa_terms  = get_the_category();
	$uottawa_kicker = $uottawa_terms ? $uottawa_terms[0]->name : '';
	$uottawa_news   = get_page_by_path( 'news-events' );
	?>

<section class="section post">
  <div class="container post__layout">

    <article class="post__main">

      <nav class="breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'uottawa-online' ); ?>">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'uottawa-online' ); ?></a>
        <?php if ( $uottawa_news ) : ?>
          <span aria-hidden="true">/</span>
          <a href="<?php echo esc_url( get_permalink( $uottawa_news ) ); ?>"><?php esc_html_e( 'News &amp; events', 'uottawa-online' ); ?></a>
        <?php endif; ?>
        <span aria-hidden="true">/</span>
        <span class="breadcrumb__current"><?php the_title(); ?></span>
      </nav>

      <figure class="post__media">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'large' ); ?>
        <?php else : ?>
          <span class="post__placeholder"><?php esc_html_e( '[Image placeholder]', 'uottawa-online' ); ?></span>
        <?php endif; ?>
      </figure>

      <header class="post__header">
        <?php if ( $uottawa_kicker ) : ?>
          <p class="post__kicker"><?php echo esc_html( $uottawa_kicker ); ?></p>
        <?php endif; ?>

        <h1 class="post__title"><?php the_title(); ?></h1>

        <p class="post__meta">
          <?php
          printf(
            /* translators: 1: author name, 2: publish date */
            esc_html__( 'By %1$s | %2$s', 'uottawa-online' ),
            esc_html( get_the_author() ),
            esc_html( get_the_date() )
          );
          ?>
        </p>
      </header>

      <div class="post__body">
        <?php the_content(); ?>
      </div>

    </article>

    <?php
    $uottawa_recent = new WP_Query(
      array(
        'post_type'           => 'post',
        'posts_per_page'      => 5,
        'post__not_in'        => array( get_the_ID() ),
        'ignore_sticky_posts' => true,
        'no_found_rows'       => true,
      )
    );

    if ( $uottawa_recent->have_posts() ) :
      ?>
    <aside class="post__aside">
      <h2 class="recent__title"><?php esc_html_e( 'Recent posts', 'uottawa-online' ); ?></h2>
      <ol class="recent">
        <?php
        $uottawa_n = 0;
        while ( $uottawa_recent->have_posts() ) :
          $uottawa_recent->the_post();
          ++$uottawa_n;
          ?>
        <li class="recent__item">
          <span class="recent__n" aria-hidden="true"><?php echo esc_html( $uottawa_n ); ?></span>
          <a class="recent__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
        <?php endwhile; ?>
      </ol>
    </aside>
      <?php
      wp_reset_postdata();
    endif;
    ?>

  </div>
</section>

	<?php
endwhile;

get_footer();
