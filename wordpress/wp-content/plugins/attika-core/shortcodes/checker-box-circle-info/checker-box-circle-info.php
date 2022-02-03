<?php
namespace AttikaCore\CPT\Shortcodes\CheckerBoxCircleInfo;

use AttikaCore\Lib;

class CheckerBoxCircleInfo implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_checker_box_circle_info';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Divided Info Circle', 'attika-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-checker-box-circle-info extended-custom-icon',
					'category'                  => esc_html__( 'by ATTIKA', 'attika-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'textfield',
								'param_name'  => 'custom_class',
								'heading'     => esc_html__( 'Custom CSS Class', 'attika-core' ),
								'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'attika-core' )
							)
						),
						attika_mikado_icon_collections()->getVCParamsArray(),
						array(
							array(
								'type'       => 'attach_image',
								'param_name' => 'custom_icon',
								'heading'    => esc_html__( 'Custom Icon', 'attika-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'title_top',
								'heading'    => esc_html__( 'Title Top', 'attika-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'text_top',
								'heading'    => esc_html__( 'Text Top', 'attika-core' ),
								'dependency'  => array( 'element' => 'title_top', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'title_bottom',
								'heading'    => esc_html__( 'Title Bottom', 'attika-core' ),
								'dependency'  => array( 'element' => 'title_top', 'not_empty' => true )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'text_bottom',
								'heading'    => esc_html__( 'Text Bottom', 'attika-core' ),
								'dependency'  => array( 'element' => 'title_bottom', 'not_empty' => true )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'button_text',
								'heading'     => esc_html__( 'Button Text', 'attika-core' ),
								'save_always' => true,
								'admin_label' => true
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'button_link',
								'heading'    => esc_html__( 'Button Link', 'attika-core' ),
								'dependency'  => array( 'element' => 'button_text', 'not_empty' => true )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'button_target',
								'heading'     => esc_html__( 'Button Link Target', 'attika-core' ),
								'value'       => array_flip( attika_mikado_get_link_target_array() ),
								'save_always' => true
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'custom_icon_size',
								'heading'    => esc_html__( 'Custom Icon Size (px)', 'attika-core' ),
								'group'      => esc_html__( 'Icon Settings', 'attika-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'icon_color',
								'heading'    => esc_html__( 'Icon Color', 'attika-core' ),
								'group'      => esc_html__( 'Icon Settings', 'attika-core' )
							)
						),
						array(
							array(
								'type'       => 'textfield',
								'param_name' => 'left_content',
								'heading'    => esc_html__( 'Left Content', 'attika-core' ),
								'group'       => esc_html__('Left Box', 'attika-core')
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'left_content_background_color',
								'heading'    => esc_html__( 'Left Content Background Color', 'attika-core' ),
								'group'       => esc_html__('Left Box', 'attika-core')
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'left_content_padding',
								'heading'    => esc_html__( 'Left Content Padding', 'attika-core' ),
								'group'       => esc_html__('Left Box', 'attika-core')
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'right_content',
								'heading'    => esc_html__( 'Right Content', 'attika-core' ),
								'group'       => esc_html__('Right Box', 'attika-core')
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'right_content_background_color',
								'heading'    => esc_html__( 'Right Content Background Color', 'attika-core' ),
								'group'       => esc_html__('Right Box', 'attika-core')
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'right_content_padding',
								'heading'    => esc_html__( 'Right Content Padding', 'attika-core' ),
								'group'       => esc_html__('Right Box', 'attika-core')
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'                    => '',
			'custom_icon'                     => '',
			'custom_icon_size'                => '',
			'icon_color'                      => '',
			'left_content'                    => '',
			'left_content_background_color'   => '',
			'left_content_padding'            => '',
			'right_content'                   => '',
			'right_content_background_color'  => '',
			'right_content_padding'           => '',
			'title_top'                       => '',
			'text_top'                        => '',
			'title_bottom'                    => '',
			'text_bottom'                     => '',
			'button_text'                     => '',
			'button_link'                     => '',
			'button_target'                   => '',
		);
		$default_atts = array_merge( $default_atts, attika_mikado_icon_collections()->getShortcodeParams() );
		$params       = shortcode_atts( $default_atts, $atts );

		$iconPackName = attika_mikado_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );

		$params['icon']                  = $params[ $iconPackName ];
		$params['icon_params']           = $this->generateIconParams( $params );
		$params['holder_classes']        = $this->getHolderClasses( $params );
		$params['content_styles_left']   = $this->getContentLeftStyles( $params );
		$params['content_styles_right']  = $this->getContentRightStyles( $params );

		return attika_core_get_shortcode_module_template_part( 'templates/checker-box-circle-info', 'checker-box-circle-info','', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array('mkdf-cbci');
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		
		return $holderClasses;
	}

	private function generateIconParams( $params ) {
		$iconParams = array( 'icon_attributes' => array() );

		$iconParams['icon_attributes']['style'] = $this->generateIconStyles( $params );
		$iconParams['icon_attributes']['class'] = 'mkdf-icon-element';

		return $iconParams;
	}

	private function generateIconStyles( $params ) {
		$iconStyles = array();

		if ( ! empty( $params['icon_color'] ) ) {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}

		if ( ! empty( $params['custom_icon_size'] ) ) {
				$iconStyles[] = 'font-size:' . attika_mikado_filter_px( $params['custom_icon_size'] ) . 'px';
		}

		return implode( ';', $iconStyles );
	}
	
	private function getContentLeftStyles( $params ) {
		$styles = array();
		
		if ( $params['left_content_background_color'] !== '' ) {
			$styles[] = 'background-color: ' . esc_attr( $params['left_content_background_color']);
		}

		if ( $params['left_content_padding'] !== '' ) {
			$styles[] = 'padding: ' . esc_attr( $params['left_content_padding']);
		}
		
		return implode( ';', $styles );
	}

	private function getContentRightStyles( $params ) {
		$styles = array();

		if ( $params['right_content_background_color'] !== '' ) {
			$styles[] = 'background-color: ' . esc_attr( $params['right_content_background_color']);
		}

		if ( $params['right_content_padding'] !== '' ) {
			$styles[] = 'padding: ' . esc_attr( $params['right_content_padding']);
		}

		return implode( ';', $styles );
	}
}