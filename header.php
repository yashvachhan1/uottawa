<?php
/**
 * Site header — logo, primary navigation and the two header buttons.
 *
 * @package uottawa-online
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <!-- ============================================================ HEADER -->
  <header class="site-header" id="site-header">
    <div class="container">
      <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'uOttawa home', 'uottawa-online' ); ?>">
        <img class="logo__img" src="<?php echo esc_url( uottawa_asset( 'icons/logo.png' ) ); ?>" width="148" height="38" alt="uOttawa" />
      </a>

      <div class="header-lang">
        <a class="btn btn--lang" href="<?php echo esc_url( uottawa_french_url() ); ?>" rel="noopener" lang="fr" title="Site en français">FR</a>
      </div>
    </div>
  </header>

  <main>
