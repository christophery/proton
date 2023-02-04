<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package proton
 */

$proton_author_avatar = get_avatar( get_the_author_meta( 'ID' ), 30 );

$proton_author_url = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );

//get categories
$proton_categories = get_the_category();

//get name of first category
if( $proton_categories ){
    $proton_category_name = $proton_categories[0]->name;
}

$classes = array(
	'post-card',
);

if( $wp_query->current_post == 0 && !is_paged() ) {
    array_push($classes, 'post-card-large'); 
}

if( $wp_query->current_post == 1 && !is_paged() || $wp_query->current_post == 2 && !is_paged() ) {
    array_push($classes, 'dynamic'); 
}

?>


<!-- {{!-- This is a partial file used to generate a post "card"
which templates loop over to generate a list of posts. --}} -->

<article <?php post_class($classes); ?>>

    <?php if ( has_post_thumbnail() ) { ?>
    <a class="post-card-image-link" href="<?php esc_url( the_permalink() ); ?>">
        <?php the_post_thumbnail('medium_large', array('class' => 'post-card-image')); ?>
    </a>
    <?php } ?>

    <div class="post-card-content">

        <a class="post-card-content-link" href="{{url}}">
            <header class="post-card-header">
                <div class="post-card-tags">
                    <?php if( $proton_categories ){ ?>
                        <span class="post-card-primary-tag"><?php echo esc_html( $proton_category_name ); ?></span>
                    <?php } ?>
                </div>
                <h2 class="post-card-title">
                    <?php the_title( '<h2 class="post-card-title">', '</h2>' ); ?>
                </h2>
            </header>
            <div class="post-card-excerpt"><?php esc_html( the_excerpt() ); ?></div>
        </a>

        <footer class="post-card-meta">
            <time class="post-card-meta-date" datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
            <?php if( proton_estimated_reading_time() ){ ?>
                <span class="post-card-meta-length"><?php echo esc_html( proton_estimated_reading_time() ); ?></span>
            <?php } ?>
        </footer>

    </div>

</article>