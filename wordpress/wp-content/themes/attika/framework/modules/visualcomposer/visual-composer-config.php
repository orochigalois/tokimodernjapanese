<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = MIKADO_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'attika_mikado_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function attika_mikado_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'attika_mikado_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'attika_mikado_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function attika_mikado_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'attika' ),
				'value'      => array(
					esc_html__( 'Full Width', 'attika' ) => 'full-width',
					esc_html__( 'In Grid', 'attika' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Mikado Anchor ID', 'attika' ),
				'description' => esc_html__( 'For example "home"', 'attika' ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'attika' ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'attika' ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'attika' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'attika' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'attika' ),
				'value'       => array(
					esc_html__( 'Never', 'attika' )        => '',
					esc_html__( 'Below 1280px', 'attika' ) => '1280',
					esc_html__( 'Below 1024px', 'attika' ) => '1024',
					esc_html__( 'Below 768px', 'attika' )  => '768',
					esc_html__( 'Below 680px', 'attika' )  => '680',
					esc_html__( 'Below 480px', 'attika' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'attika' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Mikado Parallax Background Image', 'attika' ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Mikado Parallax Speed', 'attika' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'attika' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Mikado Parallax Section Height (px)', 'attika' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'attika' ),
				'value'      => array(
					esc_html__( 'Default', 'attika' ) => '',
					esc_html__( 'Left', 'attika' )    => 'left',
					esc_html__( 'Center', 'attika' )  => 'center',
					esc_html__( 'Right', 'attika' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'enable_parallax_background_elements',
                'heading'    => esc_html__( 'Enable Parallax Background Elements', 'attika' ),
                'value'      => array(
                    esc_html__( 'No', 'attika' ) => 'no',
                    esc_html__( 'Yes', 'attika' ) => 'yes',
                ),
                'description' => esc_html__( 'Enabling this feature will let you add two additional parallax elements positioned on the sides of this row. Disabled on touch devices.', 'attika' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'attach_image',
                'param_name' => 'left_parallax_background_element',
                'heading'    => esc_html__( 'Left Parallax Background Element', 'attika' ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'attach_image',
                'param_name' => 'right_parallax_background_element',
                'heading'    => esc_html__( 'Right Parallax Background Element', 'attika' ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row',
            array(
                'type'       => 'dropdown',
                'param_name' => 'parallax_background_elements_vertical_alignment',
                'heading'    => esc_html__( 'Parallax Background Elements Vertical Alignment', 'attika' ),
                'value'      => array(
                    esc_html__( 'Top', 'attika' ) => 'top',
                    esc_html__( 'Middle', 'attika' ) => 'middle',
                    esc_html__( 'Bottom', 'attika' ) => 'bottom',
                ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Mikado Row Content Width', 'attika' ),
				'value'      => array(
					esc_html__( 'Full Width', 'attika' ) => 'full-width',
					esc_html__( 'In Grid', 'attika' )    => 'grid'
				),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);

        vc_add_param( 'vc_row_inner',
            array(
                'type'        => 'textfield',
                'param_name'  => 'anchor',
                'heading'     => esc_html__( 'Mikado Anchor ID', 'attika' ),
                'description' => esc_html__( 'For example "home"', 'attika' ),
                'group'       => esc_html__( 'Mikado Settings', 'attika' )
            )
        );
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Mikado Background Color', 'attika' ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Mikado Background Image', 'attika' ),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Mikado Background Position', 'attika' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'attika' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Mikado Disable Background Image', 'attika' ),
				'value'       => array(
					esc_html__( 'Never', 'attika' )        => '',
					esc_html__( 'Below 1280px', 'attika' ) => '1280',
					esc_html__( 'Below 1024px', 'attika' ) => '1024',
					esc_html__( 'Below 768px', 'attika' )  => '768',
					esc_html__( 'Below 680px', 'attika' )  => '680',
					esc_html__( 'Below 480px', 'attika' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'attika' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Mikado Settings', 'attika' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Mikado Content Aligment', 'attika' ),
				'value'      => array(
					esc_html__( 'Default', 'attika' ) => '',
					esc_html__( 'Left', 'attika' )    => 'left',
					esc_html__( 'Center', 'attika' )  => 'center',
					esc_html__( 'Right', 'attika' )   => 'right'
				),
				'group'      => esc_html__( 'Mikado Settings', 'attika' )
			)
		);

        vc_add_param( 'vc_row_inner',
            array(
                'type'       => 'dropdown',
                'param_name' => 'enable_parallax_background_elements',
                'heading'    => esc_html__( 'Enable Parallax Background Elements', 'attika' ),
                'value'      => array(
                    esc_html__( 'No', 'attika' ) => 'no',
                    esc_html__( 'Yes', 'attika' ) => 'yes',
                ),
                'description' => esc_html__( 'Enabling this feature will let you add two additional parallax elements positioned on the sides of this row. Disabled on touch devices.', 'attika' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row_inner',
            array(
                'type'       => 'attach_image',
                'param_name' => 'left_parallax_background_element',
                'heading'    => esc_html__( 'Left Parallax Background Element', 'attika' ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row_inner',
            array(
                'type'       => 'attach_image',
                'param_name' => 'right_parallax_background_element',
                'heading'    => esc_html__( 'Right Parallax Background Element', 'attika' ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );

        vc_add_param( 'vc_row_inner',
            array(
                'type'       => 'dropdown',
                'param_name' => 'parallax_background_elements_vertical_alignment',
                'heading'    => esc_html__( 'Parallax Background Elements Vertical Alignment', 'attika' ),
                'value'      => array(
                    esc_html__( 'Top', 'attika' ) => 'top',
                    esc_html__( 'Middle', 'attika' ) => 'middle',
                    esc_html__( 'Bottom', 'attika' ) => 'bottom',
                ),
                'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
		);
		
		vc_add_param( 'vc_row_inner',
            array(
                'type'       => 'dropdown',
                'param_name' => 'enable_parallax_effect',
                'heading'    => esc_html__( 'Enable Parallax Effect', 'attika' ),
                'value'      => array(
                    esc_html__( 'Yes', 'attika' ) => 'yes',
                    esc_html__( 'No', 'attika' ) => 'no',
				),
				'default_value' => 'yes',
				'dependency'  => array( 'element' => 'enable_parallax_background_elements', 'value' => 'yes' ),
                'group'      => esc_html__( 'Mikado Settings', 'attika' )
            )
        );
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( attika_mikado_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Mikado Enable Passepartout', 'attika' ),
					'value'       => array_flip( attika_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Mikado Settings', 'attika' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Mikado Passepartout Size', 'attika' ),
					'value'       => array(
						esc_html__( 'Tiny', 'attika' )   => 'tiny',
						esc_html__( 'Small', 'attika' )  => 'small',
						esc_html__( 'Normal', 'attika' ) => 'normal',
						esc_html__( 'Large', 'attika' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'attika' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Side Passepartout', 'attika' ),
					'value'       => array_flip( attika_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'attika' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Mikado Disable Top Passepartout', 'attika' ),
					'value'       => array_flip( attika_mikado_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Mikado Settings', 'attika' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'attika_mikado_vc_row_map' );
}