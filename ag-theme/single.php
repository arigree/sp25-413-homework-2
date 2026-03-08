<?php

get_header();
?>

<main id="main" class="site-main" role="main">
<?php
if ( have_posts() ) :

    while ( have_posts() ) : the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">

            <header class="entry-header">
                <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>

                <div class="entry-meta" aria-label="<?php esc_attr_e( 'Post meta', 'ag-themes' ); ?>">
                    <span class="posted-on">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                    </span>

                    <span class="byline">
                        <?php
                        printf(
                            esc_html__( ' by %1$s', 'ag-themes' ),
                            wp_kses_post( get_the_author_posts_link() )
                        );
                        ?>
                    </span>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <figure class="post-featured-image">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php the_post_thumbnail( 'large', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                    </a>
                </figure>
            <?php endif; ?>

            <div class="entry-content" itemprop="articleBody">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before'      => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'ag-themes' ) . '">',
                        'after'       => '</nav>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    )
                );
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                $categories_list = get_the_category_list( ', ' );
                if ( $categories_list ) {
                    printf(
                        '<div class="cat-links">' . esc_html__( 'Posted in %1$s', 'ag-themes' ) . '</div>',
                        wp_kses_post( $categories_list )
                    );
                }

                $tags_list = get_the_tag_list( '', ', ' );
                if ( $tags_list ) {
                    printf( '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'ag-themes' ) . '</div>', wp_kses_post( $tags_list ) );
                }
                ?>
            </footer>

        </article>

        <?php

    endwhile;

else :
    ?>
    <section class="no-posts">
        <h2><?php esc_html_e( 'Nothing Found', 'ag-themes' ); ?></h2>
        <p><?php esc_html_e( 'Whompwhomp.', 'ag-themes' ); ?></p>
    </section>
<?php
endif;
?>
</main><!-- #main -->

<?php
get_footer();