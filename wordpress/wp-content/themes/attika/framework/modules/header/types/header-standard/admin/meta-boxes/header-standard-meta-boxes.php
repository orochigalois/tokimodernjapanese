<?php

if ( ! function_exists( 'attika_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function attika_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'attika_mikado_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'attika_mikado_header_standard_meta_map' ) ) {
	function attika_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = attika_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		attika_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'attika' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'attika' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'attika' ),
					'left'   => esc_html__( 'Left', 'attika' ),
					'right'  => esc_html__( 'Right', 'attika' ),
					'center' => esc_html__( 'Center', 'attika' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_additional_header_area_meta_boxes_map', 'attika_mikado_header_standard_meta_map' );
}