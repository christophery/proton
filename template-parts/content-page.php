<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proton
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>

    <?php if( !is_front_page() ){ ?>
        <header class="article-header gh-canvas">

            <?php the_title( '<h1 class="article-title">', '</h1>' ); ?>

            <?php if ( has_post_thumbnail() ) { ?>
                <figure class="article-image">
                    <?php the_post_thumbnail('full'); ?>
                    <?php if( get_the_post_thumbnail_caption() ){ ?>
                        <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
                    <?php } ?>
                </figure>
            <?php } ?>

        </header>
    <?php } ?>

    <section class="gh-content gh-canvas">
        <?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'proton' ),
				'after'  => '</div>',
			)
		);
		?>
    </section>

    <?php if ( comments_open() || get_comments_number() ) : ?>
        <section class="article-comments gh-canvas">
            <?php echo comments_template(); ?>
        </section>
    <?php endif; ?>

</article>