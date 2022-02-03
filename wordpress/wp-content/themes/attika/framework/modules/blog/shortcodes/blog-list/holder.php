<div class="mkdf-blog-list-holder mkdf-grid-list mkdf-disable-bottom-space <?php echo esc_attr( $holder_classes ); ?>" <?php echo wp_kses( $holder_data, array( 'data' ) ); ?>>
	<div class="mkdf-bl-wrapper mkdf-outer-space">
		<ul class="mkdf-blog-list">
			<?php
			if ( $query_result->have_posts() ):
				while ( $query_result->have_posts() ) : $query_result->the_post();
					attika_mikado_get_module_template_part( 'shortcodes/blog-list/layout-collections/post', 'blog', $type, $params );
				endwhile;
			else:
				attika_mikado_get_module_template_part( 'templates/parts/no-posts', 'blog', '', $params );
			endif;
			
			wp_reset_postdata();
			?>
		</ul>
	</div>
	<?php attika_mikado_get_module_template_part( 'templates/parts/pagination/' . $params['pagination_type'], 'blog', '', $params ); ?>
</div>