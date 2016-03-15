<?php
/**
 * The header template
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php bloginfo('name'); ?> </title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" rel="shortcut icon">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.min.css" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr.js"></script>
	<?php if ( is_front_page() ) : ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/vendor/onepage-scroll.css" type="text/css" />
	<?php endif; ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if ( !is_front_page() ) : ?>
	<header class="header full-width">
<?php endif; ?>

		<div class="site-header" role="banner">
			<div id="site-details" class="row">
				<div id="logo" class="small-6 medium-3 vertical-center columns"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-hdr-lrg-logo.png" /></a></div>

				<?php include get_template_directory() . '/includes/mobile-menu.php'; ?>

				<div id="custom-nav" class="medium-9 show-for-medium-up columns">
					<?php
					//$search_link = '<li class="menu-item menu-item-type-custom-search"><a>Search</a></li>';
					$search_link = '<li class="menu-item menu-item-type-custom-search hide-for-medium-down">
					<form method="get" id="searchform" action="'. home_url().'">
                            <div class="header-search-form">
                                <div class="search-zoom search-btn"><input value="Search" type="submit"></div>
                                <input id="s" name="s" type="text" onblur="if(this.value==\'\')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value=\'\';" value="Search" class="search-box" />
                            </div>
                    </form>
                    </li>';

					$custom_option = get_option('custom_option_name');
					$social_link = '<li class="menu-item-special hide-for-medium-down"> &nbsp; ';
					if ($custom_option['fb_link']) :
						$social_link .= '&nbsp;<a href="'.$custom_option['fb_link'].'" target="_blank"><i class="fa fa-facebook-square"></i></a>&nbsp;';
					endif;
					if ($custom_option['li_link']) :
						$social_link .= '&nbsp;<a href="'.$custom_option['li_link'].'" target="_blank"><i class="fa fa-linkedin-square"></i></a>&nbsp;';
					endif;
					if ($custom_option['tw_link']) :
						$social_link .= '&nbsp;<a href="'.$custom_option['tw_link'].'" target="_blank"><i class="fa fa-twitter"></i></a>&nbsp;';
					endif;
					$social_link .= '</li>';

					wp_nav_menu( array(
						'container_class' => 'menu-main-menu-container vertical-center',
						'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'.$search_link.$social_link.'</ul>',
						'walker' => new foundation_walker_nav_menu
					) );
					?>
				</div>
			</div>
		</div>

<?php if ( !is_front_page() ) : ?>
		<div id="shell" class="parallax-port show-for-medium-up">
			<div id="blueback" class="parallax-layer" data-xrange="5" data-yrange="5"> </div>
			<div id="smokeback" class="parallax-layer" data-xrange="10" data-yrange="5"> </div>
			<div id="rhino" class="parallax-layer" data-xrange="15" data-yrange="5"> </div>
			<div id="smokefront" class="parallax-layer" data-xrange="30" data-yrange="5"> </div>
		</div>

	</header>
<?php endif; ?>

	<?php include get_template_directory() . '/includes/login-flyout.php'; ?>

<?php if ( !is_front_page() ) : ?>
    <div class="row">
        <div class="small-12 medium-11 medium-centered columns">
<?php endif; ?>