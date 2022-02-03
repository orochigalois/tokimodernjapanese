<?php

if ( ! function_exists( 'attika_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function attika_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'AttikaMikadoClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'attika_core_filter_register_widgets', 'attika_mikado_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'attika_mikado_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function attika_mikado_get_dropdown_cart_icon_class() {
		$classes = array(
			'mkdf-header-cart'
		);
		
		$classes[] = attika_mikado_get_icon_sources_class( 'dropdown_cart', 'mkdf-header-cart' );
		
		return $classes;
	}
}