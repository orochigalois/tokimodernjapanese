<?php
get_header();
attika_mikado_get_title();
do_action( 'attika_mikado_action_before_main_content' ); ?>
<div class="mkdf-container mkdf-default-page-template">
	<?php do_action( 'attika_mikado_action_after_container_open' ); ?>
	<div class="mkdf-container-inner clearfix">
		<?php
			$attika_taxonomy_id   = get_queried_object_id();
			$attika_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$attika_taxonomy      = ! empty( $attika_taxonomy_id ) ? get_term_by( 'id', $attika_taxonomy_id, $attika_taxonomy_type ) : '';
			$attika_taxonomy_slug = ! empty( $attika_taxonomy ) ? $attika_taxonomy->slug : '';
			$attika_taxonomy_name = ! empty( $attika_taxonomy ) ? $attika_taxonomy->taxonomy : '';
			
			attika_core_get_archive_portfolio_list( $attika_taxonomy_slug, $attika_taxonomy_name );
		?>
	</div>
	<?php do_action( 'attika_mikado_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
