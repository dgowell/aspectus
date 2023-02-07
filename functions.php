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
    wp_enqueue_style( 'tapacode-sass-styles',
        get_stylesheet_directory_uri() . '/css/aspectus-styles.css'
    );

    //jquery
    wp_enqueue_script( 'tapacode-nav-menu', get_stylesheet_directory_uri() . '/js/nav-menu.js', array( 'jquery' ), '1.0.0', true );
}
function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_attr__( 'lime green', 'tapacode' ),
            'slug'  => 'lime-green',
            'color' => '#C7F03D',
        ),
        array(
            'name'  => esc_attr__( 'dark green', 'tapacode' ),
            'slug'  => 'dark-green',
            'color' => '#022C2E',
        ),
        array(
            'name'  => esc_attr__( 'jade', 'tapacode' ),
            'slug'  => 'jade',
            'color' => '#6ED4B7',
        ),
        array(
            'name'  => esc_attr__( 'violet', 'tapacode' ),
            'slug'  => 'violet',
            'color' => '#022C2E',
        ),
        array(
            'name'  => esc_attr__( 'crimson', 'tapacode' ),
            'slug'  => 'crimson',
            'color' => '#F14D54',
        ),
        array(
            'name'  => esc_attr__( 'peach', 'tapacode' ),
            'slug'  => 'peach',
            'color' => '#FFBF65',
        ),
        array(
            'name'  => esc_attr__( 'black', 'tapacode' ),
            'slug'  => 'black',
            'color' => '#1C1C1C',
        ),
        array(
            'name'  => esc_attr__( 'deep grey', 'tapacode' ),
            'slug'  => 'deep grey',
            'color' => '#6F7783',
        ),
        array(
            'name'  => esc_attr__( 'pale grey', 'tapacode' ),
            'slug'  => 'pale grey',
            'color' => '#E6EBEB',
        ),
        array(
            'name'  => esc_attr__( 'light jade', 'tapacode' ),
            'slug'  => 'light jade',
            'color' => '#F4FCD8',
        ),
        array(
            'name'  => esc_attr__( 'white', 'tapacode' ),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );


