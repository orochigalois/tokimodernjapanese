<?php

if ( ! function_exists( 'attika_mikado_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function attika_mikado_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_recent_posts_widget' );
}