<div class="mkdf-menu-popup-holder <?php echo esc_attr( $holder_class ) ?>">
    <div class="mkdf-popup-table">
        <div class="mkdf-popup-table-cell">
            <div class="mkdf-popup-inner">
                <h2 class="mkdf-menu-popup-title"><?php esc_html_e('Menu', 'attika-restaurant'); ?></h2>
                <?php echo attika_mikado_execute_shortcode('attika_restaurant_menu_list',
                    array(
                        'restaurant_menu_category' => $column_one_category,
                    )
                ) ?>
                <?php if($column_two_category !== '') {
                    echo attika_mikado_execute_shortcode('attika_restaurant_menu_list',
                        array(
                            'restaurant_menu_category' => $column_two_category,
                        )
                    );
                } ?>
                <?php if($column_three_category !== '') {
                    echo attika_mikado_execute_shortcode('attika_restaurant_menu_list',
                        array(
                            'restaurant_menu_category' => $column_three_category,
                        )
                    );
                } ?>
                <a class="mkdf-menu-popup-close" href="javascript:void(0)"><span class="lnr lnr-cross"></span></a>
            </div>
        </div>
    </div>
</div>