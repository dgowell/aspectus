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
    <div class="footer__container">
        <div class="footer__column footer__column--social-links">
            <img class="footer__logo" alt="Aspectus Logo"
                src="<?php echo get_stylesheet_directory_uri() ?>/assets/aspectus-logo.svg" />
            <div class="social-links">
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/linkedin-logo.svg"
                            alt="LinkedIn Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/facebook-logo.svg"
                            alt="Facebook Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/linkedin-logo.svg"
                            alt="LinkedIn Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/twitter-icon.svg"
                            alt="Instagram Logo" />
                    </a>
                </div>
            </div>
            <div class="social-links__tag-line">
                A Formula for Success.
            </div>
        </div><!--footer column-->
        <div class="footer__column footer__column--menu">
            <h3 class="footer__title">Important Links</h3>
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
        </div><!--footer column-->
        <div class="footer__column footer__column--contact-us">
            <h3 class="footer__title">Contact Us</h3>
            <p class="footer__text">We are an independent global brand, marketing and communications agency with offices
                in London, New York, Aberdeen, Singapore and Luzern.</p>
            <div class="footer__button-container">
                <button class="footer__button button">Contact</button>
            </div>
        </div><!--footer column-->
    </div><!-- footer container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>

</html>