<?php

if ( ! function_exists( 'attika_core_include_custom_post_types_files' ) ) {
	/**
	 * Loads all custom post types by going through all folders that are placed directly in post types folder
	 */
	function attika_core_include_custom_post_types_files() {
		if ( attika_core_theme_installed() && attika_core_is_theme_registered() ) {
			foreach ( glob( ATTIKA_CORE_CPT_PATH . '/*/load.php' ) as $cpt ) {
				if ( attika_mikado_core_is_customizer_item_enabled( $cpt, 'attika_performance_disable_cpt_' ) ) {
					include_once $cpt;
				}
			}
		}
	}
	
	add_action( 'after_setup_theme', 'attika_core_include_custom_post_types_files', 1 );
}

if ( ! function_exists( 'attika_core_include_custom_post_types_meta_boxes' ) ) {
	/**
	 * Loads all meta boxes functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function attika_core_include_custom_post_types_meta_boxes() {
		if ( attika_core_theme_installed() ) {
			foreach ( glob( ATTIKA_CORE_CPT_PATH . '/*/admin/meta-boxes/*.php' ) as $option ) {
				$cpt_relative_path = str_replace( ATTIKA_CORE_CPT_PATH . '/', '', $option );
				$cpt_name          = substr( $cpt_relative_path, 0, strpos( $cpt_relative_path, '/' ) );
				
				if ( attika_mikado_core_is_customizer_item_enabled( $cpt_name, 'attika_performance_disable_cpt_', true ) ) {
					include_once $option;
				}
			}
		}
	}
	
	add_action( 'attika_mikado_action_before_meta_boxes_map', 'attika_core_include_custom_post_types_meta_boxes' );
}

if ( ! function_exists( 'attika_core_include_custom_post_types_global_options' ) ) {
	/**
	 * Loads all global otpions functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function attika_core_include_custom_post_types_global_options() {
		if ( attika_core_theme_installed() ) {
			foreach ( glob( ATTIKA_CORE_CPT_PATH . '/*/admin/options/*.php' ) as $option ) {
				$cpt_relative_path = str_replace( ATTIKA_CORE_CPT_PATH . '/', '', $option );
				$cpt_name          = substr( $cpt_relative_path, 0, strpos( $cpt_relative_path, '/' ) );
				
				if ( attika_mikado_core_is_customizer_item_enabled( $cpt_name, 'attika_performance_disable_cpt_', true ) ) {
					include_once $option;
				}
			}
		}
	}
	
	add_action( 'attika_mikado_action_before_options_map', 'attika_core_include_custom_post_types_global_options', 1 );
}