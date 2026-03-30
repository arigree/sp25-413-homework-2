<?php
/**
 * The footer for the theme.
 *
 * @package ag-theme
 */
?>
</main>

<footer class="site-footer">
	<div class="site-footer__inner">
		<p>&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
		<p><?php esc_html_e( 'Built for The Metro Report.', 'ag-theme' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

