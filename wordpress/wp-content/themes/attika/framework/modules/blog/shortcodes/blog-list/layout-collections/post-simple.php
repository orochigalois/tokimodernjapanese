<li class="mkdf-bl-item mkdf-item-space clearfix">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			attika_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="mkdf-bli-content">
			<?php attika_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
			<?php attika_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
		</div>
	</div>
</li>