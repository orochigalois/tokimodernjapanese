<?php $number = 1; ?>
<div class="mkdf-anchor-menu-outer">
	<div class="mkdf-anchor-menu">
        <?php foreach($menu_items as $menu_item):?>
            <div class="mkdf-anchor-menu-item">
                <a class="mkdf-anchor" href="<?php echo esc_attr($menu_item['anchor']); ?>">
                    <span class="mkdf-anchor-menu-item-label">
                        <?php echo esc_attr($menu_item['label']); ?>
                    </span>
                    <span class="mkdf-anchor-menu-item-responsive-label">
                        <?php echo esc_attr($number++); ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
	</div>
</div>