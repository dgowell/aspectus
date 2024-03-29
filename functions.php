<?php

/*
*   Load all the styles and scripts
*  -------------------------------------------------------------------------
*/
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
    wp_enqueue_script( 'tapacode-sliders', get_stylesheet_directory_uri() . '/js/aspectus-sliders.js', array( 'jquery', 'slick-js', 'easy-pie-chart-js' ), '1.0.0', true );

    //custom slider js
    wp_enqueue_script( 'tapacode-moving-menu', get_stylesheet_directory_uri() . '/js/aspectus-moving-menu.js', array( 'jquery', 'slick-js', 'easy-pie-chart-js' ), '1.0.0', true );

    //tab slider js
    wp_enqueue_script( 'tapacode-tab-slider', get_stylesheet_directory_uri() . '/js/aspectus-tab-slider.js', array( 'jquery', 'slick-js' ), '1.0.0', false );

    //custom submenu js
    wp_enqueue_script( 'tapacode-submenu-navs', get_stylesheet_directory_uri() . '/js/aspectus-submenu-navs.js', array( 'jquery', 'easy-pie-chart-js' ), '1.0.0', true );

    //floating nav js
    wp_enqueue_script( 'tapacode-floating-navs', get_stylesheet_directory_uri() . '/js/aspectus-floating-nav.js', array( 'jquery' ), '1.0.0', true );

    //custom switches js
    wp_enqueue_script( 'tapacode-switches', get_stylesheet_directory_uri() . '/js/aspectus-switches.js', array( 'jquery' ), '1.0.0', true );

    //custom post filters js
    wp_enqueue_script( 'tapacode-filters', get_stylesheet_directory_uri() . '/js/aspectus-filters.js', array( 'jquery' ), '1.0.0', true );

    /*
    * Handle AJAX
    */

    // in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
    $selector_nonce = wp_create_nonce( 'wp-tapacode-nonce' );

    wp_localize_script( 'tapacode-filters', 'ajax_object',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php' ),
                'nonce' => $selector_nonce
            ) );

    //slick css
    wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/css/slick.css', array(), '1.0.0', false);

    //slick js
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), '1.0.0', false); 

    //easy pie chart
    wp_enqueue_script( 'easy-pie-chart-js', get_stylesheet_directory_uri() . '/js/easy-pie-chart.js', array( 'jquery' ), '1.0.0', false );


}
/*
* Set Colours for admin editor
* -------------------------------------------------------------------
*/
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
            'color' => '#8A59FF',
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
            'slug'  => 'deep-grey',
            'color' => '#6F7783',
        ),
        array(
            'name'  => esc_attr__( 'light grey', 'tapacode' ),
            'slug'  => 'light-grey',
            'color' => '#E6EBEB',
        ),
        array(
            'name'  => esc_attr__( 'light jade', 'tapacode' ),
            'slug'  => 'light-jade',
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



/*
* Labels for client custom post type
* --------------------------------------------------------------------
*/
function tapacode_client_setup_post_type() {
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
            'menu_icon' => 'dashicons-groups',
        )
    );
}
add_action( 'init', 'tapacode_client_setup_post_type' );


/*
* Labels for client custom post type
* ---------------------------------------------------------------------------------------
*/
function tapacode_casestudy_setup_post_type() {
    $labels = array(
        'name'                  => _x( 'Case Study', 'Post type general name', 'case-study' ),
        'singular_name'         => _x( 'Case Study', 'Post type singular name', 'case-study' ),
        'menu_name'             => _x( 'Case Studies', 'Admin Menu text', 'case-study' ),
        'name_admin_bar'        => _x( 'Case Study', 'Add New on Toolbar', 'case-study' ),
        'add_new'               => __( 'Add New', 'case-study' ),
        'add_new_item'          => __( 'Add New case-study', 'case-study' ),
        'new_item'              => __( 'New case study', 'case-study' ),
        'edit_item'             => __( 'Edit case study', 'case-study' ),
        'view_item'             => __( 'View case study', 'case-study' ),
        'all_items'             => __( 'All case studies', 'case-study' ),
        'search_items'          => __( 'Search case studies', 'case-study' ),
        'parent_item_colon'     => __( 'Parent case studies:', 'case-study' ),
        'not_found'             => __( 'No case studies found.', 'case-study' ),
        'not_found_in_trash'    => __( 'No case studies found in Trash.', 'case-study' ),
        'featured_image'        => _x( 'Case Study Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'case-study' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'case-study' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'case-study' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'case-study' ),
        'archives'              => _x( 'Case Study archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'case-study' ),
        'insert_into_item'      => _x( 'Insert into case study', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'case-study' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this case study', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'case-study' ),
        'filter_items_list'     => _x( 'Filter case studies list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'case-study' ),
        'items_list_navigation' => _x( 'Case Studies list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'case-study' ),
        'items_list'            => _x( 'Case Studies list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'case-study' ),
    );

    //Register CPT case-study
    register_post_type('tapacode_case-study',
        array(
            'labels'      => $labels,
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'case-study'),
            'capability_type'    => 'post',
            'supports'    => array( 'title', 'editor', 'revisions', 'trackbacks', 'author', 'thumbnail', 'excerpt', 'page-attributes', 'post-formats' ),
            'show_in_rest' => true,
            'taxonomies'  => array('service', 'tapacode_type', 'category'),
            'menu_icon' => 'dashicons-text-page',
        )
    );
    flush_rewrite_rules( false );
}
add_action( 'init', 'tapacode_casestudy_setup_post_type' );

/*
* Labels for client custom post type
* ------------------------------------------------------------------------------------
*/
function tapacode_office_setup_post_type() {
    $labels = array(
        'name'                  => _x( 'Offices', 'Post type general name', 'office' ),
        'singular_name'         => _x( 'Office', 'Post type singular name', 'office' ),
        'menu_name'             => _x( 'Offices', 'Admin Menu text', 'office' ),
        'name_admin_bar'        => _x( 'Office', 'Add New on Toolbar', 'office' ),
        'add_new'               => __( 'Add New', 'office' ),
        'add_new_item'          => __( 'Add New office', 'office' ),
        'new_item'              => __( 'New office', 'office' ),
        'edit_item'             => __( 'Edit office', 'office' ),
        'view_item'             => __( 'View office', 'office' ),
        'all_items'             => __( 'All offices', 'office' ),
        'search_items'          => __( 'Search offices', 'office' ),
        'parent_item_colon'     => __( 'Parent offices:', 'office' ),
        'not_found'             => __( 'No offices found.', 'office' ),
        'not_found_in_trash'    => __( 'No offices found in Trash.', 'office' ),
        'featured_image'        => _x( 'Office Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'office' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'office' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'office' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'office' ),
        'archives'              => _x( 'Office archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'office' ),
        'insert_into_item'      => _x( 'Insert into office', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'office' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this office', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'office' ),
        'filter_items_list'     => _x( 'Filter offices list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'office' ),
        'items_list_navigation' => _x( 'Offices list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'office' ),
        'items_list'            => _x( 'Offices list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'office' ),
    );

    //Register CPT office
    register_post_type('tapacode_office',
        array(
            'labels'      => $labels,
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => array( 'slug' => 'office'),
            'capability_type'    => 'post',
            'supports'    => array( 'title', 'thumbnail', 'excerpt' ),
            'show_in_rest' => true,
            'menu_icon'    => 'dashicons-admin-multisite',
        )
    );
}
add_action( 'init', 'tapacode_office_setup_post_type' );

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

/**
 * Add custom taxonomies for posts
 * services, sectors and types
 * --------------------------------------------------------------------------------
 */
function add_custom_taxonomies() {
  // Add new "Types" taxonomy to Posts
  register_taxonomy('tapacode_type', 'post', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Types', 'taxonomy general name' ),
      'singular_name' => _x( 'Type', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Types' ),
      'all_items' => __( 'All Types' ),
      'parent_item' => __( 'Parent Type' ),
      'parent_item_colon' => __( 'Parent Type:' ),
      'edit_item' => __( 'Edit Type' ),
      'update_item' => __( 'Update Type' ),
      'add_new_item' => __( 'Add New Type' ),
      'new_item_name' => __( 'New Type Name' ),
      'menu_name' => __( 'Types' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'types', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/types/"
      'hierarchical' => true // This will allow URL's like "/types/boston/cambridge/"
    ),
    'show_admin_column' => true,
    'show_in_rest' => true, //add this
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true
  ));
  flush_rewrite_rules( false );

  register_taxonomy('service', 'post', array(
    // Hierarchical taxonomy (like categories)
     'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Services', 'taxonomy general name' ),
      'singular_name' => _x( 'Service', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Services' ),
      'all_items' => __( 'All Services' ),
      'parent_item' => __( 'Parent Service' ),
      'parent_item_colon' => __( 'Parent Service:' ),
      'edit_item' => __( 'Edit Service' ),
      'update_item' => __( 'Update Service' ),
      'add_new_item' => __( 'Add New Service' ),
      'new_item_name' => __( 'New Service Name' ),
      'menu_name' => __( 'Services' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'category/services', // This controls the base slug that will display before each term
      'with_front' => true, // Don't display the category base before "/services/"
      'hierarchical' => true // This will allow URL's like "/services/boston/cambridge/"
    ),
    'show_admin_column' => true,
    'show_in_rest' => true, //add this
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true
  ));
 flush_rewrite_rules( false );
}
add_action( 'init', 'add_custom_taxonomies', 0 );

/**
 * Rename Category to Theme
 * -----------------------------------------------------------------------------
 */
function be_rename_category_theme() {

    $singular_name = 'Sector';
    $plural_name = 'Sectors';

    $labels = array(
          'name'                    => $plural_name,
          'menu_name'               => $plural_name,
          'singular_name'           => $singular_name,
          'search_items'            => 'Search ' . $plural_name,
          'popular_items'           => 'Popular ' . $plural_name,
          'all_items'               => 'All ' . $plural_name,
          'parent_item'             => 'Parent ' . $singular_name,
          'parent_item_colon'       => 'Parent ' . $singular_name . ':',
          'edit_item'               => 'Edit ' . $singular_name,
          'view_item'               => 'View ' . $singular_name,
          'update_item'             => 'Update ' . $singular_name,
          'add_new_item'            => 'Add New ' . $singular_name,
          'new_item_name'           => 'New ' . $singular_name . ' Name',
          'separate_items_with_commas' => 'Separate ' . $plural_name . ' with commas',
          'add_or_remove_items'     => 'Add or remove ' . $plural_name,
          'back_to_items'           => '← Back to ' . $plural_name,
          'items_list_navigation'   => $plural_name . ' list navigation',
          'items_list'              => $plural_name . ' list',
      );

      global $wp_taxonomies;
      $wp_taxonomies['category']->labels = (object) array_merge( (array) $wp_taxonomies['category']->labels, $labels );
}
add_action( 'init', 'be_rename_category_theme' );

/*
* Rename post type posts to news
* ----------------------------------------------------------------------------
*/
function tapacode_rename_posts_post_type(){ 
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = 'News Articles';
    $labels->singular_name = 'News Article';
    $labels->add_new = 'Add Article';
    $labels->add_new_item = 'Add Article';
    $labels->edit_item = 'Edit Article';
    $labels->new_item = 'News Article';
    $labels->view_item = 'View News Article';
    $labels->search_items = 'Search News Article';
    $labels->not_found = 'No News Article found';
    $labels->not_found_in_trash = 'No News Article found in Trash';
    $labels->all_items = 'All News Articles';
    $labels->menu_name = 'News Articles';
    $labels->name_admin_bar = 'News Articles';
}
add_action( 'init', 'tapacode_rename_posts_post_type' );

/* Remove tags on posts
* -------------------------------------------------------------------------------
*/
function wpdocs_unregister_tags_for_posts() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'wpdocs_unregister_tags_for_posts' );



/* SHORTCODES
* -------------------------------------------------------------------------------
*/
function posts_filter_shortcode_func( $atts ) {

    //set default
    $attributes = shortcode_atts( array(
        'post_type' => 'post',
    ), $atts );

    ob_start();

    // include template with the arguments (The $args parameter was added in v5.5.0)
    get_template_part( 'template-parts/posts-filter', null, $attributes );

    return ob_get_clean();

}
add_shortcode( 'aspectus-filter', 'posts_filter_shortcode_func' );

if ( ! function_exists( 'wpdocs_example_get_the_terms' ) ) {

    /**
     * Function to return list of the terms.
     *
     * @param string 'taxonomy'
     *
     * @return html Returns the list of elements.
     */

    function wpdocs_example_get_the_terms( $taxonomy ) {
        global $post;
        $terms = get_the_terms( get_the_ID(), $taxonomy );
        if ( $terms && ! is_wp_error( $terms ) ) :

            $term_links = array();

            foreach ( $terms as $term ) {
               // $term_links[] = '<a href="' . esc_attr( get_term_link( $term->slug, $taxonomy ) ) . '">' . __( $term->name ) . '</a>';
                $term_links[] = '<span class="filter__text">' . __( $term->name ) . '</span>';
            }

            $all_terms = join( '', $term_links );

            echo '<span class="terms-' . esc_attr( $term->slug ) . '">' . __( $all_terms ) . '</span>';

        endif;

    }

}


function shortcode_get_services_taxonomy( $atts ) {
    global $post;
    ob_start();

    echo wpdocs_example_get_the_terms( 'service' );

    return ob_get_clean();

}
add_shortcode( 'services', 'shortcode_get_services_taxonomy' );

function shortcode_get_sectors_taxonomy( $atts ) {
    global $post;
    ob_start();

    echo wpdocs_example_get_the_terms( 'category' );

    return ob_get_clean();

}
add_shortcode( 'sectors', 'shortcode_get_sectors_taxonomy' );


function shortcode_get_type_taxonomy( $atts ) {
    global $post;
    ob_start();

    echo wpdocs_example_get_the_terms( 'service' );

    return ob_get_clean();

}
add_shortcode( 'types', 'shortcode_get_type_taxonomy' );

function shortcode_sector_nav( $atts ) {
    global $post;
    ob_start();

    global $post;
        //echo get_the_ID();
        //echo $taxonomy;
        $terms = get_the_terms( get_the_ID(), $taxonomy );
        //echo var_dump($terms);
        if ( $terms && ! is_wp_error( $terms ) ) :

            $term_links = array();

            foreach ( $terms as $term ) {
               // $term_links[] = '<a href="' . esc_attr( get_term_link( $term->slug, $taxonomy ) ) . '">' . __( $term->name ) . '</a>';
                $term_links[] = '<span class="filter__text">' . __( $term->name ) . '</span>';
            }

            $all_terms = join( '', $term_links );

            echo '<span clasis="terms-' . esc_attr( $term->slug ) . '">' . __( $all_terms ) . '</span>';

        endif;


    return ob_get_clean();

}

add_shortcode( 'types', 'shortcode_sector_nav' );

function shortcode_get_lottie( $atts ) {
    ob_start();

    echo '<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script><div id="pre-loader" style="position: fixed; width: 100vw; height: 100vh; top: 0px; left: 0px; z-index: 999999; background-color: rgb(70, 181, 168); display: none;">
        <lottie-player src="'. get_stylesheet_directory_uri() . '/lottie/a-equals.json" background="transparent"  speed="1"  style="width: calc(100vw + 40px); height: 100%; margin-left: -20px;" autoplay></lottie-player>
        </div>';

    return ob_get_clean();

}
add_shortcode( 'lottie', 'shortcode_get_lottie' );


/*
*   AJAX
*   Page: Our Work Page
*   Taxonomy Filters
* --------------------------------------------------------------------------------
*/

function tapacode_selector_ajax_callback() {

    check_ajax_referer( 'wp-tapacode-nonce' );

    //Get each filter value
    $services  = esc_attr( $_GET['services'] );
    $sectors   = esc_attr( $_GET['sectors'] );
    $types     = esc_attr( $_GET['types'] );
    $search    = esc_attr( $_GET['search'] );
    $orderby   = esc_attr( $_GET['orderby'] );
    $order     = esc_attr( $_GET['order'] );
    $post_type = esc_attr( $_GET['post_type']);

    echo $search;

    $ser = explode(',', $services);
    $sec = explode(',', $sectors);
    $t = explode(',', $types);

    $ajaxposts = new WP_Query([
        'post_type'       => $post_type,
        'orderby'         => $orderby,
        'order'           => $order,
        'post_status'     => array('publish'),
        's'               => $search,
        'posts_per_page'  => -1,
        'tax_query'       => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'service',
                                    'field'    => 'slug',
                                    'terms'    => $ser,
                                ),
                                array(
                                    'taxonomy' => 'category',
                                    'field'    => 'slug',
                                    'terms'    => $sec,
                                ),
                                array(
                                    'taxonomy' => 'tapacode_type',
                                    'field'    => 'slug',
                                    'terms'    => $t,
                                ),
        ),
    ]);
    $response = '';

    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
            if ($post_type === 'post') {
               $response .= get_template_part('template-parts/post-grid'); 
            } else {
                $response .= get_template_part('template-parts/news-grid');
            }
        endwhile;
    } else {
        $response = '<p>No results found</p>';
    }

    echo $response;
    wp_die(); // All ajax handlers die when finished

}
add_action( 'wp_ajax_nopriv_tapacode_selector', 'tapacode_selector_ajax_callback' );
add_action( 'wp_ajax_tapacode_selector', 'tapacode_selector_ajax_callback' );



/*
* Remove comments
*--------------------------------------------------------------------------
*/
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});



/*
* Byline - Section with avatar at the top of the single posts
*--------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'genesis_block_theme_post_byline' ) ) :
    /**
     * Post byline
     */
    function genesis_block_theme_post_byline() {
        ?>
        <?php
        // Get the post author.
        global $post;
        $author_id = $post->post_author;
        ?>
    <div class="byline__container">
        <div class="byline__col byline__col--author">
            <!-- Create an avatar link -->
            <a class="byline__img" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'genesis-block-theme' ), get_the_author() ) ); ?>">
                <?php echo get_avatar( $author_id, apply_filters( 'genesis_block_theme_author_bio_avatar', 44 ) ); ?>
            </a>

            <!-- Create an author post link -->
            <a class="byline__author" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
            By <?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
            </a>
        </div>
        <div class="byline__col byline__col--date">
            <span class="byline__date"><?php echo get_the_date('d.m.y'); ?></span>
        </div>
    </div>
        <?php
    } endif;
/**
 * Inject term slug into custom post type permastruct.
 * 
 * @link   http://wordpress.stackexchange.com/a/5313/1685
 * 
 * @param  string  $link
 * @param  WP_Post $post 
 * @return array
 */
/*
function wpse_5308_post_link( $link, $post ) {
    if ( $post->post_type === 'post' ) {
        if ( $terms = get_the_terms( $post->ID, 'tapacode_type' ) )
            $link = str_replace( '%type%', current( $terms )->slug, $link );
    }

    return $link;
}

add_filter( 'post_link', 'wpse_5308_post_link', 10, 2 );
*/
function custom_taxonomy_permalink_structure( $post_link, $post ) {
    if ( false !== strpos( $post_link, '%tapacode_type%' ) ) {
        $tapacode_type_term = get_the_terms( $post->ID, 'tapacode_type' );
        if ( ! empty( $tapacode_type_term ) ) {
            $post_link = str_replace( '%tapacode_type%', $tapacode_type_term[0]->slug, $post_link );
        } else {
            $post_link = str_replace( '/%tapacode_type%', '', $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_link', 'custom_taxonomy_permalink_structure', 10, 4 );
    ?>