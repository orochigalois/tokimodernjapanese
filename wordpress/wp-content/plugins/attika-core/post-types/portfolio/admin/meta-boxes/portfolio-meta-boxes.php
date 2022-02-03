<?php

if ( ! function_exists( 'attika_core_map_portfolio_meta' ) ) {
	function attika_core_map_portfolio_meta() {
		global $attika_mikado_global_Framework;
		
		$attika_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$attika_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$attika_portfolio_images = new AttikaMikadoClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'attika-core' ), '', '', 'portfolio_images' );
		$attika_mikado_global_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $attika_portfolio_images );
		
		$attika_portfolio_image_gallery = new AttikaMikadoClassMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'attika-core' ), esc_html__( 'Choose your portfolio images', 'attika-core' ) );
		$attika_portfolio_images->addChild( 'mkdf-portfolio-image-gallery', $attika_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$attika_portfolio_images_videos = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'attika-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		attika_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $attika_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'attika-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'attika-core' ),
						'options' => array(
							'image' => esc_html__('Image','attika-core'),
							'video' => esc_html__('Video','attika-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'attika-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'attika-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'attika-core'),
							'vimeo' => esc_html__('Vimeo', 'attika-core'),
							'self' => esc_html__('Self Hosted', 'attika-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'attika-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'attika-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'attika-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$attika_additional_sidebar_items = attika_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'attika-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		attika_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $attika_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'attika-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'attika-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'attika-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'attika-core' )
					)
				)
			)
		);
	}
	
	add_action( 'attika_mikado_action_meta_boxes_map', 'attika_core_map_portfolio_meta', 40 );
}