<?php

if ( ! function_exists( 'attika_mikado_map_sidebar_meta' ) ) {
	function attika_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'attika_mikado_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'attika' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'attika' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'attika' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => attika_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = attika_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			attika_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'attika' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'attika' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_sidebar_meta', 31 );
}