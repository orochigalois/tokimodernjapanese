<?php
namespace AttikaCore\CPT\Shortcodes\InfoBox;

use AttikaCore\Lib;

class InfoBox implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_info_box';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Info Box', 'attika-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-info-box extended-custom-icon',
					'category'                  => esc_html__( 'by ATTIKA', 'attika-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'attika-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'attika-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'box_background_color',
							'heading'    => esc_html__( 'info Box Background Color', 'attika-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_padding',
							'heading'    => esc_html__( 'Content Padding', 'attika-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'attika-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'attika-core' ),
							'value'       => array_flip( attika_mikado_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
                        array(
                            'type'        => 'textfield',
                            'param_name'  => 'link',
                            'heading'     => esc_html__( 'Link', 'attika-core' ),
                            'description' => esc_html__( 'Set link around email', 'attika-core' )
                        ),
						array(
							'type'       => 'textfield',
							'param_name' => 'email',
							'heading'    => esc_html__( 'Email', 'attika-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'          => '',
			'box_background_color'  => '',
			'title'                 => '',
			'title_tag'             => 'h5',
			'email'                 => '',
			'link'                  => '',
			'content_padding'       => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );

		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['content_styles']  = $this->getContentStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		return attika_core_get_shortcode_module_template_part( 'templates/info-box', 'info-box','', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array('mkdf-ib');
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return $holderClasses;
	}
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['box_background_color'] !== '' ) {
			$styles[] = 'background-color: ' . esc_attr( $params['box_background_color']);
		}

		if ( $params['content_padding'] !== ''  ) {
			$styles[] = 'padding: ' . $params['content_padding'];
		}
		
		return implode( ';', $styles );
	}
	

}