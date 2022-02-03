<?php

if ( ! function_exists( 'attika_restaurant_menu_meta_box_functions' ) ) {
	function attika_restaurant_menu_meta_box_functions( $post_types ) {
		$post_types[] = 'restaurant-menu';
		
		return $post_types;
	}
	
	add_filter( 'attika_mikado_filter_meta_box_post_types_save', 'attika_restaurant_menu_meta_box_functions' );
	add_filter( 'attika_mikado_filter_meta_box_post_types_remove', 'attika_restaurant_menu_meta_box_functions' );
}

if ( ! function_exists( 'attika_restaurant_register_restaurant_menu_cpt' ) ) {
	function attika_restaurant_register_restaurant_menu_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'AttikaRestaurant\CPT\RestaurantMenu\RestaurantMenuRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'attika_restaurant_filter_register_custom_post_types', 'attika_restaurant_register_restaurant_menu_cpt' );
}

// Load restaurant menu shortcodes
if ( ! function_exists( 'attika_restaurant_include_restaurant_menu_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function attika_restaurant_include_restaurant_menu_shortcodes_file() {
		if ( attika_restaurant_theme_installed() ) {
			if ( attika_mikado_core_plugin_installed() ? attika_core_is_theme_registered() : false ) {
				foreach ( glob( ATTIKA_RESTAURANT_CPT_PATH . '/restaurant-menu/shortcodes/*/load.php' ) as $shortcode_load ) {
					include_once $shortcode_load;
				}
			}
		}
	}
	
	add_action( 'attika_restaurant_include_shortcode_files', 'attika_restaurant_include_restaurant_menu_shortcodes_file' );
}



