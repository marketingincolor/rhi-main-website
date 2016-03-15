<?php
/**
 * Custom display of Login Flyout for entire R7 Site.
 * User: Edd
 * Date: 10/26/2015
 * Time: 3:03 PM
 */
?>

<!-- START LOGIN SLIDER -->

<script type="text/javascript">
	function loginOpen(){
		var open = document.getElementById("login-button");
		var box = document.getElementById("login-box");
		box.style.height = window.innerHeight+"px";
		if(open.style.left == "0px"){
			open.style.left = "240px";
			box.style.left = "0px";
		} else {
			open.style.left = "0px";
			box.style.left = "-240px";
		}
	}
</script>

<div id="login-button" class="show-for-medium-up" onclick="loginOpen()" style="left:0px;">
	<img src="<?php echo get_template_directory_uri(); ?>/img/r7-grfx-login-float.png">
</div>
<div id="login-box" class="show-for-medium-up" style="left:-240px;">
	<?php if ( !is_user_logged_in() ) {
		?>
		<div id="login-box-form">
			<?php //wp_login_form(); ?>
			<form method="post" action="<?php echo site_url('/wp-login.php'); ?>" id="loginform" name="loginform">
				<p class="login-username">
					<label for="user_login"><input type="text" size="20" value="" class="input" id="user_login" name="log"></label>
				</p>
				<p class="login-password">
					<label for="user_pass"><input type="password" size="20" value="" class="input" id="user_pass" name="pwd"></label>
				</p>
				<p class="login-remember"><input type="checkbox" value="forever" id="rememberme" name="rememberme"> <label>Remember Me</label></p>
				<p class="login-forgot"><label><a title="Password Lost and Found" href="<?php echo site_url('/wp-login.php?action=lostpassword'); ?>">Lost your password?</a></label></p>
				<p class="login-submit">
					<input type="submit" value="LOGIN" class="button-primary" id="wp-submit" name="wp-submit">
					<input type="hidden" value="<?php echo site_url('/our-team/'); ?>" name="redirect_to">
				</p>
			</form>
		</div>
	<?php } else { ?>
		<div id="login-box-form">
			<p class="logout">
				<?php wp_loginout(site_url(), true); ?>
			</p>
			<p>
				Welcome, <?php $current_user = wp_get_current_user(); echo $current_user->display_name; ?> <br />You have access to the following:
			</p>
			<p class="login-list">
			<?php if ( current_user_can( 'administrator' ) || current_user_can( 'franchisor' )  ) {
				echo '<a href="'.site_url('/franchisor/').'">Franchisor Landing Page</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'fran_pma' ) ) {
				echo '&nbsp;&middot;&nbsp;<a href="'.site_url('/franchisor/pro-martial-arts/').'">Pro Martial Arts</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'fran_aap' ) ) {
				echo '&nbsp;&middot;&nbsp;<a href="'.site_url('/franchisor/all-about-people/').'">All About People</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'fran_sgr' ) ) {
				echo '&nbsp;&middot;&nbsp;<a href="'.site_url('/franchisor/storm-guard-restoration/').'">Storm Guard Restoration</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'fran_sam' ) ) {
				echo '&nbsp;&middot;&nbsp;<a href="'.site_url('/franchisor/scout-mollys/').'">Scout & Mollys</a><br />';
			} ?>
			</p>
			<p class="login-list">
			<?php if ( current_user_can( 'administrator' ) || current_user_can( 'manager' ) ) {
				echo '<a href="'.site_url('/development-team-presentation/').'">DEV TEAM Presentations</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'dev_pma' ) ) {
				//echo '<a href="'.site_url('/development-team-presentation/pro-martial-arts/').'">Pro Martial Arts</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'dev_aap' ) ) {
				//echo '<a href="'.site_url('/development-team-presentation/all-about-people/').'">All About People</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'dev_sgd' ) ) {
				//echo '<a href="'.site_url('/development-team-presentation/storm-guard-restoration/').'">Storm Guard Restoration</a><br />';
			} if ( current_user_can( 'administrator' ) || current_user_can( 'dev_sam' ) ) {
				//echo '<a href="'.site_url('/development-team-presentation/scout-mollys/').'">Scout & Mollys</a><br />';
			} ?>
			</p>
		</div>
	<?php } ?>

</div>

<!-- END LOGIN SLIDER -->