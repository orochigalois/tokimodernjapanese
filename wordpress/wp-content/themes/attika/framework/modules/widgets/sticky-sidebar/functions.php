<?php

if ( ! function_exists( 'attika_mikado_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function attika_mikado_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_sticky_sidebar_widget' );
}