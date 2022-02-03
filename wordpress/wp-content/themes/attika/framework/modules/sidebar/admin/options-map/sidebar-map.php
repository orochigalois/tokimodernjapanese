<?php

if ( ! function_exists( 'attika_mikado_sidebar_options_map' ) ) {
	function attika_mikado_sidebar_options_map() {
		
		attika_mikado_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'attika' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = attika_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'attika' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		attika_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'attika' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'attika' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => attika_mikado_get_custom_sidebars_options()
		) );
		
		$attika_custom_sidebars = attika_mikado_get_custom_sidebars();
		if ( count( $attika_custom_sidebars ) > 0 ) {
			attika_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'attika' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'attika' ),
				'parent'      => $sidebar_panel,
				'options'     => $attika_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'attika_mikado_action_options_map', 'attika_mikado_sidebar_options_map', attika_mikado_set_options_map_position( 'sidebar' ) );
}