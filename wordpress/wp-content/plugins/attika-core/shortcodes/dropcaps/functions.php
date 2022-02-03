<?php

if ( ! function_exists( 'attika_core_add_dropcaps_shortcodes' ) ) {
	function attika_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'AttikaCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'attika_core_filter_add_vc_shortcode', 'attika_core_add_dropcaps_shortcodes' );
}