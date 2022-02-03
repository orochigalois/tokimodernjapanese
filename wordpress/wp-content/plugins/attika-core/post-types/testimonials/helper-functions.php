<?php

if ( ! function_exists( 'attika_core_testimonials_meta_box_functions' ) ) {
	function attika_core_testimonials_meta_box_functions( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'attika_mikado_filter_meta_box_post_types_save', 'attika_core_testimonials_meta_box_functions' );
	add_filter( 'attika_mikado_filter_meta_box_post_types_remove', 'attika_core_testimonials_meta_box_functions' );
}

if ( ! function_exists( 'attika_core_register_testimonials_cpt' ) ) {
	function attika_core_register_testimonials_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'AttikaCore\CPT\Testimonials\TestimonialsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'attika_core_filter_register_custom_post_types', 'attika_core_register_testimonials_cpt' );
}

// Load testimonials shortcodes
if ( ! function_exists( 'attika_core_include_testimonials_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function attika_core_include_testimonials_shortcodes_files() {
		if( attika_core_is_theme_registered() ) {
			foreach ( glob( ATTIKA_CORE_CPT_PATH . '/testimonials/shortcodes/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action( 'attika_core_action_include_shortcodes_file', 'attika_core_include_testimonials_shortcodes_files' );
}