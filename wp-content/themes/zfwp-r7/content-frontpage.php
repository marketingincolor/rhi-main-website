<?php
/**
 * The custom template used for displaying front page content
 *
 * @package WordPress
 * @subpackage zfwp-base
 * @since ZFWP Base 1.0
 */
?>

<style>
	body { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-bgnd.png) no-repeat scroll top center / cover;}
	#aslide, #bslide, #cslide, #dslide, #eslide, #fslide {
		display: block; position: relative; z-index: 1; margin: 0; width: 100%; height:100%; overflow:hidden;
	}
	#as1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-001.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#bs1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-002.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#cs1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-003.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#ds1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-004.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#es1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-005.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#fs1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-006.png) no-repeat center center / cover; top: -50px; left: -50px;}
	#gs1 { background: transparent url(<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-007.png) no-repeat center center / cover; top: -50px; left: -50px;}

	.onepage-wrapper section.active div {
		opacity: 1;
		transition: opacity .75s;
	}
	.onepage-wrapper section div {
		opacity: 0;
		transition: opacity .75s;
	}
	.slide-body h3 {
		color:#fff;
		text-transform: capitalize;
		margin:0;
		line-height: 1.2;
		text-shadow: 0px 3px 3px rgba(34, 31, 31, 0.25);
		-moz-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
		-webkit-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
		-ms-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
	}
	.slide-body h4 {
		color:#fff;
		text-transform: uppercase;
		margin:0;
		line-height: 1.2;
		text-shadow: 0px 3px 3px rgba(34, 31, 31, 0.25);
		-moz-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
		-webkit-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
		-ms-transform: matrix( 0.99997951928008,0,0,1.00082546088233,0,0);
	}
	.slide-body hr { margin:0; right:1px; display:inline-block; width:80%; border:none; height:2px; background-color:#e5663d;}
	.slide-body a, .slide-body a:hover, .slide-body a:visited { color:#fff; }
	.slide-body p { display:inline-block; position:relative; z-index:20;}

	@media only screen {
		div#as2, div#bs2, div#cs2, div#ds2, div#es2, div#fs2, div#gs2 { position: absolute; z-index: 3; top: 5%; left: 5%; margin-top:100px; }
		div#as1, div#bs1, div#cs1, div#ds1, div#es1, div#fs1, div#gs1 { height:120%; width:130%; position: absolute; z-index: 2; }
		.slide-body { padding:.5em 1em .5em 0em; text-align:right; }
		.slide-body h3 { font-size:1.125em }
		.slide-body h4 { font-size:1.5em; }
	}

	@media only screen and (min-width: 40.063em) {
		div#as2, div#bs2, div#cs2, div#ds2, div#es2, div#fs2, div#gs2 { position: absolute; z-index: 3; top: 25%; left: 15%; margin-top:180px; }
		div#as1, div#bs1, div#cs1, div#ds1, div#es1, div#fs1, div#gs1 { height:110%; width:110%; position: absolute; z-index: 2; }
		.slide-body { padding:2em 3em 2em 0em; text-align:right; }
		.slide-body h3 { font-size:1.75em }
		.slide-body h4 { font-size:2em; }
	}

	@media only screen and (min-width: 64.063em) {
		div#as2, div#bs2, div#cs2, div#ds2, div#es2, div#fs2, div#gs2 { position: absolute; z-index: 3; top: 25%; left: 20%; margin-top:180px; }
		div#as1, div#bs1, div#cs1, div#ds1, div#es1, div#fs1, div#gs1 { height:110%; width:110%; position: absolute; z-index: 2; }
		.slide-body { padding:2em 3em 2em 0em; text-align:right; }
		.slide-body h3 { font-size:2.25em }
		.slide-body h4 { font-size:3em; }
	}

	@media only screen and (min-width: 90.063em) {
		div#as2, div#bs2, div#cs2, div#ds2, div#es2, div#fs2, div#gs2 { position: absolute; z-index: 3; top: 25%; left: 20%; margin-top:180px; }
		div#as1, div#bs1, div#cs1, div#ds1, div#es1, div#fs1, div#gs1 { height:110%; width:110%; position: absolute; z-index: 2; }
		.slide-body { padding:4em 6em 4em 0em; text-align:right; }
		.slide-body h3 { font-size:2.25em }
		.slide-body h4 { font-size:3em; }
	}

	@media only screen and (min-width: 120.063em) {
		div#as2, div#bs2, div#cs2, div#ds2, div#es2, div#fs2, div#gs2 { position: absolute; z-index: 3; top: 25%; left: 20%; margin-top:180px; }
		div#as1, div#bs1, div#cs1, div#ds1, div#es1, div#fs1, div#gs1 { height:110%; width:110%; position: absolute; z-index: 2; }
		.slide-body { padding:4em 6em 4em 0em; text-align:right; }
		.slide-body h3 { font-size:2.25em }
		.slide-body h4 { font-size:3em; }
	}

</style>

<div class="slide-arrow hide-for-medium-down"><img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-slider-arrow.png" /></div>

<div class="main show-for-small-up">

	<section class="active">
		<div id="aslide" class="parallax-port">
			<div id="as1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="as2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>We grow existing franchisors by selling franchisees</h3>
					<hr />
					<h4>From decades of experience to our network of 1,600 franchise consultants, we mean business.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/grow-existing-franchisors">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="bslide" class="parallax-port">
			<div id="bs1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="bs2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>We help create new franchisors out of existing businesses</h3>
					<hr />
					<h4>We'll walk with you step by step, from startup to explosive growth.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/create-new-franchisors">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="cslide" class="parallax-port">
			<div id="cs1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="cs2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>We help the franchisor understand where they are and where they're going, while increasing royalty production</h3>
					<hr />
					<h4>Once we make a commitment to you and your business, we go all-in.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/increase-royalty-production">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="dslide" class="parallax-port">
			<div id="ds1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="ds2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>We offer an industry-leading Franchisor Assistance Program</h3>
					<hr />
					<h4>We have the knowledge, experience, and honesty to guide you to success.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/franchisor-assistance-program">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="eslide" class="parallax-port">
			<div id="es1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="es2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>We help you sell more franchisees, making them more productive and more profitable</h3>
					<hr />
					<h4>Our hands-on participation will save you time and money from day one.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/sell-more-franchisees">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div id="fslide" class="parallax-port" >
			<div id="fs1" class="parallax-layer" data-xrange="30" data-yrange="10"></div>
			<div id="fs2" class="parallax-layer" data-xrange="10" data-yrange="0">
				<div class="slide-body">
					<h3>How to become a client of Rhino7</h3>
					<hr />
					<h4>We only work with the concepts we truly believe we can make successful.</h4>
					<p style="margin-top:20px;">
						<a class="inline-button" href="<?php echo site_url('/home'); ?>/become-a-client">Learn More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

</div>