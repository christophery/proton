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

<!-- {{!-- The global footer at the very bottom of the screen --}} -->
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
        		<a href="<?php echo esc_url( __( 'https://chrisyee.ca/', 'proton' ) ); ?>" target="_blank" rel="noopener"><?php esc_attr_e( 'Proton by Chris Yee', 'proton' ); ?></a>
            </div>
        </div>
    </footer>

</div>
<!-- {{!-- /.viewport --}} -->

<?php wp_footer(); ?>

</body>
</html>