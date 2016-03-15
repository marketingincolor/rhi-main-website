<?php
/**
 * The template for displaying pages, with NO sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
global $post;
$the_parent_id = wp_get_post_parent_id( $post_ID );
$the_parent_post = get_post($the_parent_id);
$the_post_type = get_post_type( $post_ID  );
get_header(); ?>

	<div id="main-content" class="row">
		<div class="small-12 <?php echo ( ($post->post_parent >= 0 ) && ( ($the_parent_post->post_name == 'development-team-presentation') || ($the_parent_post->post_name == 'franchisor') ) ) ? 'medium-6 large-8 siderule' : '' ?> columns">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				// End the loop.
			endwhile;
			?>
		</div>

	<?php if ( ($post->post_parent >= 0 ) && ($the_parent_post->post_name == 'franchisor') ) { ?>
		<div class="small-12 medium-6 large-4 columns">
			<?php get_sidebar('landing'); ?>
		</div>
	<?php } elseif ( ($post->post_parent >= 0 ) && ($the_parent_post->post_name == 'development-team-presentation') ) { ?>
		<div class="small-12 medium-6 large-4 columns">
			<?php get_sidebar('dev'); ?>
		</div>
	<?php } else { ?>
		<div class="small-12 medium-6 large-4 columns">
			<?php //get_sidebar(); ?>
		</div>
	<?php }; ?>

	</div>

<?php get_footer(); ?>