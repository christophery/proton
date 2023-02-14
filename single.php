<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package proton
 */

get_header();

while ( have_posts() ) :
    the_post();

    $proton_categories = get_the_category();

    //get name of first category
    $proton_category_name = $proton_categories[0]->name;

    //get category url
    $proton_category_url = get_category_link( $proton_categories[0]->term_id );

    $proton_author_avatar = get_avatar( get_the_author_meta( 'ID' ), 60, '', '', array( 'class' => 'author-profile-image' ) );

    $proton_author_bio = get_the_author_meta('description');

    $proton_author_display_name = get_the_author_meta('display_name');

    $proton_author_url = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
?>

<main id="site-main" class="site-main">
<article <?php post_class(array('article')); ?>>

    <header class="article-header gh-canvas">

        <div class="article-tag post-card-tags">
            <?php if( $proton_categories ){ ?>
                <span class="post-card-primary-tag">
                    <a href="<?php echo esc_url( $proton_category_url ); ?>"><?php echo esc_html( $proton_category_name ); ?></a>
                </span>
            <?php } ?>
        </div>

        <?php the_title( '<h1 class="article-title">', '</h1>' ); ?>

        <?php if( has_excerpt() ){ ?>
        <p class="article-excerpt"><?php the_excerpt(); ?></p>
    	<?php } ?>

        <div class="article-byline">
        <section class="article-byline-content">

            <ul class="author-list">
                <li class="author-list-item">
                    <a href="<?php echo esc_url( $proton_author_url ); ?>" class="author-avatar">
                    	<?php echo $proton_author_avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </a>                    
                </li>
            </ul>

            <div class="article-byline-meta">
                <h4 class="author-name"><a href="<?php echo esc_url( $proton_author_url ); ?>"><?php echo esc_html( $proton_author_display_name ); ?></a></h4>
                <div class="byline-meta-content">
                    <time class="byline-meta-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
                    <?php if( proton_estimated_reading_time() ){ ?>
                        <span class="byline-reading-time"><span class="bull">&bull;</span> <?php echo esc_html( proton_estimated_reading_time() ); ?></span>
                    <?php } ?>
                </div>
            </div>

        </section>
        </div>

        <?php if ( has_post_thumbnail() ) { ?>
            <figure class="article-image">
                <!-- {{!-- This is a responsive image, it loads different sizes depending on device
                https://medium.freecodecamp.org/a-guide-to-responsive-images-with-ready-to-use-templates-c400bd65c433 --}} -->
                <?php the_post_thumbnail('full'); ?>
                <!-- {{#if feature_image_caption}}
                    <figcaption>{{feature_image_caption}}</figcaption>
                {{/if}} -->
            </figure>
        <?php } ?>

    </header>

    <section class="gh-content gh-canvas">
    	<?php the_content(); ?>
    </section>

    <?php if ( comments_open() || get_comments_number() ) : ?>
        <section class="article-comments gh-canvas">
            <?php echo comments_template(); ?>
        </section>
    <?php endif; ?>

</article>
</main>

<!-- Related Posts -->
<?php get_template_part('template-parts/related-posts'); ?>

<?php
endwhile; // End of the loop.
?>

<?php
get_footer();
