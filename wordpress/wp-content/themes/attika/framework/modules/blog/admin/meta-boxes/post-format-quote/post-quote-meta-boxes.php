<?php

if ( ! function_exists( 'attika_mikado_map_post_quote_meta' ) ) {
	function attika_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'attika' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'attika' ),
				'description' => esc_html__( 'Enter Quote text', 'attika' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'attika' ),
				'description' => esc_html__( 'Enter Quote author', 'attika' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_post_quote_meta', 25 );
}