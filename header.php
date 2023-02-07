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

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="masthead" class="header">
    <div class="navbar">
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
                'theme_location' => 'primary',
                'fallback_cb'    => 'genesis_block_theme_fallback_menu',
            )
        );
        ?>
    </nav><!-- .main-navigation -->
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
