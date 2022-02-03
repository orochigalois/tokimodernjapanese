<?php

if ( ! function_exists( 'attika_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function attika_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_button_widget' );
}