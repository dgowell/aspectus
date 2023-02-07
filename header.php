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

<header id="masthead" class="site-header">
    <div class="navbar">
        <div class="navbar__logo">
            <!-- Site title and logo -->
            <?php genesis_block_theme_title_logo(); ?>
        </div>
        <div class="navbar__burger">
            <a href="javascript:void(0)" onclick="openNav()" class="navbar__link">&#9776;</a>
        </div>
        <div class="navbar__cta">
            <a href="/contact">
                <button class="navbar__contact button">Contact</button>
            </a>
        </div>
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
