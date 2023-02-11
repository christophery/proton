<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package proton
 */

get_header();
?>

<main class="outer error-content">
    <div class="inner">

        <section class="error-message">
            <h1 class="error-code"><?php esc_html_e( '404', 'proton' ); ?></h1>
            <p class="error-description"><?php esc_html_e( 'Page not found', 'proton' ); ?></p>
            <a class="error-link" href="<?php echo esc_url( home_url() ); ?>">Go to the front page →</a>
        </section>

    </div>
</main>

<aside class="read-more-wrap outer">
    <div class="read-more inner">
        
    	<?php
        $proton_latest_posts_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true,
            'has_password'   => false //exclude password protected posts
        );

        $proton_latest_posts = new WP_Query( $proton_latest_posts_args );

        if( $proton_latest_posts->have_posts() ) {
            while( $proton_latest_posts->have_posts() ) {
                $proton_latest_posts->the_post();
              	?>
				<article class="post-card post">
					<?php if ( has_post_thumbnail() ) { ?>
				    <a class="post-card-image-link" href="<?php the_permalink(); ?>">
				    	<?php the_post_thumbnail('medium_large',array('class' => 'post-card-image')); ?>
				    </a>
				    <?php } ?>

				    <div class="post-card-content">
				        <a class="post-card-content-link" href="<?php the_permalink(); ?>">
				            <header class="post-card-header">
				                <div class="post-card-tags">
				                </div>
				                <h2 class="post-card-title">
				                    <?php the_title(); ?>
				                </h2>
				            </header>
				                <div class="post-card-excerpt"><?php echo get_the_excerpt(); ?></div>
				        </a>
				        <footer class="post-card-meta">
				            <time class="post-card-meta-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
				            <?php if( proton_estimated_reading_time() ){ ?>
				                    <span class="post-card-meta-length"><?php echo esc_html( proton_estimated_reading_time() ); ?></span>
				                <?php } ?>
				        </footer>
				    </div>
				</article>
		<?php
            	}
            }
            wp_reset_query();
        ?>   
    </div>
</aside>

<?php
get_footer();
