<?php

if ( attika_restaurant_theme_installed() ) {
	if ( ! function_exists( 'attika_restaurant_options_map' ) ) {
		/**
		 * Adds admin page for OpenTable integration
		 */
		function attika_restaurant_options_map() {
			attika_mikado_add_admin_page(
				array(
					'title' => esc_html__( 'Restaurant', 'attika-restaurant' ),
					'slug'  => '_restaurant',
					'icon'  => 'fa fa-cutlery'
				)
			);
			
			//#Working Hours panel
			$panel_working_hours = attika_mikado_add_admin_panel(
				array(
					'page'  => '_restaurant',
					'name'  => 'panel_working_hours',
					'title' => esc_html__( 'Working Hours', 'attika-restaurant' )
				)
			);
			
			$monday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'monday_group',
					'title'       => esc_html__( 'Monday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Monday', 'attika-restaurant' )
				)
			);
			
			$monday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'monday_row',
					'parent' => $monday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_monday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $monday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_monday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $monday_row
				)
			);
			
			$tuesday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'tuesday_group',
					'title'       => esc_html__( 'Tuesday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Tuesday', 'attika-restaurant' )
				)
			);
			
			$tuesday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'tuesday_row',
					'parent' => $tuesday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_tuesday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $tuesday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_tuesday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $tuesday_row
				)
			);
			
			$wednesday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'wednesday_group',
					'title'       => esc_html__( 'Wednesday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Wednesday', 'attika-restaurant' )
				)
			);
			
			$wednesday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'wednesday_row',
					'parent' => $wednesday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_wednesday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $wednesday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_wednesday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $wednesday_row
				)
			);
			
			$thursday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'thursday_group',
					'title'       => esc_html__( 'Thursday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => 'Working hours for Thursday'
				)
			);
			
			$thursday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'thursday_row',
					'parent' => $thursday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_thursday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $thursday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_thursday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $thursday_row
				)
			);
			
			$friday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'friday_group',
					'title'       => esc_html__( 'Friday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Friday', 'attika-restaurant' )
				)
			);
			
			$friday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'friday_row',
					'parent' => $friday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_friday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $friday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_friday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $friday_row
				)
			);
			
			$saturday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'saturday_group',
					'title'       => esc_html__( 'Saturday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Saturday', 'attika-restaurant' )
				)
			);
			
			$saturday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'saturday_row',
					'parent' => $saturday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_saturday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $saturday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_saturday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $saturday_row
				)
			);
			
			$sunday_group = attika_mikado_add_admin_group(
				array(
					'name'        => 'sunday_group',
					'title'       => esc_html__( 'Sunday', 'attika-restaurant' ),
					'parent'      => $panel_working_hours,
					'description' => esc_html__( 'Working hours for Sunday', 'attika-restaurant' )
				)
			);
			
			$sunday_row = attika_mikado_add_admin_row(
				array(
					'name'   => 'sunday_row',
					'parent' => $sunday_group
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_sunday_from',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'From', 'attika-restaurant' ),
					'parent' => $sunday_row
				)
			);
			
			attika_mikado_add_admin_field(
				array(
					'name'   => 'wh_sunday_to',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'To', 'attika-restaurant' ),
					'parent' => $sunday_row
				)
			);
		}
		
		add_action( 'attika_mikado_action_options_map', 'attika_restaurant_options_map', 71 ); //one after elements
	}
}