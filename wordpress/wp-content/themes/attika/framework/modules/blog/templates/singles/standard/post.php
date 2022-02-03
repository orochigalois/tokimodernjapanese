<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php attika_mikado_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
            <?php attika_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-info-left">
	                <?php attika_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
	                <?php the_content(); ?>
	                <?php do_action('attika_mikado_action_single_link_pages'); ?>
                </div>
                <div class="mkdf-post-info-right">
	                <?php attika_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', 'single', $part_params); ?>
	                <?php attika_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', 'single', $part_params); ?>
	                <?php attika_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', 'single', $part_params); ?>
	                <?php
	                if(attika_mikado_options()->getOptionValue('show_tags_area_blog') === 'yes') {
		                attika_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params);
	                } ?>
                </div>
            </div>
        </div>
    </div>
</article>