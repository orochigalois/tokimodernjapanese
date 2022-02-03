<?php

if ( ! function_exists( 'attika_mikado_map_woocommerce_meta' ) ) {
	function attika_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'attika' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'attika' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'attika' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'attika' ),
					'small'              => esc_html__( 'Small', 'attika' ),
					'large-width'        => esc_html__( 'Large Width', 'attika' ),
					'large-height'       => esc_html__( 'Large Height', 'attika' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'attika' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'attika' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'attika' ),
				'options'       => attika_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'attika' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'attika' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_woocommerce_meta', 99 );
}