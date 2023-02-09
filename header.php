<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Genesis Block Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" href=https://use.typekit.net/cfr6non.css>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="masthead" class="header">
    <div class="js-navbar navbar">
        <div class="navbar__logo">
            <img class="js-navbar__logo--white" src="<?php echo get_stylesheet_directory_uri() ?>/assets/aspectus-logo-white-complete.svg" alt="Aspectus Logo" />
            <img class="js-navbar__logo--black" src="<?php echo get_stylesheet_directory_uri() ?>/assets/aspectus-logo-black-complete.svg" alt="Aspectus Logo" />
        </div>
        <div class="navbar__right">
            <div class="navbar__burger">
                <a href="javascript:void(0)" onclick="openNav()" class="navbar__link">
                    <img class="js-navbar__burger-icon navbar__burger-icon" src="<?php echo get_stylesheet_directory_uri() ?>/assets/burger.svg" alt="Burger Menu Icon" />
                </a>
                <a href="javascript:void(0)" onclick="closeNav()" class="navbar__link">
                    <img class="js-navbar__close-icon navbar__close-icon" src="<?php echo get_stylesheet_directory_uri() ?>/assets/close.svg" alt="Close Menu Icon" />
                </a>
            </div>
            <div class="navbar__break"></div>
            <div class="navbar__cta">
                <a href="/contact">
                    <button class="navbar__contact button button--clean button--light">Contact</button>
                </a>
            </div>
        </div><!-- navbarright -->
    </div><!-- navbar -->
    <!-- Main navigation -->
    <nav class="js-main-nav main-nav" aria-label="<?php esc_attr_e( 'Main', 'genesis-block-theme' ); ?>">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'primary',
                'fallback_cb'     => 'genesis_block_theme_fallback_menu',
                'menu_class'      => 'main-nav__list',
                'container_class' => 'main-nav__container',
            )
        );
        ?>
        <div class="header__second-column">
            <?php if ( has_nav_menu( 'footer' ) ) { ?>
            <nav class="secondary-nav" aria-label="<?php esc_attr_e( 'Important Links Menu', 'genesis-block-theme' ); ?>">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                            'menu_class'      => 'secondary-nav__list',
                            'container_class' => 'secondary-nav__container',
                        )
                    );
                    ?>
            </nav><!-- .footer-navigation -->
            <?php } ?>
            <div class="secondary-nav__spacer"></div>
            <div class="social-links">
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/linkedin-black.svg"
                            alt="LinkedIn Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/facebook-black.svg"
                            alt="Facebook Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/instagram-black.svg"
                            alt="LinkedIn Logo" />
                    </a>
                </div>
                <div class="social-links__logo">
                    <a href="#">
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/assets/twitter-black.svg"
                            alt="Instagram Logo" />
                    </a>
                </div>
            </div>
            <div class="social-links__tag-line">
                A Formula for Success.
            </div>
        </div>
    </nav><!-- .main-navigation -->
    <div class="header__column-line"></div>
    <div class="header__column-line header__column-line--second"></div>
    <!-- Get the archive page titles -->
    <?php if ( is_archive() || is_search() || is_404() ) { ?>
        <div class="container text-container">
            <div class="header-text">
                <?php genesis_block_theme_page_titles(); ?>
            </div><!-- .header-text -->
        </div><!-- .text-container -->
    <?php } ?>
</header><!-- .site-header -->

<div id="page" class="hfeed site container">
    <div id="content" class="site-content">
