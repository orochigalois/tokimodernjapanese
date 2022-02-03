<?php

if ( ! function_exists( 'attika_mikado_map_post_link_meta' ) ) {
	function attika_mikado_map_post_link_meta() {
		$link_post_format_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'attika' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'attika' ),
				'description' => esc_html__( 'Enter link', 'attika' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_post_link_meta', 24 );
}