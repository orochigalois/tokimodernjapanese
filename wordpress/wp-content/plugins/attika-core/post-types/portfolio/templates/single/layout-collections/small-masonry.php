<?php
$masonry_classes   = '';
$number_of_columns = attika_mikado_get_meta_field_intersect( 'portfolio_single_masonry_columns_number' );
if ( ! empty( $number_of_columns ) ) {
	$masonry_classes .= ' mkdf-' . $number_of_columns . '-columns';
}
$space_between_items = attika_mikado_get_meta_field_intersect( 'portfolio_single_masonry_space_between_items' );
if ( ! empty( $space_between_items ) ) {
	$masonry_classes .= ' mkdf-' . $space_between_items . '-space';
}
?>
<div class="mkdf-grid-row">
	<div class="mkdf-grid-col-7">
		<div class="mkdf-ps-image-holder mkdf-grid-list mkdf-grid-masonry-list mkdf-fixed-masonry-items <?php echo esc_attr($masonry_classes); ?>">
			<div class="mkdf-ps-image-inner mkdf-outer-space mkdf-masonry-list-wrapper">
				<div class="mkdf-masonry-grid-sizer"></div>
				<div class="mkdf-masonry-grid-gutter"></div>
				<?php
				$media = attika_core_get_portfolio_single_media(true);
				
				if(is_array($media) && count($media)) : ?>
					<?php foreach($media as $single_media) : ?>
						<div class="mkdf-ps-image mkdf-item-space <?php echo esc_attr($single_media['holder_classes']); ?>">
							<?php attika_core_get_portfolio_single_media_html($single_media); ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="mkdf-grid-col-5">
		<div class="mkdf-ps-info-holder mkdf-ps-info-sticky-holder">
			<?php
			//get portfolio content section
			attika_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout);
			?>

            <div class="mkdf-ps-info-inner">
				<?php
				//get portfolio custom fields section
				attika_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

				//get portfolio categories section
				attika_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);

				//get portfolio date section
				attika_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);

				//get portfolio tags section
				attika_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);

				//get portfolio share section
				attika_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
				?>
            </div>
		</div>
	</div>
</div>