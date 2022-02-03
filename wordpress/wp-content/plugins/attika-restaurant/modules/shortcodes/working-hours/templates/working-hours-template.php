<div <?php attika_mikado_class_attribute($holder_classes); ?> <?php attika_mikado_inline_style($holder_styles); ?>>
	<div class="mkdf-wh-holder-inner">
		<?php if($enable_frame === 'yes') : ?>
			<div class="mkdf-wh-frame"></div>
			<div class="mkdf-wh-frame-2"></div>
		<?php endif; ?>

		<?php if(is_array($working_hours) && count($working_hours)) : ?>
				<?php if($title !== '') : ?>
					<div class="mkdf-wh-title-holder">
						<h2 class="mkdf-wh-title"><?php echo esc_html($title); ?>
							<?php if($title_accent_word !== '') : ?>
								<span class="mkdf-wh-title-accent-word"><?php echo esc_html($title_accent_word); ?></span>
							<?php endif; ?>
						</h2>
					</div>
				<?php endif; ?>

			<?php foreach($working_hours as $working_hour) : ?>
				<div class="mkdf-wh-item clearfix">
					<span class="mkdf-wh-day">
						<span class="mkdf-wh-icon">
							<span class="icon_clock_alt"></span>
						</span>
						<?php echo esc_html($working_hour['label']); ?>
					</span>
					<span class="mkdf-wh-dots"><span class="mkdf-wh-dots-inner"></span></span>
					<span class="mkdf-wh-hours">
						<?php if(isset($working_hour['from']) && $working_hour['from'] !== '') : ?>
							<span class="mkdf-wh-from"><?php echo esc_html($working_hour['from']); ?></span>
						<?php endif; ?>

						<?php if(isset($working_hour['to']) && $working_hour['to'] !== '') : ?>
							<span class="mkdf-wh-delimiter">-</span>
							<span class="mkdf-wh-to"><?php echo esc_html($working_hour['to']); ?></span>
						<?php endif; ?>
					</span>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
		<p><?php esc_html_e('Working hours are not set', 'attika-restaurant'); ?></p>
		<?php endif; ?>
	</div>
</div>