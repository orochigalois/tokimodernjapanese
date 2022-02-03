<?php

if ( ! function_exists( 'attika_core_reviews_map' ) ) {
	function attika_core_reviews_map() {
		
		$reviews_panel = attika_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'attika-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'attika-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'attika-core' ),
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'attika-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'attika-core' ),
			)
		);
	}
	
	add_action( 'attika_mikado_action_additional_page_options_map', 'attika_core_reviews_map', 75 ); //one after elements
}