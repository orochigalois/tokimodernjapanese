<?php

if ( ! function_exists( 'attika_mikado_sidearea_options_map' ) ) {
	function attika_mikado_sidearea_options_map() {

        attika_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'attika'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = attika_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'attika'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'attika'),
                'description'   => esc_html__('Choose a type of Side Area', 'attika'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'attika'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'attika'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'attika'),
                ),
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'attika'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'attika'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = attika_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'attika'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'attika'),
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'attika'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'attika'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'predefined',
                'label'         => esc_html__('Select Side Area Icon Source', 'attika'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'attika'),
                'options'       => attika_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = attika_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'linear_icons',
                'label'         => esc_html__('Side Area Icon Pack', 'attika'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'attika'),
                'options'       => attika_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = attika_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'attika'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'attika'),
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'attika'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'attika'),
            )
        );

        $side_area_icon_style_group = attika_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'attika'),
                'description' => esc_html__('Define styles for Side Area icon', 'attika')
            )
        );

        $side_area_icon_style_row1 = attika_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'attika')
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'attika')
            )
        );

        $side_area_icon_style_row2 = attika_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'attika')
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'attika')
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'attika'),
                'description' => esc_html__('Choose a background color for Side Area', 'attika')
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'attika'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'attika'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        attika_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'attika'),
                'description'   => esc_html__('Choose text alignment for side area', 'attika'),
                'options'       => array(
                    ''       => esc_html__('Default', 'attika'),
                    'left'   => esc_html__('Left', 'attika'),
                    'center' => esc_html__('Center', 'attika'),
                    'right'  => esc_html__('Right', 'attika')
                )
            )
        );
    }

    add_action('attika_mikado_action_options_map', 'attika_mikado_sidearea_options_map', attika_mikado_set_options_map_position( 'sidearea' ) );
}