<?php
use AttikaMikadoNamespace\Modules\Header\Lib\HeaderFactory;

if ( ! function_exists( 'attika_mikado_get_header' ) ) {
	/**
	 * Loads header HTML based on header type option. Sets all necessary parameters for header
	 * and defines attika_mikado_filter_header_type_parameters filter
	 */
	function attika_mikado_get_header() {
		$id = attika_mikado_get_page_id();

		$disable_header =  get_post_meta( $id, 'mkdf_disable_header_meta', true );

		if($disable_header !== 'yes') {
            //will be read from options
            $header_type = attika_mikado_get_meta_field_intersect( 'header_type', $id );

            $menu_area_in_grid = attika_mikado_get_meta_field_intersect( 'menu_area_in_grid', $id );

            $header_behavior = attika_mikado_get_meta_field_intersect( 'header_behaviour', $id );

            if ( HeaderFactory::getInstance()->validHeaderObject() ) {
                $parameters = array(
                    'hide_logo'          => attika_mikado_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
                    'menu_area_in_grid'  => $menu_area_in_grid == 'yes' ? true : false,
                    'show_sticky'        => in_array( $header_behavior, array(
                        'sticky-header-on-scroll-up',
                        'sticky-header-on-scroll-down-up'
                    ) ) ? true : false,
                    'show_fixed_wrapper' => in_array( $header_behavior, array( 'fixed-on-scroll' ) ) ? true : false,
                );

                $parameters = apply_filters( 'attika_mikado_filter_header_type_parameters', $parameters, $header_type );

                HeaderFactory::getInstance()->getHeaderObject()->loadTemplate( $parameters );
            }
        }
	}
    add_action( 'attika_mikado_action_after_wrapper_inner', 'attika_mikado_get_header', 10 );
}

if ( ! function_exists( 'attika_mikado_get_logo' ) ) {
	/**
	 * Loads logo HTML
	 *
	 * @param $slug
	 */
	function attika_mikado_get_logo( $slug = '' ) {
		$id            = attika_mikado_get_page_id();
		$header_height = attika_mikado_set_default_menu_height_for_header_types();
		
		if ( $slug == 'sticky' ) {
			$logo_image = attika_mikado_get_meta_field_intersect( 'logo_image_sticky', $id );
		} else {
			$logo_image = attika_mikado_get_meta_field_intersect( 'logo_image', $id );
		}
		
		$logo_image_dark  = attika_mikado_get_meta_field_intersect( 'logo_image_dark', $id );
		$logo_image_light = attika_mikado_get_meta_field_intersect( 'logo_image_light', $id );
		
		//get logo image dimensions and set style attribute for image link.
		$logo_dimensions = attika_mikado_get_image_dimensions( $logo_image );
		
		$logo_styles = '';
		if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
			$logo_height = $logo_dimensions['height'];
			$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px;'; //divided with 2 because of retina screens
		} else if ( ! empty( $header_height ) && empty( $logo_dimensions ) ) {
			$logo_styles = 'height: ' . intval( $header_height / 2 ) . 'px;'; //divided with 2 because of retina screens
		}
		
		$params = array(
			'logo_image'       => $logo_image,
			'logo_image_dark'  => $logo_image_dark,
			'logo_image_light' => $logo_image_light,
			'logo_styles'      => $logo_styles
		);
		
		$params = apply_filters( 'attika_mikado_filter_get_logo_html_parameters', $params );
		
		attika_mikado_get_module_template_part( 'parts/logo', 'header', $slug, $params );
	}
}

if ( ! function_exists( 'attika_mikado_get_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function attika_mikado_get_main_menu( $additional_class = 'mkdf-default-nav' ) {
		attika_mikado_get_module_template_part( 'parts/navigation', 'header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'attika_mikado_get_header_widget_area_one' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function attika_mikado_get_header_widget_area_one() {
		$page_id                 = attika_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_header_widget_area_one_meta', true );
		
		if ( get_post_meta( $page_id, 'mkdf_disable_header_widget_areas_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'mkdf-header-widget-area-one' ) && empty( $custom_menu_widget_area ) ) {
				dynamic_sidebar( 'mkdf-header-widget-area-one' );
			} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
				dynamic_sidebar( $custom_menu_widget_area );
			}
		}
	}
}

if ( ! function_exists( 'attika_mikado_get_header_widget_area_two' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function attika_mikado_get_header_widget_area_two() {
		$page_id                 = attika_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_header_widget_area_two_meta', true );

		if ( get_post_meta( $page_id, 'mkdf_disable_header_widget_areas_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'mkdf-header-widget-area-two' ) && empty( $custom_menu_widget_area ) ) {
				dynamic_sidebar( 'mkdf-header-widget-area-two' );
			} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
				dynamic_sidebar( $custom_menu_widget_area );
			}
		}
	}
}