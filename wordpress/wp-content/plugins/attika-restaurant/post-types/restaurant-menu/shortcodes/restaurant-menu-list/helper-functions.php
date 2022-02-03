<?php
if ( attika_restaurant_theme_installed() ) {
	if ( attika_mikado_core_plugin_installed() ? attika_core_is_theme_registered() : false ) {
		if ( ! function_exists( 'attika_restaurant_menu_list_shortcode_helper' ) ) {
			function attika_restaurant_menu_list_shortcode_helper( $shortcodes_class_name ) {
				$shortcodes = array(
					'AttikaRestaurant\CPT\RestaurantMenu\Shortcodes\RestaurantMenuList\RestaurantMenuList'
				);
				
				$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
				
				return $shortcodes_class_name;
			}
			
			add_filter( 'attika_restaurant_add_vc_shortcode', 'attika_restaurant_menu_list_shortcode_helper' );
		}
		
		if ( ! function_exists( 'attika_restaurant_set_menu_list_icon_class_name_for_vc_shortcodes' ) ) {
			/**
			 * Function that set custom icon class name for property list shortcode to set our icon for Visual Composer shortcodes panel
			 */
			function attika_restaurant_set_menu_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
				$shortcodes_icon_class_array[] = '.icon-wpb-restaurant-menu-list';
				
				return $shortcodes_icon_class_array;
			}
			
			add_filter( 'attika_restaurant_filter_add_vc_shortcodes_custom_icon_class', 'attika_restaurant_set_menu_list_icon_class_name_for_vc_shortcodes' );
		}
	}
}