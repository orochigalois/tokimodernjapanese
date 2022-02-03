<?php
if ( attika_restaurant_theme_installed() ) {
	if ( attika_mikado_core_plugin_installed() ? attika_core_is_theme_registered() : false ) {
		if ( ! function_exists( 'attika_restaurant_add_menu_popup_shortcodes' ) ) {
			function attika_restaurant_add_menu_popup_shortcodes( $shortcodes_class_name ) {
				$shortcodes = array(
					'AttikaRestaurant\Shortcodes\MenuPopup\MenuPopup'
				);
				
				$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
				
				return $shortcodes_class_name;
			}
			
			add_filter( 'attika_restaurant_add_vc_shortcode', 'attika_restaurant_add_menu_popup_shortcodes' );
		}
		
		if ( ! function_exists( 'attika_restaurant_set_menu_popup_icon_class_name_for_vc_shortcodes' ) ) {
			/**
			 * Function that set custom icon class name for menu popup shortcode to set our icon for Visual Composer shortcodes panel
			 */
			function attika_restaurant_set_menu_popup_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
				$shortcodes_icon_class_array[] = '.icon-wpb-menu-popup';
				
				return $shortcodes_icon_class_array;
			}
			
			add_filter( 'attika_restaurant_filter_add_vc_shortcodes_custom_icon_class', 'attika_restaurant_set_menu_popup_icon_class_name_for_vc_shortcodes' );
		}
	}
}