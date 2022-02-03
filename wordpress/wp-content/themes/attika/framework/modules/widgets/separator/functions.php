<?php

if ( ! function_exists( 'attika_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function attika_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_separator_widget' );
}