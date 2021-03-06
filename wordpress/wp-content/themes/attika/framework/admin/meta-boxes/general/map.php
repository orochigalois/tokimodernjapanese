<?php

if ( ! function_exists( 'attika_mikado_map_general_meta' ) ) {
	function attika_mikado_map_general_meta() {
		
		$general_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'attika' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'attika' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'attika' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'attika' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = attika_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'attika' ),
				'description' => esc_html__( 'Define styles for Content area', 'attika' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'parent' => $mkdf_content_padding_group
				)
			);
			
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'attika' ),
						'parent'      => $mkdf_content_padding_row
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'attika' ),
						'parent'        => $mkdf_content_padding_row
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'attika' ),
						'options'       => attika_mikado_get_yes_no_select_array(),
						'parent'        => $mkdf_content_padding_row
					)
				);
		
			$mkdf_content_padding_row_1 = attika_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row_1',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'attika' ),
						'parent' => $mkdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'attika' ),
						'parent'  => $mkdf_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'attika' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'attika' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'attika' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'attika' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'attika' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'attika' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'attika' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'attika' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'attika' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'attika' ),
				'options'     => attika_mikado_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'attika' ),
				'parent'  => $general_meta_box,
				'options' => attika_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = attika_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'attika' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'attika' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'attika' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'attika' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'attika' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'attika' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'attika' ),
						'description'   => esc_html__( 'Choose background image attachment', 'attika' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'attika' ),
							'fixed'  => esc_html__( 'Fixed', 'attika' ),
							'scroll' => esc_html__( 'Scroll', 'attika' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'attika' ),
				'parent'        => $general_meta_box,
				'options'       => attika_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = attika_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'attika' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'attika' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'attika' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'attika' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'attika' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'attika' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				attika_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'attika' ),
						'options'       => attika_mikado_get_yes_no_select_array(),
					)
				);
		
				attika_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'attika' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'attika' ),
						'options'       => attika_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'attika' ),
				'parent'        => $general_meta_box,
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = attika_mikado_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				attika_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'attika' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'attika' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => attika_mikado_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = attika_mikado_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					attika_mikado_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'attika' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = attika_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'attika' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'attika' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = attika_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					attika_mikado_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'attika' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'attika' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'attika' ),
								'pulse'                 => esc_html__( 'Pulse', 'attika' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'attika' ),
								'cube'                  => esc_html__( 'Cube', 'attika' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'attika' ),
								'stripes'               => esc_html__( 'Stripes', 'attika' ),
								'wave'                  => esc_html__( 'Wave', 'attika' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'attika' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'attika' ),
								'atom'                  => esc_html__( 'Atom', 'attika' ),
								'clock'                 => esc_html__( 'Clock', 'attika' ),
								'mitosis'               => esc_html__( 'Mitosis', 'attika' ),
								'lines'                 => esc_html__( 'Lines', 'attika' ),
								'fussion'               => esc_html__( 'Fussion', 'attika' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'attika' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'attika' )
							)
						)
					);
					
					attika_mikado_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'attika' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					attika_mikado_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'attika' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'attika' ),
							'options'     => attika_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'attika' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'attika' ),
				'parent'      => $general_meta_box,
				'options'     => attika_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_general_meta', 10 );
}

if ( ! function_exists( 'attika_mikado_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function attika_mikado_container_background_style( $style ) {
		$page_id      = attika_mikado_get_page_id();
		$class_prefix = attika_mikado_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .mkdf-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'mkdf_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'mkdf_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'mkdf_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = attika_mikado_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'attika_mikado_filter_add_page_custom_style', 'attika_mikado_container_background_style' );
}