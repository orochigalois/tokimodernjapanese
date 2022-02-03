<?php

if ( ! function_exists( 'attika_mikado_logo_meta_box_map' ) ) {
	function attika_mikado_logo_meta_box_map() {
		
		$logo_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'attika' ),
				'name'  => 'logo_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'attika' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'attika' ),
				'parent'      => $logo_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'attika' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'attika' ),
				'parent'      => $logo_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'attika' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'attika' ),
				'parent'      => $logo_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'attika' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'attika' ),
				'parent'      => $logo_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'attika' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'attika' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_logo_meta_box_map', 47 );
}