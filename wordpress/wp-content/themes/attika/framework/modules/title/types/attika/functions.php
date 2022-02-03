<?php

if ( ! function_exists( 'attika_mikado_set_title_attika_type_for_options' ) ) {
	/**
	 * This function set attika title type value for title options map and meta boxes
	 */
	function attika_mikado_set_title_attika_type_for_options( $type ) {
		$type['attika'] = esc_html__( 'Attika', 'attika' );
		
		return $type;
	}
	
	add_filter( 'attika_mikado_filter_title_type_global_option', 'attika_mikado_set_title_attika_type_for_options' );
	add_filter( 'attika_mikado_filter_title_type_meta_boxes', 'attika_mikado_set_title_attika_type_for_options' );
}