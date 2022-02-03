<?php

if ( ! function_exists( 'attika_core_map_testimonials_meta' ) ) {
	function attika_core_map_testimonials_meta() {
		$testimonial_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'attika-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'attika-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'attika-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'attika-core' ),
				'description' => esc_html__( 'Enter author name', 'attika-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'attika-core' ),
				'description' => esc_html__( 'Enter author job position', 'attika-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_core_map_testimonials_meta', 95 );
}