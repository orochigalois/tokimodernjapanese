<?php
$share_type = isset( $share_type ) ? $share_type : 'list';
?>
<?php if ( attika_mikado_core_plugin_installed() && attika_mikado_options()->getOptionValue( 'enable_social_share' ) === 'yes' && attika_mikado_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="mkdf-blog-share">
		<?php echo attika_mikado_get_social_share_html( array( 'type' => $share_type ) ); ?>
	</div>
<?php } ?>