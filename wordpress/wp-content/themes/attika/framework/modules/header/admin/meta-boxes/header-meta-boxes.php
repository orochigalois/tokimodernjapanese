<?php

if ( ! function_exists( 'attika_mikado_header_types_meta_boxes' ) ) {
	function attika_mikado_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'attika_mikado_filter_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'attika' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'attika_mikado_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function attika_mikado_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'attika_mikado_filter_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'attika_mikado_map_header_meta' ) ) {
	function attika_mikado_map_header_meta() {
		$header_type_meta_boxes              = attika_mikado_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = attika_mikado_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'attika' ),
				'name'  => 'header_meta'
			)
		);

        attika_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_disable_header_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__( 'Disable Header for this Page', 'attika' ),
                'description'   => esc_html__( 'Enabling this option will hide header on this page', 'attika' ),
                'options'       => attika_mikado_get_yes_no_select_array(),
                'parent'        => $header_meta_box,
            )
        );

        $show_header_meta_container = attika_mikado_add_admin_container(
            array(
                'name'       => 'mkdf_show_header_meta_container',
                'parent'     => $header_meta_box,
                'dependency' => array(
                    'hide' => array(
                        'mkdf_disable_header_meta' => 'yes'
                    )
                )
            )
        );
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'attika' ),
				'description'   => esc_html__( 'Select header type layout', 'attika' ),
				'parent'        => $show_header_meta_container,
				'options'       => $header_type_meta_boxes
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'attika' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'attika' ),
				'parent'        => $show_header_meta_container,
				'options'       => array(
					''             => esc_html__( 'Default', 'attika' ),
					'light-header' => esc_html__( 'Light', 'attika' ),
					'dark-header'  => esc_html__( 'Dark', 'attika' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'parent'          => $show_header_meta_container,
				'type'            => 'select',
				'name'            => 'mkdf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'attika' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'attika' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'attika' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'attika' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'attika' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'attika' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'attika' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'attika_mikado_action_additional_header_area_meta_boxes_map', $show_header_meta_container );
		
		//top area
		do_action( 'attika_mikado_action_header_top_area_meta_boxes_map', $show_header_meta_container );
		
		//logo area
		do_action( 'attika_mikado_action_header_logo_area_meta_boxes_map', $show_header_meta_container );
		
		//menu area
		do_action( 'attika_mikado_action_header_menu_area_meta_boxes_map', $show_header_meta_container );

		//dropdown
		do_action( 'attika_mikado_action_dropdown_meta_boxes_map', $show_header_meta_container );

		//widget areaa
		do_action( 'attika_mikado_action_header_widget_areas_meta_boxes_map', $show_header_meta_container );
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_header_meta', 50 );
}