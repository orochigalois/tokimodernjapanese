<?php

if ( ! function_exists( 'attika_mikado_portfolio_options_map' ) ) {
	function attika_mikado_portfolio_options_map() {
		
		attika_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'attika-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = attika_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'attika-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'attika-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'attika-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'attika-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'attika-core' ),
				'parent'        => $panel_archive,
				'options'       => attika_mikado_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'attika-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'attika-core' ),
				'default_value' => 'normal',
				'options'       => attika_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'attika-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'attika-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'attika-core' ),
					'landscape' => esc_html__( 'Landscape', 'attika-core' ),
					'portrait'  => esc_html__( 'Portrait', 'attika-core' ),
					'square'    => esc_html__( 'Square', 'attika-core' )
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'attika-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'attika-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'attika-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'attika-core' )
				)
			)
		);
		
		$panel = attika_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'attika-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'attika-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'attika-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'attika-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'attika-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => attika_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'attika-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'attika-core' ),
				'default_value' => 'normal',
				'options'       => attika_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = attika_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'attika-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'attika-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => attika_mikado_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'attika-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'attika-core' ),
				'default_value' => 'normal',
				'options'       => attika_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		attika_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'attika-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'attika-core' ),
					'yes' => esc_html__( 'Yes', 'attika-core' ),
					'no'  => esc_html__( 'No', 'attika-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'attika-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		$container_navigate_category = attika_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'attika-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'attika-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		attika_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'attika-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'attika-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_options_map', 'attika_mikado_portfolio_options_map', attika_mikado_set_options_map_position( 'portfolio' ) );
}