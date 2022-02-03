<?php

/*** Post Settings ***/

if ( ! function_exists( 'attika_mikado_map_post_meta' ) ) {
	function attika_mikado_map_post_meta() {
		
		$post_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'attika' ),
				'name'  => 'post-meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'attika' ),
				'parent'        => $post_meta_box,
				'options'       => attika_mikado_get_yes_no_select_array()
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'attika' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'attika' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => attika_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$attika_custom_sidebars = attika_mikado_get_custom_sidebars();
		if ( count( $attika_custom_sidebars ) > 0 ) {
			attika_mikado_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'attika' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'attika' ),
				'parent'      => $post_meta_box,
				'options'     => attika_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'attika' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'attika' ),
				'parent'      => $post_meta_box
			)
		);

		do_action('attika_mikado_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_post_meta', 20 );
}
