<?php

if ( ! function_exists( 'attika_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function attika_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_image_gallery_widget' );
}