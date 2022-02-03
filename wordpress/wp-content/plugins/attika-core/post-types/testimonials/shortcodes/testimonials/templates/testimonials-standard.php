<div class="mkdf-testimonials-holder clearfix <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-testimonials-icon">
        <svg version="1.1" x="0px" y="0px"
            width="50.75px" height="37.828px" viewBox="0 0 50.75 37.828" enable-background="new 0 0 50.75 37.828" xml:space="preserve">
            <path fill="#898989" d="M39.486,14.41c-0.105-1.113-0.023-4.144,2.879-8.359c0.219-0.315,0.18-0.745-0.094-1.018
            c-1.184-1.185-1.918-1.931-2.43-2.455c-0.676-0.687-0.984-1-1.438-1.41c-0.301-0.272-0.758-0.276-1.063-0.01
            c-5.059,4.401-10.68,13.502-9.867,24.646c0.477,6.547,5.25,11.297,11.352,11.297c6.262,0,11.355-5.094,11.355-11.355
            C50.181,19.707,45.439,14.754,39.486,14.41L39.486,14.41z M38.826,35.5c-5.238,0-9.34-4.125-9.754-9.807v-0.006
            c-0.918-12.533,6.535-20.68,8.789-22.835c0.219,0.22,0.469,0.474,0.84,0.849c0.445,0.453,1.055,1.073,1.977,2
            c-3.527,5.428-2.859,9.295-2.57,9.85c0.141,0.267,0.422,0.443,0.719,0.443c5.379,0,9.754,4.375,9.754,9.752
            C48.58,31.125,44.205,35.5,38.826,35.5L38.826,35.5z M38.826,35.5"/>
            <path fill="#898989" d="M12.68,14.41c-0.105-1.113-0.023-4.144,2.879-8.359c0.219-0.315,0.18-0.745-0.094-1.018
            c-1.184-1.185-1.918-1.931-2.43-2.455c-0.676-0.687-0.984-1-1.438-1.41c-0.301-0.272-0.758-0.276-1.063-0.01
            C5.477,5.56-0.145,14.66,0.668,25.805c0.477,6.547,5.25,11.297,11.352,11.297c6.262,0,11.355-5.094,11.355-11.355
            C23.375,19.707,18.633,14.754,12.68,14.41L12.68,14.41z M12.02,35.5c-5.238,0-9.34-4.125-9.754-9.807v-0.006
            C1.348,13.154,8.801,5.008,11.055,2.853c0.219,0.22,0.469,0.474,0.84,0.849c0.445,0.453,1.055,1.073,1.977,2
            c-3.527,5.428-2.859,9.295-2.57,9.85c0.141,0.267,0.422,0.443,0.719,0.443c5.379,0,9.754,4.375,9.754,9.752
            C21.773,31.125,17.398,35.5,12.02,35.5L12.02,35.5z M12.02,35.5"/>
        </svg>
    </div>
    <div class="mkdf-testimonials mkdf-owl-slider" <?php echo attika_mikado_get_inline_attrs( $data_attr ) ?>>

    <?php if ( $query_results->have_posts() ):
        while ( $query_results->have_posts() ) : $query_results->the_post();
            $text     = get_post_meta( get_the_ID(), 'mkdf_testimonial_text', true );
            $author   = get_post_meta( get_the_ID(), 'mkdf_testimonial_author', true );
            $position = get_post_meta( get_the_ID(), 'mkdf_testimonial_author_position', true );

            $current_id = get_the_ID();
    ?>

            <div class="mkdf-testimonial-content" id="mkdf-testimonials-<?php echo esc_attr( $current_id ) ?>">
                <div class="mkdf-testimonial-text-holder">
                    <?php if ( ! empty( $text ) ) { ?>
                        <p class="mkdf-testimonial-text"><?php echo esc_html( $text ); ?></p>
                    <?php } ?>
                    <?php if ( ! empty( $author ) ) { ?>
                        <h4 class="mkdf-testimonial-author">
                            <span class="mkdf-testimonials-author-name"><?php echo esc_html( $author ); ?></span>
                            <?php if ( ! empty( $position ) ) { ?>
                                <span class="mkdf-testimonials-author-job"><?php echo esc_html( $position ); ?></span>
                            <?php } ?>
                        </h4>
                    <?php } ?>
                </div>
                <?php if ( has_post_thumbnail() ) { ?>
                    <div class="mkdf-testimonial-image">
                        <?php echo get_the_post_thumbnail( get_the_ID(), array( 66, 66 ) ); ?>
                    </div>
                <?php } ?>
            </div>

    <?php
        endwhile;
    else:
        echo esc_html__( 'Sorry, no posts matched your criteria.', 'attika-core' );
    endif;

    wp_reset_postdata();
    ?>

    </div>
</div>