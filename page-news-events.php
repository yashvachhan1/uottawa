<?php
/* Template Name: News & events */
get_header();
?>

<!-- ============================================================ HERO -->
<section class="page-hero page-hero--inner">
  <div class="page-hero__bg">
    <img src="<?php echo esc_url( uottawa_page_image( 'img_news_hero', uottawa_asset( 'img/007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ) ) ); ?>" alt="<?php echo esc_attr( uottawa_page_image_alt( 'img_news_hero', 'Two colleagues talking and laughing across a desk in a bright open-plan office' ) ); ?>">
  </div>

  <div class="container">
    <div class="page-hero__card">
      <h1 class="page-hero__title">News &amp; events</h1>
      <div class="page-hero__text">
        <p>Explore featured articles and the latest posts from uOttawa Online. Find resources to help you strengthen human-centred and employer-valued skills, future-proof your career, and complete your degree in less time.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================ FEATURED ARTICLES -->
<section class="section featured">
  <div class="container">
    <h2 class="section-title">Featured articles</h2>

    <div class="articles-grid articles-grid--3">
      <?php
      uottawa_article_cards(
        array(
          'count'    => 3,
          'featured' => true,
          'labels' => array(
            'kicker'  => '[Program Name]',
            'title'   => '[Blog post title]',
            'excerpt' => '[Brief description of the blog post]',
            'meta'    => '[By] [Date]',
          ),
        )
      );
      ?>

    </div>
  </div>
</section>

<!-- ============================================================ LATEST ARTICLES -->
<section class="section latest">
  <div class="container">
    <h2 class="section-title">Latest articles</h2>

    <?php
    // Every category that actually has something in it. Nothing to choose
    // between means no point offering the choice.
    $uottawa_cats = get_categories( array( 'hide_empty' => true ) );
    ?>
    <div class="filter-bar" data-filter>
      <span class="filter-bar__label">Filter by:</span>

      <label class="screen-reader-text" for="filter-category"><?php esc_html_e( 'Filter by program', 'uottawa-online' ); ?></label>
      <select class="filter-bar__select" id="filter-category" data-filter-category>
        <option value=""><?php esc_html_e( 'All programs', 'uottawa-online' ); ?></option>
        <?php foreach ( $uottawa_cats as $uottawa_cat ) : ?>
          <option value="<?php echo esc_attr( $uottawa_cat->slug ); ?>"><?php echo esc_html( $uottawa_cat->name ); ?></option>
        <?php endforeach; ?>
      </select>

      <label class="screen-reader-text" for="filter-topic"><?php esc_html_e( 'Search by topic', 'uottawa-online' ); ?></label>
      <input class="filter-bar__search" id="filter-topic" type="search" data-filter-topic
        placeholder="<?php esc_attr_e( 'Topic', 'uottawa-online' ); ?>" autocomplete="off">
    </div>

    <div class="articles-grid articles-grid--3">
      <?php
      uottawa_article_cards(
        array(
          // Every post, because the filter above the row is what narrows it.
          // A filter over a fixed three would have nothing to do.
          'count'  => -1,
          'offset' => 0,
          'labels' => array(
            'kicker'  => '[Program]',
            'title'   => '[Title]',
            'excerpt' => '[Description]',
            'meta'    => 'By uOttawa Online Team | [Date]',
          ),
        )
      );
      ?>

    </div>

    <p class="filter-bar__empty" data-filter-empty hidden><?php esc_html_e( 'No articles match that. Try another program or a different word.', 'uottawa-online' ); ?></p>
  </div>
</section>

<?php get_footer(); ?>
