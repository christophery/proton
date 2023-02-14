<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package proton
 */

get_header();
?>


<main id="site-main" class="site-main outer">
<div class="inner posts">
    <div class="post-feed">

        <section class="post-card post-card-large">

            <div class="post-card-content">
	            <div class="post-card-content-link">

	                <header class="post-card-header">
	                    <h2 class="post-card-title">
		                    <?php
	    					/* translators: %s: search query. */
	    					printf( esc_html__( 'Search Results for: %s', 'proton' ), '<span>' . get_search_query() . '</span>' );
	    					?>
			        	</h2>
	                </header>

	            </div>
            </div>

        </section>

        <?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </div>

    <?php 
    	the_posts_navigation(
            array(
                'prev_text' => __('Older Posts <span>→</span>', 'proton'),
                'next_text' => __('<span>←</span> Newer Posts', 'proton'),
            )
        );
    ?>
    
</div>
</main>

<?php
get_footer();
