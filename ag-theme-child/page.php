<?php
/**
 * The template for displaying pages.
 *
 * @package ag-theme
 */

get_header();
?>

<div class="content-shell">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?> itemscope itemtype="https://schema.org/WebPage">
			<header class="entry-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="single-article__featured">
					<?php the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
				</div>
			<?php endif; ?>

			<div class="page-content" itemprop="mainContentOfPage">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page links', 'ag-theme' ) . '">',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</article>
	<?php endwhile; else : ?>
		<section class="no-posts">
			<h2><?php esc_html_e( 'Nothing Found', 'ag-theme' ); ?></h2>
			<p><?php esc_html_e( 'This page could not be found.', 'ag-theme' ); ?></p>
		</section>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
