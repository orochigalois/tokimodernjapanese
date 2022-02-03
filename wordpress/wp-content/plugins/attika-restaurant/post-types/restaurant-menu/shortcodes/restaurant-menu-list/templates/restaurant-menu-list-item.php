<?php 
	$price = get_post_meta(get_the_ID(), 'restaurant_menu_item_price', true);
	$label = get_post_meta(get_the_ID(), 'restaurant_menu_item_label', true);
	$description = get_post_meta(get_the_ID(), 'restaurant_menu_item_description', true);
?>
<li class="mkdf-rml-item clearfix">
	<?php if($show_featured_image === 'yes') : ?>
			<div class="mkdf-rml-item-image">
				<a href="<?php echo esc_url(wp_get_attachment_url(get_post_thumbnail_id())); ?>" data-rel="prettyPhoto<?php echo esc_attr(get_the_ID()); ?>">
					<?php the_post_thumbnail('thumbnail'); ?>
				</a>
			</div>
	<?php endif; ?>
	<div class="mkdf-rml-item-content">
		<div class="mkdf-rml-top-holder">
			<div class="mkdf-rml-title-holder">
				<span class="mkdf-rml-title">
					<?php esc_html(the_title()); ?>
				</span>
			</div>
			<?php if(!empty($price)) : ?>
				<div class="mkdf-rml-price-holder">
					<span class="mkdf-rml-price"><?php echo esc_html($price); ?></span>
				</div>

			<?php endif; ?>
		</div>
		<div class="mkdf-rml-bottom-holder clearfix">
			<?php if(!empty($description)) : ?>
			<div class="mkdf-rml-description-holder">
				<?php echo esc_html($description); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>

</li>