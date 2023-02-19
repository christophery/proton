<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proton
 */

get_header();

$proton_custom_logo_id = get_theme_mod( 'custom_logo' );
$proton_image = wp_get_attachment_image( $proton_custom_logo_id , 'full', false, array( 'class' => 'site-logo' ) );

$proton_blog_name = get_bloginfo( 'name' );
$proton_blog_description = get_bloginfo( 'description' );
?>

	<div class="site-content">

		<div class="site-header-content outer">

		    <?php 
		    	if ( get_header_image() ){
		    		echo get_header_image_tag( array('class' => 'site-header-cover') );
		    	} 
		    ?>

	        <div class="site-header-inner inner">
                <?php if( has_custom_logo() ){ ?>
                	<a href="<?php echo esc_url( home_url() ); ?>">
                		<?php echo $proton_image; ?>
                	</a>
                <?php }else{ ?>
                	<h1 class="site-title">
                		<a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( $proton_blog_name ); ?></a>
                	</h1>
                <?php } ?>
	            <p class="site-description"><?php echo esc_html( $proton_blog_description ); ?></p>
	        </div>

		</div>

		<!-- {{!-- The main content area --}} -->
		<main id="site-main" class="site-main outer">
			<div class="inner posts">

			    <div class="post-feed">
			        <?php
	        		if ( have_posts() ) :

	        			if ( is_home() && ! is_front_page() ) :
	        				?>
	        				<header>
	        					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
	        				</header>
	        				<?php
	        			endif;

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

	</div>

<?php
get_footer();
