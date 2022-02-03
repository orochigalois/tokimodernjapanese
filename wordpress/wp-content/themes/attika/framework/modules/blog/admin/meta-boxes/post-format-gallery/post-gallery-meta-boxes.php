<?php

if ( ! function_exists( 'attika_mikado_map_post_gallery_meta' ) ) {
	
	function attika_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'attika' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		attika_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'attika' ),
				'description' => esc_html__( 'Choose your gallery images', 'attika' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_post_gallery_meta', 21 );
}
