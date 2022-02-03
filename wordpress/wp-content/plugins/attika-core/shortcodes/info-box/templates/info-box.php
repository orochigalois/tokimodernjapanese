<div <?php attika_mikado_class_attribute($holder_classes); ?>>
	<div class="mkdf-ib-content" <?php attika_mikado_inline_style($content_styles); ?>>
		<?php if(!empty($title)) { ?>
		<<?php echo esc_attr($title_tag); ?> class="mkdf-ib-title">
		<?php echo esc_html($title); ?>
	    </<?php echo esc_attr($title_tag); ?>>
	<?php } ?>
	<?php if(!empty($email)) { ?>
        <?php if(!empty($link)) : ?>
            <a itemprop="url" href="<?php echo esc_url($link); ?>">
        <?php endif; ?>
		<span class="mkdf-ib-email" ><?php echo esc_html($email); ?></span>
        <?php if(!empty($link)) : ?>
            </a>
        <?php endif; ?>
	<?php } ?>
    </div>
</div>