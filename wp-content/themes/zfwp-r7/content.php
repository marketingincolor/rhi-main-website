<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="post-thumbnail">
		<a href="<?php the_permalink() ; ?>"><?php the_post_thumbnail('full'); ?></a>
	</div><!-- .post-thumbnail -->

	<?php if ( has_category() ) : ?>
		<div class="entry-meta">
			<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-meta-ico-cal.png">
			&nbsp;<time datetime="<?php echo the_time('Y-m-j'); ?>"><?php echo the_time(get_option('date_format')); ?></time>
			&nbsp;|&nbsp;
			&nbsp;<img class="icon" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-meta-ico-fold.png">
			&nbsp;<a href="#" rel="category"><?php the_category(', '); ?></a>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		//the_content( sprintf(
		//	__( 'Continue reading %s', 'zfwpbase' ),
		//	the_title( '<span class="screen-reader-text">', '</span>', false )
		//) );

		the_excerpt();
		?>





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

	<footer class="entry-footer">
		<hr style="border:1px solid #7995b9; width:100%;">
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
