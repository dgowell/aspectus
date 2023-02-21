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

    //nav menu js
    wp_enqueue_script( 'tapacode-nav-menu', get_stylesheet_directory_uri() . '/js/nav-menu.js', array( 'jquery' ), '1.0.0', true );

    //custom slider js
    wp_enqueue_script( 'tapacode-sliders', get_stylesheet_directory_uri() . '/js/aspectus-sliders.js', array( 'jquery', 'easy-pie-chart-js' ), '1.0.0', true );

    //custom slider js
    wp_enqueue_script( 'tapacode-moving-menu', get_stylesheet_directory_uri() . '/js/aspectus-moving-menu.js', array( 'jquery', 'easy-pie-chart-js' ), '1.0.0', true );
    
    //custom submenu js
    wp_enqueue_script( 'tapacode-submenu-navs', get_stylesheet_directory_uri() . '/js/aspectus-submenu-navs.js', array( 'jquery', 'easy-pie-chart-js' ), '1.0.0', true );

    //slick css
    wp_enqueue_style( 'slick-styles',
    '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'
    );

    //slick js
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), '1.0.0', true ); 

    //easy pie chart
    wp_enqueue_script( 'easy-pie-chart-js', get_stylesheet_directory_uri() . '/js/easy-pie-chart.js', array( 'jquery' ), '1.0.0', true );


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
            'name'  => esc_attr__( 'light grey', 'tapacode' ),
            'slug'  => 'light grey',
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


function tapacode_client_setup_post_type() {

    /*
    * Labels for client custom post type
    */
    $labels = array(
        'name'                  => _x( 'Clients', 'Post type general name', 'client' ),
        'singular_name'         => _x( 'Client', 'Post type singular name', 'client' ),
        'menu_name'             => _x( 'Clients', 'Admin Menu text', 'client' ),
        'name_admin_bar'        => _x( 'Client', 'Add New on Toolbar', 'client' ),
        'add_new'               => __( 'Add New', 'client' ),
        'add_new_item'          => __( 'Add New client', 'client' ),
        'new_item'              => __( 'New client', 'client' ),
        'edit_item'             => __( 'Edit client', 'client' ),
        'view_item'             => __( 'View client', 'client' ),
        'all_items'             => __( 'All clients', 'client' ),
        'search_items'          => __( 'Search clients', 'client' ),
        'parent_item_colon'     => __( 'Parent clients:', 'client' ),
        'not_found'             => __( 'No clients found.', 'client' ),
        'not_found_in_trash'    => __( 'No clients found in Trash.', 'client' ),
        'featured_image'        => _x( 'Client Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'client' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'client' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'client' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'client' ),
        'archives'              => _x( 'Client archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'client' ),
        'insert_into_item'      => _x( 'Insert into client', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'client' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this client', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'client' ),
        'filter_items_list'     => _x( 'Filter clients list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'client' ),
        'items_list_navigation' => _x( 'Clients list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'client' ),
        'items_list'            => _x( 'Clients list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'client' ),
    );

    //Register CPT client
    register_post_type('tapacode_client',
        array(
            'labels'      => $labels,
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'client'),
            'capability_type'    => 'post',
            'supports'    => array( 'title', 'thumbnail', 'excerpt' ),
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'tapacode_client_setup_post_type' );

if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

    function aspectus_register_nav_menu(){
        register_nav_menus( array(
            'sector_one' => __('Sector Menu 1', 'text_domain'),
            'sector_two' => __('Sector Menu 2', 'text_domain'),
            'sector_three' => __('Sector Menu 3', 'text_domain'),
            'sector_four' => __('Sector Menu 4', 'text_domain'),
            'sector_five' => __('Sector Menu 5', 'text_domain'),
            'sector_six' => __('Sector Menu 6', 'text_domain'),
        ) );
    }
    add_action( 'after_setup_theme', 'aspectus_register_nav_menu', 0 );
}