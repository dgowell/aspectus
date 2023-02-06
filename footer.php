<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Genesis Block Theme
 */

?>

</div><!-- #content -->
</div><!-- #page .container -->

<footer id="colophon" class="footer">
    <div class="footer__column">
        <div class="footer__img">
            <img class="footer__logo" src="" />
        </div>
        <div class="footer__social-links">
            <div class="footer__logo">
                <a href="https://twitter.com/meaplatform">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/twitter-icon.svg"
                        alt="Twitter Logo" />
                </a>
            </div>
            <div class="footer__social-logo">
                <a href="#">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/facebook-logo.svg"
                        alt="Facebook Logo" />
                </a>
            </div>
            <div class="footer__social-logo">
                <a href="https://www.linkedin.com/company/meaplatform">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/linkedin-logo.svg"
                        alt="LinkedIn Logo" />
                </a>
            </div>
            <div class="footer__social-logo">
                <a href="https://www.linkedin.com/company/meaplatform">
                    <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/linkedin-logo.svg"
                        alt="LinkedIn Logo" />
                </a>
            </div>
        </div>
        <?php if (is_active_sidebar( 'footer-1' )) : ?>
        <h2 class="screen-reader-text"><?php esc_html_e( 'Footer', 'genesis-block-theme' ); ?></h2>
        <?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
        <div class="footer__column">
            <?php dynamic_sidebar( 'footer-1' ); ?>
        </div>
        <?php } ?>


        <?php endif; ?>

        <div class="footer-bottom">
            <div class="footer-tagline">
                <div class="site-info">
                    <?php echo genesis_block_theme_filter_footer_text(); ?>
                </div>
            </div><!-- .footer-tagline -->
            <?php if ( has_nav_menu( 'footer' ) ) { ?>
            <nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'genesis-block-theme' ); ?>">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
            </nav><!-- .footer-navigation -->
            <?php } ?>
        </div><!-- .footer-bottom -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>