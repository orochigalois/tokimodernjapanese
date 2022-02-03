<?php

if ( ! function_exists( 'attika_mikado_footer_options_map' ) ) {
	function attika_mikado_footer_options_map() {

		attika_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'attika' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = attika_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'attika' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		attika_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'attika' ),
				'parent'        => $footer_panel
			)
		);

        attika_mikado_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'attika' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'attika' ),
                'parent'        => $footer_panel,
            )
        );

		attika_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'attika' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = attika_mikado_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		attika_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'attika' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'attika' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		attika_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'attika' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'attika' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'attika' ),
					'left'   => esc_html__( 'Left', 'attika' ),
					'center' => esc_html__( 'Center', 'attika' ),
					'right'  => esc_html__( 'Right', 'attika' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		attika_mikado_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'attika' ),
				'description' => esc_html__( 'Set background color for top footer area', 'attika' ),
				'parent'      => $show_footer_top_container
			)
		);

		attika_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'attika' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = attika_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		attika_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '12',
				'label'         => esc_html__( 'Footer Bottom Columns', 'attika' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'attika' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		attika_mikado_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'attika' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'attika' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'attika_mikado_action_options_map', 'attika_mikado_footer_options_map', attika_mikado_set_options_map_position( 'footer' ) );
}