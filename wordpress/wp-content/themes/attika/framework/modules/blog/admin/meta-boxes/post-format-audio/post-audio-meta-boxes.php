<?php

if ( ! function_exists( 'attika_mikado_map_post_audio_meta' ) ) {
	function attika_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'attika' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'attika' ),
				'description'   => esc_html__( 'Choose audio type', 'attika' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'attika' ),
					'self'            => esc_html__( 'Self Hosted', 'attika' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = attika_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'attika' ),
				'description' => esc_html__( 'Enter audio URL', 'attika' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		attika_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'attika' ),
				'description' => esc_html__( 'Enter audio link', 'attika' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_mikado_map_post_audio_meta', 23 );
}