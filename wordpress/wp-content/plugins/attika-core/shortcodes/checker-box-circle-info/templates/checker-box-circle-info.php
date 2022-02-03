<div <?php attika_mikado_class_attribute($holder_classes); ?>>
	<div class="mkdf-cbci-content-left" <?php attika_mikado_inline_style($content_styles_left); ?>>
        <?php if ($left_content !== '') {?>
            <p class="mkdf-cbci-text-left"><?php echo esc_html($left_content); ?></p>
        <?php }?>
    </div>
    <div class="mkdf-cbci-content-circle">
        <div class="mkdf-cbci-content-circle-inner"></div>
        <div class="mkdf-cbci-content-circle-content">
            <?php echo attika_mikado_icon_collections()->renderIcon($icon, $icon_pack, $icon_params); ?>
            <?php if(!empty($title_top)) { ?>
                <h5 class="mkdf-cbci-title">
                    <?php echo esc_html($title_top); ?>
                </h5>
            <?php } ?>
            <?php if(!empty($text_top)) { ?>
                <p class="mkdf-cbci-text" ><?php echo wp_kses_post($text_top); ?></p>
            <?php } ?>
            <?php if(!empty($title_bottom)) { ?>
                <h5 class="mkdf-cbci-title">
                    <?php echo esc_html($title_bottom); ?>
                </h5>
            <?php } ?>
            <?php if(!empty($text_bottom)) { ?>
                <p class="mkdf-cbci-text" ><?php echo wp_kses_post($text_bottom); ?></p>
            <?php } ?>
	        <?php if(!empty($button_text)) { ?>
            <a itemprop="url" class="mkdf-btn mkdf-btn-medium mkdf-btn-simple" href="<?php echo esc_url($button_link); ?>" target="<?php echo esc_attr($button_target); ?>">
                <span class="mkdf-btn-line"></span>
                <span class="mkdf-btn-text"><?php echo esc_html($button_text); ?></span>
            </a>
	        <?php } ?>
        </div>
    </div>
    <div class="mkdf-cbci-content-right" <?php attika_mikado_inline_style($content_styles_right); ?>>
        <?php if ($right_content !== '') {?>
            <p class="mkdf-cbci-text-right"><?php echo esc_html($right_content); ?></p>
        <?php }?>
    </div>
</div>