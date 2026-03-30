<?php
/**
 * The main template file.
 *
 * @package ag-theme
 */

get_header();
?>

<section class="hero">
	<div class="hero-shell">
		<p class="hero__eyebrow"><?php esc_html_e( 'The Metro Report', 'ag-theme' ); ?></p>
		<h1 class="hero__title"><?php esc_html_e( 'Latest Stories', 'ag-theme' ); ?></h1>
		<p class="hero__description"><?php esc_html_e( 'A clean, editorial layout for feature stories, breaking updates, and daily coverage.', 'ag-theme' ); ?></p>
	</div>
</section>

<div class="content-shell">
	<?php if ( have_posts() ) : ?>
		<div class="posts-grid">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-card__media">
							<a href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
								<?php the_post_thumbnail( 'ag-theme-card', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
							</a>
						</div>
					<?php endif; ?>

					<div class="post-card__content">
						<div class="entry-kicker">
							<?php
							$categories = get_the_category();
							if ( ! empty( $categories ) ) {
								echo esc_html( $categories[0]->name );
							} else {
								esc_html_e( 'News', 'ag-theme' );
							}
							?>
						</div>

						<h2 class="entry-title post-card__title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
						</h2>

						<div class="post-card__meta">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>

						<div class="post-card__excerpt">
							<?php the_excerpt(); ?>
						</div>

						<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read story', 'ag-theme' ); ?></a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<div class="pagination">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => esc_html__( 'Previous', 'ag-theme' ),
					'next_text' => esc_html__( 'Next', 'ag-theme' ),
				)
			);
			?>
		</div>
	<?php else : ?>
		<section class="no-posts">
			<h2><?php esc_html_e( 'Nothing Found', 'ag-theme' ); ?></h2>
			<p><?php esc_html_e( 'No stories are available right now. Please check back soon.', 'ag-theme' ); ?></p>
		</section>
	<?php endif; ?>
</div>

<?php get_footer(); ?>