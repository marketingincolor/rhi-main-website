<?php
/**
 * The footer template
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
global $post;
$the_parent_id = wp_get_post_parent_id( $post_ID );
$the_parent_post = get_post($the_parent_id);
$the_post_type = get_post_type( $post_ID  );
?>

<?php if ( !is_front_page() ) : ?>
	</div>
</div>
<?php endif; ?>

<?php if (
	($post->post_parent >= 0 ) &&
	( $the_parent_post->post_name != 'blog' ) &&
	( $the_post_type != 'post' ) &&
	( $the_parent_post->post_name != 'development-team' ) &&
	( !is_page('development-team') ) &&
	( !is_front_page() )
) : ?>
<div class="pre-foot grey-bg contain-to-grid">
	<div class="row">
		<div class="small-12 columns">
			<?php if ( is_page('our-brands') ) { ?>
				<h3 class="pre-title">Brand News</h3>
				<h5 class="pre-link"><a href="<?php echo site_url('/brands'); ?>">See More Posts</a></h5>
				<?php echo do_shortcode('[display-posts posts_per_page="3" category="brands" image_size="wide-thumb" include_excerpt="true"]'); ?>
			<?php } elseif ( is_page('our-team') ) { ?>
				<h3 class="pre-title">Team News</h3>
				<h5 class="pre-link"><a href="<?php echo site_url('/team'); ?>">See More Posts</a></h5>
				<?php echo do_shortcode('[display-posts posts_per_page="3" category="team" image_size="wide-thumb" include_excerpt="true"]'); ?>
			<?php } else { ?>
				<h3 class="pre-title">Our Latest Posts</h3>
				<h5 class="pre-link"><a href="<?php echo site_url('/blog'); ?>">See More Posts</a></h5>
				<?php echo do_shortcode('[display-posts posts_per_page="3" image_size="wide-thumb" include_excerpt="true"]'); ?>
			<?php }; ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if ( !is_front_page() ) : ?>
<footer id="colophon" class="footer dark-grey-bg contain-to-grid" role="contentinfo">
	<div class="row">
		<div class="site-footer small-12 columns"><br />
			<div class="site-footer-info">
				<div class="vertical-center">
					<?php do_action('cta_info'); ?>
					<span class="pipe">|</span>
					<?php do_action('cta_address'); ?>
					<span class="pipe">|</span>
					<?php do_action('cta_phone'); ?>
					<span class="pipe">|</span>
					<?php do_action('social_icons'); ?></div>
			</div><!-- .site-info -->
			<div class="site-footer-info">
				<div class="sub vertical-center">
					<!--<a href="<?php echo site_url('/terms-conditions'); ?>">Terms & Conditions</a>
					<span class="pipe">|</span>
					<a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a>
					<span class="pipe">|</span>-->
					&copy;<?php echo date("Y") ?>  Rhino7 Franchise Development Corporation. All Rights Reserved
				</div>
			</div><!-- .site-info -->
			<div class="site-footer-info">
				<div class="vertical-center"><a href="<?php echo site_url(); ?>"><img id="footer-logo" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-ftr-sm-logo.png" /></a></div>
			</div><!-- .site-info -->
		</div>
	</div>
</footer><!-- .site-footer -->
<?php endif; ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.dropdown.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.accordion.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/plax.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.onepage-scroll.js"></script>

<?php wp_footer(); ?>


<script>
	$(document).foundation();
</script>

<?php if ( is_front_page() ) : ?>
<script type="text/javascript">
	$(document).ready(function () {
		$('#aslide div').plaxify();
		$('#bslide div').plaxify();
		$('#cslide div').plaxify();
		$('#dslide div').plaxify();
		$('#eslide div').plaxify();
		$('#fslide div').plaxify();
		$.plax.enable();

		$(".main").onepage_scroll({
			sectionContainer: "section",
			easing: "linear",
			animationTime: 750,
			pagination: true,
			updateURL: false,
			beforeMove: function(index) {},
			afterMove: function(index) {},
			loop: true,
			keyboard: true,
			responsiveFallback: false,
			direction: "horizontal"
		});

	})
</script>
<?php endif; ?>

<?php if ( !is_front_page() ) : ?>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			$('#shell div').plaxify();
			$.plax.enable();
		})
	</script>
<?php endif; ?>
<script type="text/javascript">
	jQuery(document).ready(function () {
		$('.menu-item-has-children').hover(
			function () {
				$('#menu-main-menu .sub-menu').css( 'display', 'inline-block');
			},
			function () {
				$('#menu-main-menu .sub-menu').css( 'display', 'none');
			}
		);
	})
</script>

</body>
</html>