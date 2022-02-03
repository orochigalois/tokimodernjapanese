<?php

if ( ! function_exists( 'attika_core_add_text_marquee_shortcodes' ) ) {
	function attika_core_add_text_marquee_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'AttikaCore\CPT\Shortcodes\TextMarquee\TextMarquee'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'attika_core_filter_add_vc_shortcode', 'attika_core_add_text_marquee_shortcodes' );
}

if ( ! function_exists( 'attika_core_set_text_marquee_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for text marquee shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function attika_core_set_text_marquee_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-text-marquee';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'attika_core_filter_add_vc_shortcodes_custom_icon_class', 'attika_core_set_text_marquee_icon_class_name_for_vc_shortcodes' );
}