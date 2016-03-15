<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>
<div class="sidebar columns">
	<div id="secondary" class="secondary columns show-for-medium-up">
		<div id="widget-area" class="widget-area" role="complementary">
			<a href="<?php echo site_url('/contact-us'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-side-cta.png" /></a>
		</div>
	</div>
	<div id="secondary" class="secondary columns">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-3' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>
	</div><!-- .secondary -->
	<div id="secondary" class="secondary columns show-for-medium-up">
		<div id="widget-area" class="widget-area" role="complementary">
			<a href="<?php echo site_url('/feed'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-btn-subsc.png" /></a>
		</div>
	</div>
</div>