<?php

if ( ! function_exists( 'attika_mikado_register_header_minimal_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function attika_mikado_register_header_minimal_type( $header_types ) {
		$header_type = array(
			'header-minimal' => 'AttikaMikadoNamespace\Modules\Header\Types\HeaderMinimal'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'attika_mikado_init_register_header_minimal_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function attika_mikado_init_register_header_minimal_type() {
		add_filter( 'attika_mikado_filter_register_header_type_class', 'attika_mikado_register_header_minimal_type' );
	}
	
	add_action( 'attika_mikado_action_before_header_function_init', 'attika_mikado_init_register_header_minimal_type' );
}

if ( ! function_exists( 'attika_mikado_include_header_minimal_full_screen_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function attika_mikado_include_header_minimal_full_screen_menu( $menus ) {
		$menus['popup-navigation'] = esc_html__( 'Full Screen Navigation', 'attika' );
		
		return $menus;
	}
	
	if ( attika_mikado_check_is_header_type_enabled( 'header-minimal' ) ) {
		add_filter( 'attika_mikado_filter_register_headers_menu', 'attika_mikado_include_header_minimal_full_screen_menu' );
	}
}

if ( ! function_exists( 'attika_mikado_get_fullscreen_menu_icon_class' ) ) {
	/**
	 * Loads full screen menu icon class
	 */
	function attika_mikado_get_fullscreen_menu_icon_class() {
		$classes = array(
			'mkdf-fullscreen-menu-opener'
		);
		
		$classes[] = attika_mikado_get_icon_sources_class( 'fullscreen_menu', 'mkdf-fullscreen-menu-opener' );
		
		return $classes;
	}
}