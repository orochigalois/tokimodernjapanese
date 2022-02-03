<?php

if ( ! function_exists( 'attika_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function attika_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_sidearea_opener_widget' );
}