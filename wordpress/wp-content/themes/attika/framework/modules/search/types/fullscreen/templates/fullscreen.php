<div class="mkdf-fullscreen-search-holder">
	<a <?php attika_mikado_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo attika_mikado_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
	</a>
	<div class="mkdf-fullscreen-search-table">
		<div class="mkdf-fullscreen-search-cell">
			<div class="mkdf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-fullscreen-search-form" method="get">
					<div class="mkdf-form-holder">
						<div class="mkdf-form-holder-inner">
							<div class="mkdf-field-holder clearfix">
                                <label class="mkdf-search-label"><?php esc_attr_e( 'SEARCH', 'attika' ); ?></label>
								<input type="text" name="s" class="mkdf-search-field" autocomplete="off"/>
                                <button type="submit" <?php attika_mikado_class_attribute( $search_submit_icon_class ); ?>>
                                    <?php echo attika_mikado_icon_collections()->renderIcon( 'icon-magnifier icons', 'simple_line_icons' ); ?>
                                </button>
                            </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>