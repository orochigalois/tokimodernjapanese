<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'attika_mikado_map_blog_meta' ) ) {
	function attika_mikado_map_blog_meta() {
		$mkdf_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkdf_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'attika' ),
				'name'  => 'blog_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'attika' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'attika' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'attika' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'attika' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkdf_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'attika' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'attika' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'attika' ),
					'in-grid'    => esc_html__( 'In Grid', 'attika' ),
					'full-width' => esc_html__( 'Full Width', 'attika' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'attika' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'attika' ),
				'parent'      => $blog_meta_box,
				'options'     => attika_mikado_get_number_of_columns_array( true, array( 'one', 'six' ) )
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'attika' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'attika' ),
				'options'     => attika_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'attika' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'attika' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'attika' ),
					'fixed'    => esc_html__( 'Fixed', 'attika' ),
					'original' => esc_html__( 'Original', 'attika' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'attika' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'attika' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'attika' ),
					'standard'        => esc_html__( 'Standard', 'attika' ),
					'load-more'       => esc_html__( 'Load More', 'attika' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'attika' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'attika' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'attika' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'attika' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_blog_meta', 30 );
}