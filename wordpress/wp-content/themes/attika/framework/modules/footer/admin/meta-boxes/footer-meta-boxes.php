<?php

if ( ! function_exists( 'attika_mikado_map_footer_meta' ) ) {
	function attika_mikado_map_footer_meta() {
		
		$footer_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'attika' ),
				'name'  => 'footer_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'attika' ),
				'options'       => attika_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = attika_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			attika_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'attika' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'attika' ),
					'options'       => attika_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			attika_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'attika' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'attika' ),
					'options'       => attika_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			attika_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'attika' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'attika' ),
					'options'       => attika_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			attika_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_footer_top_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Top Background Color', 'attika' ),
					'description' => esc_html__( 'Set background color for top footer area', 'attika' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'mkdf_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			attika_mikado_create_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'attika' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'attika' ),
					'options'       => attika_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			attika_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_footer_bottom_background_color_meta',
					'type'        => 'color',
					'label'       => esc_html__( 'Footer Bottom Background Color', 'attika' ),
					'description' => esc_html__( 'Set background color for bottom footer area', 'attika' ),
					'parent'      => $show_footer_meta_container,
					'dependency' => array(
						'show' => array(
							'mkdf_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_footer_meta', 70 );
}