<?php

get_header();
?>

<main id="main" class="site-main" role="main">
<?php
if ( have_posts() ) :

    while ( have_posts() ) : the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/WebPage">
            <header class="entry-header">
                <h1 class="entry-title" itemprop="headline"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content" itemprop="mainContentOfPage">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before'      => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'ag-themes' ) . '">',
                        'after'       => '</nav>',
                    )
                );
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                edit_post_link(
                    sprintf(
                        esc_html__( 'Edit %s', 'ag-themes' ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer>
        </article>

    <?php
    endwhile;

else :
    ?>
    <section class="no-content">
        <h2><?php esc_html_e( 'Nothing Found', 'ag-themes' ); ?></h2>
        <p><?php esc_html_e( 'RIP.', 'ag-themes' ); ?></p>
    </section>
<?php
endif;
?>
</main><!-- #main -->

<?php
get_footer();