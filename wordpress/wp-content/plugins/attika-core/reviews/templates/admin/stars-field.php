<p>
	<label for="rating">
		<?php echo esc_html( $label ); ?>
	</label>
	<span class="commentratingbox">
        <?php for ( $i = 1; $i <= ATTIKA_CORE_REVIEWS_MAX_RATING; $i ++ ) { ?>
	        <span class="commentrating">
                <input type="radio" name="<?php echo esc_attr( $key ); ?>" class="rating" value="<?php echo esc_attr( $i ); ?>" <?php print $rating == $i ? 'checked="checked"' : ''; ?> />
            </span>
        <?php } ?>
    </span>
</p>