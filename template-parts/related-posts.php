<?php

//get related posts based on post category
$proton_related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 3,
        'post__not_in'   => array( $post->ID ),
        'ignore_sticky_posts' => true,
        'has_password'   => false, //exclude password protected posts
        'orderby'        => 'rand' //random order
    )
);

?>

<aside class="read-more-wrap outer">
    <div class="read-more inner">
        <?php if( $proton_related->have_posts() ) : ?>

            <?php
            /* Start the Loop */
            while ( $proton_related->have_posts() ) :
                $proton_related->the_post();

                /*
                 * Include the Post-Type-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

        endif;
        ?>
    </div>
</aside>