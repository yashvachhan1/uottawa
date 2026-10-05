<?php
/* Template Name: News & events */
get_header();
?>

<!-- ============================================================ HERO -->
<section class="hero hero--page">
  <div class="hero__bg">
    <img src="<?php echo esc_url( uottawa_asset( 'img/007bc2f82e5e246d911896471b7b9f9f39c57034.jpg' ) ); ?>" alt="">
  </div>

  <div class="container">
    <div class="hero__card">
      <h1 class="hero__title">News &amp; events</h1>
      <div class="hero__text">
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
      ?>

    </div>
  </div>
</section>

<!-- ============================================================ LATEST ARTICLES -->
<section class="section latest">
  <div class="container">
    <h2 class="section-title">Latest articles</h2>

    <p class="filter-bar">
      <span class="filter-bar__label">Filter by:</span>
      <a class="is-active" href="#">All programs</a>
      <a href="#">Topic</a>
    </p>

    <div class="articles-grid articles-grid--3">
      <?php
      uottawa_article_cards(
        array(
          'count'  => 3,
          'offset' => 3,
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
  </div>
</section>

<?php get_footer(); ?>
