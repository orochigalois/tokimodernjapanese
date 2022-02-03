<?php

if ( ! function_exists( 'attika_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function attika_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_blog_list_widget' );
}