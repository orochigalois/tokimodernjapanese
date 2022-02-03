<?php

if ( ! function_exists( 'attika_mikado_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function attika_mikado_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'attika' );
		
		return $templates;
	}
	
	add_filter( 'attika_mikado_filter_register_blog_templates', 'attika_mikado_register_blog_standard_template_file' );
}

if ( ! function_exists( 'attika_mikado_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function attika_mikado_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'attika' );
		
		return $options;
	}
	
	add_filter( 'attika_mikado_filter_blog_list_type_global_option', 'attika_mikado_set_blog_standard_type_global_option' );
}