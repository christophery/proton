<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package proton
 */

get_header();

$geist_categories = get_the_category();

//get name of first category
$geist_category_name = $geist_categories[0]->name;

//get category url
$geist_category_url = get_category_link( $geist_categories[0]->term_id );

?>

<main id="site-main" class="site-main">
<article <?php post_class(array('article')); ?>>

    <header class="article-header gh-canvas">

        <div class="article-tag post-card-tags">
            <?php if( $geist_categories ){ ?>
                <span class="post-card-primary-tag">
                    <a href="<?php echo esc_url( $geist_category_url ); ?>"><?php echo esc_html( $geist_category_name ); ?></a>
                </span>
            <?php } ?>
        </div>

        <?php the_title( '<h1 class="article-title">', '</h1>' ); ?>

        <p class="article-excerpt"><?php the_excerpt(); ?></p>

        <div class="article-byline">
        <section class="article-byline-content">

            <!-- <ul class="author-list">
                {{#foreach authors}}
                <li class="author-list-item">
                    {{#if profile_image}}
                    <a href="{{url}}" class="author-avatar">
                        <img class="author-profile-image" src="{{img_url profile_image size="xs"}}" alt="{{name}}" />
                    </a>
                    {{else}}
                    <a href="{{url}}" class="author-avatar author-profile-image">{{> "icons/avatar"}}</a>
                    {{/if}}
                </li>
                {{/foreach}}
            </ul> -->

            <div class="article-byline-meta">
                <!-- <h4 class="author-name">{{authors}}</h4> -->
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

<?php
get_sidebar();
get_footer();
