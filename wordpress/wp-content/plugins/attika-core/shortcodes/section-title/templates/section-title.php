<div class="mkdf-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo attika_mikado_get_inline_style($holder_styles); ?>>
	<div class="mkdf-st-inner">
		<?php if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="mkdf-st-title" <?php echo attika_mikado_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
    <span class="mkdf-st-line" <?php echo attika_mikado_get_inline_style($line_styles); ?>></span>
    <div class="mkdf-st-text" <?php echo attika_mikado_get_inline_style($text_styles); ?>>
        <?php echo do_shortcode($content); ?>
    </div>
	</div>
</div>