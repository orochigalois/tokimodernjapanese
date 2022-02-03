<?php

if ( ! function_exists( 'attika_mikado_get_title_types_meta_boxes' ) ) {
	function attika_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'attika_mikado_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'attika' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'attika_mikado_map_title_meta' ) ) {
	function attika_mikado_map_title_meta() {
		$title_type_meta_boxes = attika_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'attika' ),
				'name'  => 'title_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'attika' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'attika' ),
				'parent'        => $title_meta_box,
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = attika_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'attika' ),
						'description'   => esc_html__( 'Choose title type', 'attika' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'attika' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'attika' ),
						'options'       => attika_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'attika' ),
						'description' => esc_html__( 'Set a height for Title Area', 'attika' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'attika' ),
						'description' => esc_html__( 'Choose a background color for title area', 'attika' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'attika' ),
						'description' => esc_html__( 'Choose an Image for title area', 'attika' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'attika' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'attika' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'attika' ),
							'hide'                => esc_html__( 'Hide Image', 'attika' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'attika' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'attika' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'attika' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'attika' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'attika' )
						)
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'attika' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'attika' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'attika' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'attika' ),
							'window-top'    => esc_html__( 'From Window Top', 'attika' )
						)
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'attika' ),
						'options'       => attika_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'attika' ),
						'description' => esc_html__( 'Choose a color for title text', 'attika' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'attika' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'attika' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'attika' ),
						'options'       => attika_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'attika' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'attika' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'attika_mikado_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_title_meta', 60 );
}