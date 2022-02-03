<?php

if ( ! function_exists( 'attika_core_map_portfolio_settings_meta' ) ) {
	function attika_core_map_portfolio_settings_meta() {
		$meta_box = attika_mikado_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'attika-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		attika_mikado_create_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'attika-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'attika-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'attika-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'attika-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'attika-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'attika-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'attika-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'attika-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'attika-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'attika-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'attika-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'attika-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'attika-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'attika-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'attika-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'attika-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => attika_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'attika-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'attika-core' ),
				'default_value' => '',
				'options'       => attika_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'attika-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'attika-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => attika_mikado_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'attika-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'attika-core' ),
				'default_value' => '',
				'options'       => attika_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'attika-core' ),
				'parent'        => $meta_box,
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'attika-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'attika-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'attika-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'attika-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'attika-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'attika-core' ),
				'parent'      => $meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'attika-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'attika-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'attika-core' ),
					'small'              => esc_html__( 'Small', 'attika-core' ),
					'large-width'        => esc_html__( 'Large Width', 'attika-core' ),
					'large-height'       => esc_html__( 'Large Height', 'attika-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'attika-core' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'attika-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'attika-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'attika-core' ),
					'large-width' => esc_html__( 'Large Width', 'attika-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'attika-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'attika-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_core_map_portfolio_settings_meta', 41 );
}