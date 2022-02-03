<?php
namespace AttikaCore\CPT\Shortcodes\SectionTitle;

use AttikaCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_section_title';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Section Title', 'attika-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by ATTIKA', 'attika-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'attika-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'attika-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'attika-core' ),
							'value'       => array(
								esc_html__( 'Standard', 'attika-core' )    => 'standard',
								esc_html__( 'Two Columns', 'attika-core' ) => 'two-columns'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_position',
							'heading'     => esc_html__( 'Title - Text Position', 'attika-core' ),
							'value'       => array(
								esc_html__( 'Title Left - Text Right', 'attika-core' ) => 'title-left',
								esc_html__( 'Title Right - Text Left', 'attika-core' ) => 'title-right'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'two-columns' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'columns_space',
							'heading'     => esc_html__( 'Space Between Columns', 'attika-core' ),
							'value'       => array(
								esc_html__( 'Normal', 'attika-core' ) => 'normal',
								esc_html__( 'Small', 'attika-core' )  => 'small',
								esc_html__( 'Tiny', 'attika-core' )   => 'tiny'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'two-columns' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'attika-core' ),
							'value'       => array(
								esc_html__( 'Default', 'attika-core' ) => '',
								esc_html__( 'Left', 'attika-core' )    => 'left',
								esc_html__( 'Center', 'attika-core' )  => 'center',
								esc_html__( 'Right', 'attika-core' )   => 'right'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'attika-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_margin',
							'heading'    => esc_html__( 'Line Margin', 'attika-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'line_length',
							'heading'    => esc_html__( 'Line Length (px)', 'attika-core' )
						),
                        array(
                            'type'       => 'colorpicker',
                            'param_name' => 'line_color',
                            'heading'    => esc_html__( 'Line Color', 'attika-core' )
                        ),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'attika-core' ),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'attika-core' ),
							'value'       => array_flip( attika_mikado_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'attika-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'attika-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
							'group'      => esc_html__( 'Title Style', 'attika-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_bold_words',
							'heading'     => esc_html__( 'Words with Bold Font Weight', 'attika-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a "bold" font weight. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a light font weight, you would enter "1,2,3")', 'attika-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'attika-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_light_words',
							'heading'     => esc_html__( 'Words with Light Font Weight', 'attika-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in a "light" font weight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a light font weight, you would enter "1,3,4")', 'attika-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'attika-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_break_words',
							'heading'     => esc_html__( 'Position of Line Break', 'attika-core' ),
							'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter "3")', 'attika-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'attika-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'disable_break_words',
							'heading'     => esc_html__( 'Disable Line Break for Smaller Screens', 'attika-core' ),
							'value'       => array_flip( attika_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
							'group'       => esc_html__( 'Title Style', 'attika-core' )
						),
                        array(
                            'type'       => 'textarea_html',
                            'param_name' => 'content',
                            'heading'    => esc_html__( 'Text', 'masterds-core' ),
                            'value'      => ''
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text_margin',
                            'heading'    => esc_html__( 'Text Top Margin (px)', 'masterds-core' ),
                            'group'      => esc_html__( 'Text Style', 'masterds-core' )
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'text_right_padding',
                            'heading'    => esc_html__( 'Text Right Padding (px)', 'masterds-core' ),
                            'group'      => esc_html__( 'Text Style', 'masterds-core' )
                        )
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'        => '',
			'type'                => 'standard',
			'title_position'      => 'title-left',
			'columns_space'       => 'normal',
			'position'            => '',
			'holder_padding'      => '',
			'title'               => '',
			'title_tag'           => 'h2',
			'title_color'         => '',
			'title_bold_words'    => '',
			'title_light_words'   => '',
			'title_break_words'   => '',
			'disable_break_words' => '',
			'line_margin'         => '',
			'line_color'         => '',
			'line_length'         => '',
			'text'                => '',
			'text_margin'         => '',
			'text_right_padding'  => ''
		);
		$params = shortcode_atts( $args, $atts );

        $params['content']             = preg_replace( '#^<\/p>|<p>$#', '', $content ); // delete p tag before and after content
        $params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['title']          = $this->getModifiedTitle( $params );
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['text_styles']    = $this->getTextStyles( $params );
		$params['line_styles']    = $this->getLineStyles( $params );

		$html = attika_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		return $html;
	}

	private function getLineStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['line_margin'] ) ) {
			$styles[] = 'margin: ' . $params['line_margin'];
		}

		if ( ! empty( $params['line_length'] ) ) {
			$styles[] = 'height: ' . $params['line_length'];
		}

        if ( ! empty( $params['line_color'] ) ) {
            $styles[] = 'background-color: ' . $params['line_color'];
        }

		return implode( '; ', $styles );
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-st-' . $params['type'] : 'mkdf-st-' . $args['type'];
		$holderClasses[] = ! empty( $params['title_position'] ) ? 'mkdf-st-' . $params['title_position'] : 'mkdf-st-' . $args['title_position'];
		$holderClasses[] = ! empty( $params['columns_space'] ) ? 'mkdf-st-' . $params['columns_space'] . '-space' : 'mkdf-st-' . $args['columns_space'] . '-space';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'mkdf-st-disable-title-break' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding:' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_bold_words  = str_replace( ' ', '', $params['title_bold_words'] );
		$title_light_words = str_replace( ' ', '', $params['title_light_words'] );
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );
		
		if ( ! empty( $title ) ) {
			$bold_words  = explode( ',', $title_bold_words );
			$light_words = explode( ',', $title_light_words );
			$split_titles = explode( ',', $title_break_words );
			$split_title = explode( ' ', $title );
			
			if ( ! empty( $title_bold_words ) ) {
				foreach ( $bold_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="mkdf-st-title-bold">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_light_words ) ) {
				foreach ( $light_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="mkdf-st-title-light">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_break_words ) ) {
				foreach ( $split_titles as $value ) {
					$value = intval( $value );
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = $split_title[ $value - 1 ] . '<br />';
					}
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . attika_mikado_filter_px( $params['text_margin'] ) . 'px';
		}

		if ( $params['text_right_padding'] !== '' ) {
			$styles[] = 'padding-right: ' .  $params['text_right_padding'];
		}
		
		return implode( ';', $styles );
	}
}