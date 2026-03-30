<?php
/**
 * The template for displaying all single posts.
 *
 * @package ag-theme
 */

get_header();
?>

<div class="content-shell">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?> itemscope itemtype="https://schema.org/Article">
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

			<header class="entry-header">
				<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
				<div class="entry-meta" aria-label="<?php esc_attr_e( 'Post details', 'ag-theme' ); ?>">
					<span class="posted-on">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
							<?php echo esc_html( get_the_date() ); ?>
						</time>
					</span>
					<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">
						<span itemprop="name"><?php the_author(); ?></span>
					</span>
				</div>
			</header>


			<div class="entry-content" itemprop="articleBody">
				<?php the_content(); ?>
			</div>

			<footer class="entry-footer">
				<?php
				$tags = get_the_tag_list( '', ', ' );
				if ( $tags ) {
					printf( '<p><strong>' . esc_html__( 'Tags:', 'ag-theme' ) . '</strong> %s</p>', wp_kses_post( $tags ) );
				}
				?>
			</footer>
		</article>
	<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
