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
        <img class="logo__mark" src="<?php echo esc_url( uottawa_asset( 'icons/logo-group1.svg' ) ); ?>" width="32" height="38" alt="" />
        <img class="logo__word" src="<?php echo esc_url( uottawa_asset( 'icons/logo-group.svg' ) ); ?>" width="95" height="19" alt="uOttawa" />
      </a>

      <button class="nav-toggle" type="button" id="nav-toggle" aria-label="<?php esc_attr_e( 'Menu', 'uottawa-online' ); ?>" aria-expanded="false">
        <span></span>
      </button>

      <nav class="nav" aria-label="<?php esc_attr_e( 'Primary', 'uottawa-online' ); ?>">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'depth'          => 1,
            'fallback_cb'    => 'uottawa_primary_menu_fallback',
          )
        );
        ?>
      </nav>

      <div class="header-actions">
        <a class="btn btn--red btn--sm" href="<?php echo esc_url( uottawa_cta_url( 'apply' ) ); ?>"><?php esc_html_e( 'Apply now', 'uottawa-online' ); ?></a>
        <a class="btn btn--outline-dark btn--sm" href="<?php echo esc_url( uottawa_cta_url( 'request' ) ); ?>"><?php esc_html_e( 'Request info', 'uottawa-online' ); ?></a>
      </div>
    </div>
  </header>

  <main>
