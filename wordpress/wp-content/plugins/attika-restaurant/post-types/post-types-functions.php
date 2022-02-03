<?php

if ( ! function_exists( 'attika_restaurant_include_custom_post_types_files' ) ) {
	/**
	 * Loads all custom post types by going through all folders that are placed directly in post types folder
	 */
	function attika_restaurant_include_custom_post_types_files() {
		if ( attika_restaurant_theme_installed() ) {
			if( attika_mikado_core_plugin_installed() ? attika_core_is_theme_registered() : false ) {
				foreach ( glob( ATTIKA_RESTAURANT_CPT_PATH . '/*/load.php' ) as $cpt_load ) {
					include_once $cpt_load;
				}
			}
		}
	}
	
	add_action( 'after_setup_theme', 'attika_restaurant_include_custom_post_types_files', 1 );
}

if ( ! function_exists( 'attika_restaurant_include_custom_post_types_meta_boxes' ) ) {
	/**
	 * Loads all meta boxes functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function attika_restaurant_include_custom_post_types_meta_boxes() {
		if ( attika_restaurant_theme_installed() ) {
			foreach ( glob( ATTIKA_RESTAURANT_CPT_PATH . '/*/admin/meta-boxes/*.php' ) as $meta_boxes_map ) {
				include_once $meta_boxes_map;
			}
		}
	}
	
	add_action( 'attika_mikado_action_before_meta_boxes_map', 'attika_restaurant_include_custom_post_types_meta_boxes' );
}