<?php
/**
 * Call-to-action band and site footer — identical on every page.
 *
 * @package uottawa-online
 */
?>
  </main>

  <!-- ============================================================ CTA -->
  <section class="cta">
    <div class="container">
      <div class="cta__text">
        <h2 class="cta__title"><?php esc_html_e( 'Your degree is closer than you think', 'uottawa-online' ); ?></h2>
        <p class="cta__text-body"><?php esc_html_e( 'Build on your college diploma. Strengthen the human skills employers value. Earn a career-relevant degree 100% online.', 'uottawa-online' ); ?></p>
      </div>

      <div class="cta__actions">
        <div class="cta__action">
          <a class="btn btn--red btn--lg" href="<?php echo esc_url( uottawa_cta_url( 'request' ) ); ?>"><?php esc_html_e( 'Request more info', 'uottawa-online' ); ?></a>
          <p><?php esc_html_e( 'Get program details, tuition information, and application instructions.', 'uottawa-online' ); ?></p>
        </div>
        <div class="cta__action">
          <a class="btn btn--red btn--lg" href="<?php echo esc_url( uottawa_cta_url( 'apply' ) ); ?>"><?php esc_html_e( 'Start your application', 'uottawa-online' ); ?></a>
          <p><?php esc_html_e( 'Begin your journey toward building in-demand, future-proof skills.', 'uottawa-online' ); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================ FOOTER -->
  <footer class="site-footer">
    <?php
    // Figma puts two spaces either side of each pipe; HTML would collapse them.
    $uottawa_footer_text = get_theme_mod( 'uottawa_footer_text', '© University of Ottawa  |  Privacy  |  Accessibility' );
    ?>
    <p><?php echo wp_kses_post( str_replace( '  ', '&nbsp;&nbsp;', esc_html( $uottawa_footer_text ) ) ); ?></p>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
