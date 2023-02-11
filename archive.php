<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proton
 */

get_header();

//get category
$geist_category = get_the_category();

//get number of posts in category
if( $geist_category ){
	$geist_category_num_posts = $geist_category[0]->category_count;
}

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
			        		if( is_category() ){
			            		echo single_term_title();
			        		}elseif( is_date() ){
			        			echo get_the_date( _x( 'F Y', 'monthly archives date format', 'geist' ) );
			        		}else{
			        			esc_html_e( 'Archive', 'geist' );
			        		}
			        	?>
		        	</h2>
                </header>
                <div class="post-card-excerpt">
                    <?php
	            	if ( have_posts() ) :

	            		//check if category description is set
	            		if( category_description() ){
	            			//output category description
	            			echo category_description();
	            		}else{
	            			//output number of posts in category
	            			if( $geist_category_num_posts > 1 ){
	            				/* translators: %d: number of posts, i.e. 5 posts  */
	            				$geist_category_text = printf( esc_html__( 'A collection of %d posts.', 'geist' ), esc_html( $geist_category_num_posts ) );
	            			}else{
	            				/* translators: %d: number of posts, i.e. 5 posts  */
	            				$geist_category_text = printf( esc_html__( 'A collection of %d post.', 'geist' ), esc_html ( $geist_category_num_posts ) );
	            			}
	            		}

	            	endif;
	            	?>
                </div>
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
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </div>

    <?php the_posts_navigation(); ?>
    
</div>
</main>


<?php
get_sidebar();
get_footer();
