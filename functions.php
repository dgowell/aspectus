<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'genesis-block-theme-style';
    $theme        = wp_get_theme();
    wp_enqueue_style( $parenthandle,
        get_template_directory_uri() . '/style.css',
        array(),  // If the parent theme code has a dependency, copy it to here.
        $theme->parent()->get( 'Version' )
    );
    wp_enqueue_style( 'child-style',
        get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get( 'Version' ) // This only works if you have Version defined in the style header.
    );
}
function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_attr__( 'green', 'mea-genesis' ),
            'slug'  => 'green',
            'color' => '#7FB736',
        ),
        array(
            'name'  => esc_attr__( 'dark green', 'mea-genesis' ),
            'slug'  => 'dark-green',
            'color' => '#0E1900',
        ),
        array(
            'name'  => esc_attr__( 'light green', 'mea-genesis' ),
            'slug'  => 'light-green',
            'color' => '#B6E25A',
        ),
        array(
            'name'  => esc_attr__( 'white', 'mea-genesis' ),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );