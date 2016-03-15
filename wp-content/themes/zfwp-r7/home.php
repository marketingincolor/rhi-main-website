<?php
/**
 * The template for displaying all posts
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
get_header(); ?>

    <div id="main-content" class="row">
        <div class="small-12 medium-8 siderule columns">
            <div class="small-12 columns">
            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    <hr />
                <?php endif ; ?>

                <?php

                //query_posts( 'posts_per_page=3' );

                // Start the loop.
                while ( have_posts() ) : the_post();
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

                    // End the loop.
                endwhile;

				// Reset Query
				wp_reset_query();

                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous Page ', 'zfwpbase' ),
                    'next_text'          => __( ' Next Page', 'zfwpbase' ),
                    'screen_reader_text' => ' ',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'zfwpbase' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                get_template_part( 'content', 'none' );

            endif;
            ?>
            </div>
        </div>

        <div class="small-12 medium-4 columns">
            <?php get_sidebar(); ?>
        </div>

    </div>

    </div>

<?php get_footer(); ?>