<?php

if ( ! function_exists( 'attika_mikado_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function attika_mikado_search_body_class( $classes ) {
		$classes[] = 'mkdf-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'attika_mikado_search_body_class' );
}

if ( ! function_exists( 'attika_mikado_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function attika_mikado_get_search() {
		attika_mikado_load_search_template();
	}
	
	add_action( 'attika_mikado_action_before_page_header_html_close', 'attika_mikado_get_search' );
	add_action( 'attika_mikado_action_before_mobile_header_html_close', 'attika_mikado_get_search' );
}

if ( ! function_exists( 'attika_mikado_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function attika_mikado_load_search_template() {
		$parameters = array(
			'search_submit_icon_class' => attika_mikado_get_search_submit_icon_class()
		);

        attika_mikado_get_module_template_part( 'types/slide-from-header-bottom/templates/slide-from-header-bottom', 'search', '', $parameters );
	}
}