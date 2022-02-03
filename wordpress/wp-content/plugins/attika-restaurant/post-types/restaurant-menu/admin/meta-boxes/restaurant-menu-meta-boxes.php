<?php

if ( attika_restaurant_theme_installed() ) {
	if ( ! function_exists( 'attika_restaurant_meta_box_map' ) ) {
		function attika_restaurant_meta_box_map() {
			$restaurant_menu_meta_box = attika_mikado_create_meta_box(
				array(
					'scope' => array( 'restaurant-menu' ),
					'title' => esc_html__( 'Restaurant Menu Item Settings', 'attika-restaurant' ),
					'name'  => 'cafe_menu_item_meta'
				)
			);

			attika_mikado_create_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_price',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Price', 'attika-restaurant'),
					'description'   => esc_html__('Enter price for this restaurant menu item', 'attika-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
					'args'          => array(
						'col_width' => '3'
					)
				)
			);

            attika_mikado_create_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_description',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Description', 'attika-restaurant'),
					'description'   => esc_html__('Enter description for this restaurant menu item', 'attika-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
				)
			);

            attika_mikado_create_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_label',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Label', 'attika-restaurant'),
					'description'   => esc_html__('Enter label for this restaurant menu item', 'attika-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
					'args'          => array(
						'col_width' => '3'
					)
				)
			);
		}
		
		add_action('attika_mikado_action_meta_boxes_map', 'attika_restaurant_meta_box_map');
	}
}