<section class="mkdf-side-menu">
	<a <?php attika_mikado_class_attribute( $close_icon_classes ); ?> href="#">
		<?php echo attika_mikado_get_icon_sources_html( 'side_area', true ); ?>
	</a>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>