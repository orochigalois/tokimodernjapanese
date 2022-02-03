<?php

if ( ! function_exists( 'attika_mikado_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function attika_mikado_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = attika_mikado_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo attika_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'attika_mikado_action_style_dynamic', 'attika_mikado_footer_top_general_styles' );
}

if ( ! function_exists( 'attika_mikado_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function attika_mikado_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = attika_mikado_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo attika_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'attika_mikado_action_style_dynamic', 'attika_mikado_footer_bottom_general_styles' );
}