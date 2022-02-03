<?php

if ( ! function_exists( 'attika_mikado_portfolio_category_additional_fields' ) ) {
	function attika_mikado_portfolio_category_additional_fields() {
		
		$fields = attika_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		attika_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'attika-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'attika_mikado_action_custom_taxonomy_fields', 'attika_mikado_portfolio_category_additional_fields' );
}