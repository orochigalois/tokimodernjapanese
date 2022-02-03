<?php

if ( ! function_exists( 'attika_mikado_get_hide_dep_for_header_logo_area_options' ) ) {
	function attika_mikado_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'attika_mikado_filter_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'attika_mikado_header_logo_area_options_map' ) ) {
	function attika_mikado_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = attika_mikado_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = attika_mikado_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		attika_mikado_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'attika' )
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'attika' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'attika' )
			)
		);
		
		$logo_area_in_grid_container = attika_mikado_add_admin_container(
			array(
				'parent'     => $logo_area_container,
                'name'       => 'logo_area_in_grid_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid' => 'no'
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'attika' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'attika' ),
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'attika' ),
				'description'   => esc_html__( 'Set grid background transparency', 'attika' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'attika' ),
				'description'   => esc_html__( 'Set border on grid area', 'attika' )
			)
		);
		
		$logo_area_in_grid_border_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_in_grid_border_container,
				'type'        => 'color',
				'name'        => 'logo_area_in_grid_border_color',
				'label'       => esc_html__( 'Border Color', 'attika' ),
				'description' => esc_html__( 'Set border color for grid area', 'attika' ),
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_container,
				'type'        => 'color',
				'name'        => 'logo_area_background_color',
				'label'       => esc_html__( 'Background Color', 'attika' ),
				'description' => esc_html__( 'Set background color for logo area', 'attika' )
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'attika' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'attika' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'attika' ),
				'description'   => esc_html__( 'Set border on logo area', 'attika' )
			)
		);
		
		$logo_area_border_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_border'  => 'no'
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'label'         => esc_html__( 'Border Color', 'attika' ),
				'description'   => esc_html__( 'Set border color for logo area', 'attika' ),
				'parent'        => $logo_area_border_container
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'label'         => esc_html__( 'Height', 'attika' ),
				'description'   => esc_html__( 'Enter logo area height (default is 90px)', 'attika' ),
				'parent'        => $logo_area_container,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'attika_mikado_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'attika_mikado_action_header_logo_area_options_map', 'attika_mikado_header_logo_area_options_map', 10, 1 );
}