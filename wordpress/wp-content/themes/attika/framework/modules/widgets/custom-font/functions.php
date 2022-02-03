<?php

if ( ! function_exists( 'attika_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function attika_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_custom_font_widget' );
}