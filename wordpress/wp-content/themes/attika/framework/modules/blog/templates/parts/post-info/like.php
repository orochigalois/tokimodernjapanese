<?php if(attika_mikado_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('attika_mikado_get_like') ) attika_mikado_get_like(); ?>
    </div>
<?php } ?>