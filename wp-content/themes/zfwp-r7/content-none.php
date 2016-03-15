<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<?php if ( is_search() ) : ?>
			<h1 class="page-title"><?php _e( 'Nothing Found', 'zfwpbase' ); ?></h1>
		<?php else : ?>
			<div class="small-8 small-offset-2">
				<img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-404.png" />
				<h1 class="purple">404 Error</h1>
				<hr class="purple" style="border-color:unset; border-width:2px 0 0;">
			</div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<div class="page-content small-8 small-offset-2">

		<?php if ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'zfwpbase' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p style="line-height:1.75em;">
				Oops! Seems this page doesn't exist.<br>
				Try heading back to our <a href="<?php echo site_url(); ?>">homepage,</a><br>
				<a href="<?php echo site_url('/contact-us'); ?>">contact us</a> to find out more, or<br>
				connect with us on social media:
			</p>
			<p class="err-social"><?php do_action('social_icons'); ?></p>
			<?php //get_search_form(); ?>

		<?php endif; ?>
	<br />
	</div><!-- .page-content -->
</section><!-- .no-results -->