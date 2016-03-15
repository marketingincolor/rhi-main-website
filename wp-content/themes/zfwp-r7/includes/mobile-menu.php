<?php
/**
 * Custom Display of Mobile Menu for R7 Site.
 * User: Edd
 * Date: 1/19/2016
 * Time: 8:09 AM
 */

?>
<script type="text/javascript">
	function mobileOpen(){
		var open = document.getElementById("mob-menu-btn");
		var box = document.getElementById("mob-menu-box");
		box.style.width = window.innerWidth-126+"px";
		var width = window.innerWidth-126;
		if(open.style.right == "0px"){
			//open.style.right = "240px";
			open.style.right = box.style.width;
			box.style.right = "0px";
		} else {
			open.style.right = "0px";
			box.style.right = "-"+width+"px";
		}
	}
</script>
<div id="mobile-nav" class="show-for-small-only">
	<div class="show-for-small-only">
		<div id="mob-menu-btn" style="right:0px;"><a class="clicker" onclick="mobileOpen()">MENU</a></div>
		<div id="mob-menu-box" style="right:-240px;">
			<?php
			echo wp_nav_menu( array(
				'container_class' => 'mobile-nav-menu columns',
				'menu_id' => 'mobile-nav',
				'depth' => 1,
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
			) ); ?>
			<div id="mob-menu-login">
				<img id="curve" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-mob-login-float.png">
				<a href="<?php echo site_url('wp-admin'); ?>">
					<img class="hide-for-small" src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-mob-login-ico.png"><br />
					LOGIN</a>
			</div>
		</div>
	</div>
</div>
