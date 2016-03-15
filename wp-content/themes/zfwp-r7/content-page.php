<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
$this_parent = the_parent_slug();
$parent_list = array('franchisor', 'development-team-presentation');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'columns' ); ?>>
	<header class="entry-header">
	<?php if ( !in_array($this_parent, $parent_list) ) : ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<?php endif; ?>

	<?php if ( in_array($this_parent, $parent_list) ) : ?>
		&nbsp;&nbsp;
	<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<?php if ( has_category() ) : ?>
		<div class="entry-meta">
			<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-meta-ico-cal.png">
			&nbsp;<time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
			&nbsp;|&nbsp;
			&nbsp;<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-meta-ico-fold.png">
			&nbsp;<a href="#" rel="category"><?php the_category(', '); ?></a>
		</div>
		<?php endif; ?>

		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'zfwpbase' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'zfwpbase' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<?php if ( is_page('contact-us') ) : ?>
<div class="contact-meta">
	<div class="meta-box-one small-12 medium-3">
		<img class="icon" style="margin:0 5px;" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-ico-phn-cont.png">
		<div>Call<br><?php do_action('cta_phone'); ?></div>
	</div>
	<div class="meta-box-one small-12 show-for-small-down">
		<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-ico-eml-cont.png">
		<div>Email<br><a href="mailto:info@r7fdc.com">info@r7fdc.com</a></div>
	</div>
	<div class="meta-box-two medium-3 show-for-medium-up">
		<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-ico-eml-cont.png">
		<div>Email<br><a href="mailto:info@r7fdc.com">info@r7fdc.com</a></div>
	</div>
	<div class="meta-box-one small-12 medium-3">
		<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-ico-loc-cont.png">
		<div style="width:64%;"><?php do_action('cta_address'); ?></div>
	</div>
</div>
<?php endif; ?>
