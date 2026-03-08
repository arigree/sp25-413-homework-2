<?php

get_header();
?>

<main id="main" class="site-main" role="main">

<?php if ( have_posts() ) : ?>

    <?php
    // Start the Loop.
    while ( have_posts() ) :
        the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php
            // Featured image
            if ( has_post_thumbnail() ) : ?>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="post-thumbnail-link">
                    <?php
                    
                    the_post_thumbnail(
                        'large',
                        array(
                            'alt' => the_title_attribute( array( 'echo' => false ) ),
                        )
                    );
                    ?>
                </a>
            <?php endif; ?>

            <header class="entry-header">
                <h2 class="entry-title">
                    <a href="<?php echo esc_url( get_permalink() ); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="entry-meta">
                    <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                </div>
            </header>

            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div>

        </article>
    <?php
    // End the loop.
    endwhile;
    ?>

    <?php
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => __( '← Previous', 'ag-theme' ),
        'next_text' => __( 'Next →', 'ag-theme' ),
    ) );
    ?>

<?php else : ?>

    <section class="no-posts">
        <h2><?php esc_html_e( 'Nothing Found', 'ag-theme' ); ?></h2>
        <p><?php esc_html_e( 'No posts. Go away.', 'ag-theme' ); ?></p>
    </section>

<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();