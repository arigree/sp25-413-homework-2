<?php
/**
 * The header for the theme.
 *
 * @package ag-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ag-theme' ); ?></a>

<header class="site-header">
	<div class="site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<div class="site-branding__logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>

			<div class="site-branding__text">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php $description = get_bloginfo( 'description', 'display' ); ?>
				<?php if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'ag-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	</div>
</header>

<main id="content" class="site-content">