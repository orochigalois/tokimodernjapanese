<?php
namespace AttikaCore\CPT\Shortcodes\AnchorMenu;

use AttikaCore\Lib;

class AnchorMenu implements Lib\ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'mkdf_anchor_menu';

		add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
        vc_map(array(
                'name' => esc_html__('Anchor Menu','attika-core'),
                'base' => $this->base,
                'icon' => 'icon-wpb-anchor-menu extended-custom-icon',
                'category' => esc_html__('by ATTIKA','attika-core'),
                'params' => array(
					array(
						'type' => 'param_group',
						'heading' => esc_html__( 'Menu Items', 'attika-core' ),
						'param_name' => 'menu_items',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Label', 'attika-core' ),
								'param_name' => 'label',
								'admin_label' => true,
							),array(
								'type' => 'textfield',
								'heading' => esc_html__( 'Link with anchor', 'attika-core' ),
								'param_name' => 'anchor',
								'admin_label' => true,
							)
						)
					)
                )
            )
        );
    }

    public function render($atts, $content = null) {

        $args = array(
            'menu_items' => ''
        );

        $params = shortcode_atts($args, $atts);
		extract($params);

		$params['menu_items'] = json_decode(urldecode($params['menu_items']), true);

        $html = attika_core_get_shortcode_module_template_part('templates/anchor-menu-template', 'anchor-menu', '', $params);

        return $html;
    }

}