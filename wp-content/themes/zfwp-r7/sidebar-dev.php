<?php
/**
 * The sidebar for the development team pages
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
global $post;
$the_parent_id = wp_get_post_parent_id( $post_ID );
$the_parent_post = get_post($the_parent_id);
$the_post_type = get_post_type( $post_ID  );
$portal_url = get_post_meta( $post->ID, 'portal_url', true );
$site_url = get_post_meta( $post->ID, 'site_url', true );
?>
<div class="sidebar columns">
	<div id="secondary" class="secondary columns">
		<ul class="accordion" data-accordion>
			<?php
			$show_docs = do_shortcode('[downloads tag=pdf,doc,docx,xls,xlsx category='. $post->post_name .'-dm ]');
			$show_audio = do_shortcode('[downloads tag=mp3 category='. $post->post_name .'-dm ]');
			$show_video = do_shortcode('[downloads tag=avi,mov,mp4 category='. $post->post_name .'-dm ]');
			if ($show_audio) {
				echo '<li class="accordion-navigation widget-area">';
				echo '<a href="#panel2a">Audio Resources</a>';
				echo '<div id="panel2a" class="content">';
				echo $show_audio;
				echo '</div>';
				echo '</li>';
			}
			if ($show_video) {
				echo '<li class="accordion-navigation widget-area">';
				echo '<a href="#panel3a">Video Resources</a>';
				echo '<div id="panel3a" class="content">';
				echo $show_video;
				echo '</div>';
				echo '</li>';
			}
			if ($show_docs) {
				echo '<li class="accordion-navigation widget-area">';
				echo '<a href="#panel1a">Documents</a>';
				echo '<div id="panel1a" class="content">';
				echo $show_docs;
				echo '</div>';
				echo '</li>';
			}
			?>
		</ul>
	</div><!-- .secondary -->

	<div id="secondary" class="secondary columns">
		<?php if ( $site_url != '' ) { ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<a href="<?php echo $site_url; ?>"><?php //echo $post->post_title ; ?> Website</a>
			</div><!-- .widget-area -->
		<?php }; ?>
	</div><!-- .secondary -->

	<div id="secondary" class="secondary columns">
		<?php if ( $portal_url != '' ) { ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<a href="<?php echo $portal_url; ?>"><?php //echo $post->post_title ; ?>Educational Portal</a>
			</div><!-- .widget-area -->
		<?php }; ?>
	</div><!-- .secondary -->
</div>