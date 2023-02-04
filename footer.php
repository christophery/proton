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
                <!-- {{navigation type="secondary"}} -->
            </nav>
            <div>
        		<?php
        		/* translators: 1: Theme name, 2: Theme author. */
        		printf( esc_html__( '%1$s by %2$s.', 'proton' ), 'Proton', '<a href="https://chrisyee.ca/">Chris Yee</a>' );
        		?>
            </div>
        </div>
    </footer>

</div>
<!-- {{!-- /.viewport --}} -->

<?php wp_footer(); ?>

</body>
</html>