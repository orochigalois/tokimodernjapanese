<?php

if ( ! function_exists( 'attika_restaurant_style' ) && attika_restaurant_theme_installed() ) {
	function attika_restaurant_style() {
		$first_color = attika_mikado_options()->getOptionValue( 'first_color' );
		
		if ( ! empty( $first_color ) ) {
			echo attika_mikado_dynamic_css( '.mkdf-working-hours-holder .mkdf-wh-title .mkdf-wh-title-accent-word, #ui-datepicker-div .ui-datepicker-current-day:not(.ui-datepicker-today) a', array( 'color' => $first_color ) );
			
			echo attika_mikado_dynamic_css( '#ui-datepicker-div .ui-datepicker-today', array( 'background-color' => $first_color ) );
		}
	}
	
	add_action( 'attika_mikado_action_style_dynamic', 'attika_restaurant_style' );
}