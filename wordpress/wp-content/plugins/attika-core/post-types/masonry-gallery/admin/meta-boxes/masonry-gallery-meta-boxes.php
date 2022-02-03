<?php

if ( ! function_exists( 'attika_core_map_masonry_gallery_meta' ) ) {
	function attika_core_map_masonry_gallery_meta() {
		
		$masonry_gallery_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'masonry-gallery' ),
				'title' => esc_html__( 'Masonry Gallery General', 'attika-core' ),
				'name'  => 'masonry_gallery_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_title_tag',
				'type'          => 'select',
				'default_value' => 'h4',
				'label'         => esc_html__( 'Title Tag', 'attika-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => attika_mikado_get_title_tag()
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_text',
				'type'   => 'text',
				'label'  => esc_html__( 'Text', 'attika-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_image',
				'type'   => 'image',
				'label'  => esc_html__( 'Custom Item Icon', 'attika-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_link',
				'type'   => 'text',
				'label'  => esc_html__( 'Link', 'attika-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_link_target',
				'type'          => 'select',
				'default_value' => '_self',
				'label'         => esc_html__( 'Link Target', 'attika-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => attika_mikado_get_link_target_array()
			)
		);
		
		attika_mikado_add_admin_section_title( array(
			'name'   => 'mkdf_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__( 'Masonry Gallery Item Style', 'attika-core' )
		) );
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_size',
				'type'          => 'select',
				'default_value' => 'small',
				'label'         => esc_html__( 'Size', 'attika-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'attika-core' ),
					'large-width'        => esc_html__( 'Large Width', 'attika-core' ),
					'large-height'       => esc_html__( 'Large Height', 'attika-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'attika-core' )
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Type', 'attika-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'standard'    => esc_html__( 'Standard', 'attika-core' ),
					'with-button' => esc_html__( 'With Button', 'attika-core' ),
					'simple'      => esc_html__( 'Simple', 'attika-core' )
				)
			)
		);
		
		$masonry_gallery_item_button_type_container = attika_mikado_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_button_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_masonry_gallery_item_type'  => array( 'standard', 'simple' )
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_button_label',
				'type'   => 'text',
				'label'  => esc_html__( 'Button Label', 'attika-core' ),
				'parent' => $masonry_gallery_item_button_type_container
			)
		);
		
		$masonry_gallery_item_simple_type_container = attika_mikado_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_simple_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_masonry_gallery_item_type'  => array( 'standard', 'with-button' )
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_simple_content_background_skin',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Skin', 'attika-core' ),
				'parent'        => $masonry_gallery_item_simple_type_container,
				'options'       => array(
					'default' => esc_html__( 'Default', 'attika-core' ),
					'light'   => esc_html__( 'Light', 'attika-core' ),
					'dark'    => esc_html__( 'Dark', 'attika-core' )
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_core_map_masonry_gallery_meta', 45 );
}