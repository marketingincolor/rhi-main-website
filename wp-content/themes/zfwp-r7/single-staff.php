<?php // staffer single template
get_header(); ?>

<?php
// prints the start wrapper
// must be carried over if using a custom template, else options will not work
$the_parent_id = wp_get_post_parent_id( $post_ID );
$the_parent_post = get_post($the_parent_id);
$the_post_type = get_post_type( $post_ID  );
$stafferoptions = get_option ( 'staffer' );
if (isset ($stafferoptions['customwrapper']) && isset ($stafferoptions['startwrapper'])) {
	$customstartwrapper = $stafferoptions['startwrapper'];
	echo $stafferoptions['startwrapper'];
}
?>

<?php if (have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="small-12 medium-5 staff-image">
			<?php the_post_thumbnail ( 'large', array ('class' => 'alignleft') ); ?>
		</div>
		<div class="small-12 medium-7 staff-page-content">
			<header class="staffer-staff-header">
				<?php
				// checks for slug and builds path
				if ( get_option ('permalink_structure') ) {

					$pageslug = $stafferoptions['slug'];
					if ( $pageslug == '' ) {
						$pageslug = 'staff';
					}
					$homeurl = esc_url( home_url( '/' ) );
					$basepageurl = $homeurl . $pageslug;
				} else {
					$homeurl = esc_url( home_url( '/' ) );
					$basepageurl = $homeurl . '?post_type=staff';
				}
				$pagetitle = $stafferoptions['ptitle'];
				if ($pagetitle == '' ) {
					$pagetitle = 'Staff';
				}
				?>

				<?php
				// checks for manual mode
				// does not display breadcrumb trail in manual mode
				if ( ! isset ( $stafferoptions['manual_mode'] ) ) { ?>
					<div class="staffer-breadcrumbs">
						<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php _e ('Home', 'staffer'); ?></a> &#8250;
							<a href="<?php echo esc_url ($basepageurl) ; ?>" itemprop="url"><?php echo $pagetitle; ?></a> &#8250;
							<span itemprop="title"><?php the_title(); ?></span>
						</div>
					</div>

				<?php } ?>

				<?php
				echo '<h2>';
				echo the_title();
				echo '</h2>';
				if ( get_post_meta ($post->ID,'staffer_staff_title', true) != '' ) {
					echo '<em>';
					echo get_post_meta ($post->ID,'staffer_staff_title', true) . '</em>';
				}
				$terms = get_the_term_list ( $post->ID, 'department', '', ', ' );
				if ( $terms != '' ) {
					echo '<em>';
					_e ( 'Department: ', 'staffer' );
					echo $terms;
					echo '</em>';
				} ?>
			</header>
			<hr style="background-color:#e5663d; border:none; height:2px; margin-bottom:20px;">
			<?php the_content(); ?>

			<div class="staffer-staff-social-links">
				<?php
				// social + contact links
				if ( get_post_meta ($post->ID,'staffer_staff_linkedin', true) != '' ) { ?>
					<a href="<?php echo get_post_meta ($post->ID,'staffer_staff_linkedin', true); ?>" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-btn-staff-li.png"></a>
				<?php }
				?>
			</div>
		</div>

	<?php endwhile;
endif; ?>

<?php
// prints the end wrapper
// must be carried over if using a custom template, else options will not work
if (isset ($stafferoptions['customwrapper']) && isset ($stafferoptions['endwrapper'])) {
	$customstartwrapper = $stafferoptions['endwrapper'];
	echo $stafferoptions['endwrapper'];
}
?>
<?php get_footer(); ?>