<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proton
 */

?>

    <footer class="site-footer outer">
        <div class="inner">
            <section class="copyright"><a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a> &copy; <?php echo esc_html( date("Y") ); ?></section>
            <nav class="site-footer-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                        'menu_class'     => 'nav',
                        'depth'          => 1
                    )
                );
                ?>
            </nav>
            <div>
        		<a href="<?php echo esc_url( __( 'https://chrisyee.ca/proton', 'proton' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Proton by Chris Yee', 'proton' ); ?></a>
            </div>
        </div>
    </footer>

</div>

<div id="search" class="search-overlay">
    <button class="search-overlay-close" aria-label="close search overlay"></button>
    <div class="search-overlay-content">
        <?php get_search_form(); ?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>