<?php

if ( ! function_exists( 'attika_mikado_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function attika_mikado_register_author_info_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_author_info_widget' );
}