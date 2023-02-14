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
            <a class="error-link" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Go to the front page →', 'proton' ); ?></a>
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
              	
              	//output post card markup
              	get_template_part( 'template-parts/content', get_post_type() );	
        	}
        }
        wp_reset_query();
        ?>   
    </div>
</aside>

<?php
get_footer();
