<?php
$attachment_meta = attika_mikado_get_attachment_meta_from_url( $logo_image );
$hwstring        = ! empty( $attachment_meta ) ? image_hwstring( $attachment_meta['width'], $attachment_meta['height'] ) : '';

do_action( 'attika_mikado_action_before_mobile_logo' ); ?>

<div class="mkdf-mobile-logo-wrapper">
	<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php attika_mikado_inline_style( $logo_styles ); ?>>
		<img itemprop="image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png" <?php echo wp_kses( $hwstring, array( 'width'  => true, 'height' => true ) ); ?> alt="<?php esc_attr_e( 'Mobile Logo', 'attika' ); ?>"/>
	</a>
</div>

<?php do_action( 'attika_mikado_action_after_mobile_logo' ); ?>