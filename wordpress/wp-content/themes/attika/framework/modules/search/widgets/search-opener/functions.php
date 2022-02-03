<?php

if ( ! function_exists( 'attika_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function attika_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_search_opener_widget' );
}