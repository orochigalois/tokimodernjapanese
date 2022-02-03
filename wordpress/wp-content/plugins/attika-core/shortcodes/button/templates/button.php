<button type="submit" <?php attika_mikado_inline_style($button_styles); ?> <?php attika_mikado_class_attribute($button_classes); ?> <?php echo attika_mikado_get_inline_attrs($button_data); ?> <?php echo attika_mikado_get_inline_attrs($button_custom_attrs); ?>>
    <?php if($type === 'simple'){?>
        <span class="mkdf-btn-line"></span>
    <?php } ?>
    <span class="mkdf-btn-text"><?php echo esc_html($text); ?></span>
    <?php echo attika_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
</button>