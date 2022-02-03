<div class="mkdf-fullscreen-menu-holder-outer">
	<div class="mkdf-fullscreen-menu-holder">
		<div class="mkdf-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="mkdf-container-inner">
			<?php endif; ?>

			<div class="mkdf-fullscreen-above-menu-widget-holder">
				<?php attika_mikado_get_header_widget_area_two(); ?>
			</div>
			
			<?php 
			//Navigation
			attika_mikado_get_module_template_part('templates/full-screen-menu-navigation', 'header/types/header-minimal');;

			?>
			
			<?php if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>