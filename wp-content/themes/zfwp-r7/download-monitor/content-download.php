<?php
/**
 * CUSTOM output for a download via the [download] shortcode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
?>
<a class="download-link" title="<?php if ( $dlm_download->has_version_number() ) { printf( __( 'Version %s', 'download-monitor' ), $dlm_download->get_the_version_number() ); } ?>" href="<?php $dlm_download->the_download_link(); ?>" rel="nofollow">
	<?php $dlm_download->the_title(); ?>
</a>
<p class="download-link"><i><?php echo date_i18n( 'm/j/y' , strtotime( $dlm_download->get_the_file_date() ) ); ?></i></p>
