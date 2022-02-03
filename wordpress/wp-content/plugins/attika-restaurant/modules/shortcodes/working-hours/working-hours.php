<?php
namespace AttikaRestaurant\Shortcodes\WorkingHours;

use AttikaRestaurant\Lib\ShortcodeInterface;

class WorkingHours implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_working_hours';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Working Hours', 'attika-restaurant'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by ATTIKA RESTAURANT', 'attika-restaurant'),
			'icon'                      => 'icon-wpb-working-hours extended-custom-restaurant-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'attika-restaurant'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title Accent Word', 'attika-restaurant'),
					'param_name'  => 'title_accent_word',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Enable Frame', 'attika-restaurant'),
					'param_name'  => 'enable_frame',
					'description' => esc_html__('Enabling this option will display dark frame around working hours', 'attika-restaurant'),
					'admin_label' => true,
					'value'       => array(
						''    => '',
						'Yes' => 'yes',
						'No'  => 'no'
					),
					'save_always' => true
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Background Image', 'attika-restaurant'),
					'param_name'  => 'bg_image',
					'admin_label' => true,
					'value'       => array(
						''    => '',
						'Yes' => 'yes',
						'No'  => 'no'
					),
					'save_always' => true,
					'dependency'  => array('element' => 'enable_frame', 'value' => 'yes')
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title'             => '',
			'title_accent_word' => '',
			'enable_frame'      => '',
			'bg_image'          => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['working_hours']  = $this->getWorkingHours();
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles']  = $this->getHolderStyles($params);

		return attika_restaurant_get_template_part('modules/shortcodes/working-hours/templates/working-hours-template', '', $params, true);
	}

	private function getWorkingHours() {
		$workingHours = array();

		if(attika_restaurant_theme_installed()) {
			//monday
			if(attika_mikado_options()->getOptionValue('wh_monday_from') !== '') {
				$workingHours['monday']['label'] = __('Monday', 'attika-restaurant');
				$workingHours['monday']['from']  = attika_mikado_options()->getOptionValue('wh_monday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_monday_to') !== '') {
				$workingHours['monday']['to'] = attika_mikado_options()->getOptionValue('wh_monday_to');
			}

			//tuesday
			if(attika_mikado_options()->getOptionValue('wh_tuesday_from') !== '') {
				$workingHours['tuesday']['label'] = __('Tuesday', 'attika-restaurant');
				$workingHours['tuesday']['from']  = attika_mikado_options()->getOptionValue('wh_tuesday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_tuesday_to') !== '') {
				$workingHours['tuesday']['to'] = attika_mikado_options()->getOptionValue('wh_tuesday_to');
			}

			//wednesday
			if(attika_mikado_options()->getOptionValue('wh_wednesday_from') !== '') {
				$workingHours['wednesday']['label'] = __('Wednesday', 'attika-restaurant');
				$workingHours['wednesday']['from']  = attika_mikado_options()->getOptionValue('wh_wednesday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_wednesday_to') !== '') {
				$workingHours['wednesday']['to'] = attika_mikado_options()->getOptionValue('wh_wednesday_to');
			}

			//thursday
			if(attika_mikado_options()->getOptionValue('wh_thursday_from') !== '') {
				$workingHours['thursday']['label'] = __('Thursday', 'attika-restaurant');
				$workingHours['thursday']['from']  = attika_mikado_options()->getOptionValue('wh_thursday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_thursday_to') !== '') {
				$workingHours['thursday']['to'] = attika_mikado_options()->getOptionValue('wh_thursday_to');
			}

			//friday
			if(attika_mikado_options()->getOptionValue('wh_friday_from') !== '') {
				$workingHours['friday']['label'] = __('Friday', 'attika-restaurant');
				$workingHours['friday']['from']  = attika_mikado_options()->getOptionValue('wh_friday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_friday_to') !== '') {
				$workingHours['friday']['to'] = attika_mikado_options()->getOptionValue('wh_friday_to');
			}

			//saturday
			if(attika_mikado_options()->getOptionValue('wh_saturday_from') !== '') {
				$workingHours['saturday']['label'] = __('Saturday', 'attika-restaurant');
				$workingHours['saturday']['from']  = attika_mikado_options()->getOptionValue('wh_saturday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_saturday_to') !== '') {
				$workingHours['saturday']['to'] = attika_mikado_options()->getOptionValue('wh_saturday_to');
			}

			//sunday
			if(attika_mikado_options()->getOptionValue('wh_sunday_from') !== '') {
				$workingHours['sunday']['label'] = __('Sunday', 'attika-restaurant');
				$workingHours['sunday']['from']  = attika_mikado_options()->getOptionValue('wh_sunday_from');
			}

			if(attika_mikado_options()->getOptionValue('wh_sunday_to') !== '') {
				$workingHours['sunday']['to'] = attika_mikado_options()->getOptionValue('wh_sunday_to');
			}
		}

		return $workingHours;
	}

	private function getHolderClasses($params) {
		$classes = array('mkdf-working-hours-holder');

		if(isset($params['enable_frame']) && $params['enable_frame'] === 'yes') {
			$classes[] = 'mkdf-wh-with-frame';
		}

		if(isset($params['bg_image']) && $params['bg_image'] !== '') {
			$classes[] = 'mkdf-wh-with-bg-image';
		}

		return $classes;
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['bg_image'] !== '') {
			$bg_url = wp_get_attachment_url($params['bg_image']);

			if(!empty($bg_url)) {
				$styles[] = 'background-image: url('.$bg_url.')';
			}
		}

		return $styles;
	}

}
