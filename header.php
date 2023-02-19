<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proton
 */

$proton_custom_logo_id = get_theme_mod( 'custom_logo' );
$proton_image = wp_get_attachment_image( $proton_custom_logo_id , 'full', false, array( 'class' => 'site-logo' ) );

$proton_blog_name = get_bloginfo( 'name' );
$proton_blog_description = get_bloginfo( 'description' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-infinite-scroll">
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php wp_head(); ?>

</head>
<body <?php body_class( 'is-head-left-logo has-cover' ); ?>>
<div class="viewport">

    <header id="gh-head" class="gh-head outer">
        <div class="gh-head-inner inner">
            <div class="gh-head-brand">
                <a class="gh-head-logo" href="<?php echo esc_url( home_url() ); ?>">
                    <?php if( has_custom_logo() ){ ?>
                        <?php echo $proton_image; ?>
                    <?php }else{ ?>
                        <?php echo esc_html( $proton_blog_name ); ?>
                    <?php } ?>
                </a>
                <button class="search-button gh-icon-btn" data-ghost-search><?php get_template_part('template-parts/icons/search'); ?></button>
                <button class="gh-burger"></button>
            </div>

            <nav class="gh-head-menu">
                <?php
    			wp_nav_menu(
    				array(
    					'theme_location' => 'primary',
    					'menu_class'     => 'nav',
    					'depth'          => 1
    				)
    			);
    			?>
            </nav>

            <div class="gh-head-actions">
                <div class="gh-social">
                    <?php if ( get_theme_mod( 'proton_social_facebook') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_facebook') ); ?>" title="<?php esc_html_e( 'Facebook', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/facebook'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_twitter') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_twitter') ); ?>" title="<?php esc_html_e( 'Twitter', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/twitter'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_instagram') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_instagram') ); ?>" title="<?php esc_html_e( 'Instagram', 'proton' ); ?>" target="_blank" rel="menoopener"><?php get_template_part('template-parts/icons/instagram'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_youtube') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_youtube') ); ?>" title="<?php esc_html_e( 'YouTube', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/youtube'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_github') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_github') ); ?>" title="<?php esc_html_e( 'GitHub', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/github'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_mastodon') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_mastodon') ); ?>" title="<?php esc_html_e( 'Mastodon', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/mastodon'); ?></a>
                    <?php } ?>
                    <?php if ( get_theme_mod( 'proton_social_linkedin') ){ ?>
                        <a class="gh-social-link" href="<?php echo esc_url( get_theme_mod( 'proton_social_linkedin') ); ?>" title="<?php esc_html_e( 'LinkedIn', 'proton' ); ?>" target="_blank" rel="me noopener"><?php get_template_part('template-parts/icons/linkedin'); ?></a>
                    <?php } ?>
                </div>
                <button class="search-button gh-icon-btn"><?php get_template_part('template-parts/icons/search'); ?></button>
            </div>
        </div>
    </header>