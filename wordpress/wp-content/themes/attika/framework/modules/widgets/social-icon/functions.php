<?php

if ( ! function_exists( 'attika_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function attika_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_social_icon_widget' );
}