<?php

if ( ! function_exists( 'attika_mikado_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function attika_mikado_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'attika_mikado_filter_header_vertical_hide_meta_boxes', $hide_dep_options = array( '' => '' ) );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'attika_mikado_header_vertical_area_meta_options_map' ) ) {
	function attika_mikado_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = attika_mikado_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_options
					)
				)
			)
		);
		
		attika_mikado_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'attika' )
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'attika' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'attika' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'attika' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'attika' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'attika' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'attika' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'attika' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'attika' ),
				'description'   => esc_html__( 'Set border on vertical area', 'attika' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
		$vertical_header_border_container = attika_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'dependency' => array(
					'show' => array(
						'mkdf_vertical_header_border_meta'  => 'yes'
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'attika' ),
				'description' => esc_html__( 'Choose color of border', 'attika' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'attika' ),
				'description'   => esc_html__( 'Set content in vertical center', 'attika' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'attika_mikado_action_additional_header_area_meta_boxes_map', 'attika_mikado_header_vertical_area_meta_options_map', 10, 1 );
}