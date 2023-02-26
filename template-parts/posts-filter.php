<?php

/*
* Initial query to populate page on first load
*/
$args = wp_parse_args(
    $args,
    array(
        'data' => array(
            'type' => 'post',
            'limit' => 9,
        ),
    )
);

$query_args = array(
    'post_type' => $args['data']['type'],
    'posts_per_page' => $args['data']['limit'],
    'orderby' => 'date',
);

/*
* Services taxonomy filter
*/
$services_filter = wp_dropdown_categories( array(
        'taxonomy' => array('service'),
        'name' => 'service',
        'id' => 'js-services',
        'class' => 'services__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );

$services_filter = str_replace( "form id=", "form multiple='multiple' id=", $services_filter );
$services_filter = str_replace( "select", "span", $services_filter );
$services_filter = str_replace( "option class=", "input type='checkbox' class=", $services_filter );
$services_filter = str_replace( "option", "", $services_filter );
$services_filter = str_replace( "</>", "<br/>", $services_filter );



/*
* Type taxonomy filter
*/
$type_filter = wp_dropdown_categories( array(
        'taxonomy' => 'type',
        'name' => 'type',
        'id' => 'js-types',
        'class' => 'types__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );

$type_filter = str_replace( "form id=", "form multiple='multiple' id=", $type_filter );
$type_filter = str_replace( "select", "span", $type_filter );
$type_filter = str_replace( "option class=", "input type='checkbox' class=", $type_filter );
$type_filter = str_replace( "option", "", $type_filter );
$type_filter = str_replace( "</>", "<br/>", $type_filter );



/*
* Sectors (category) taxonomy filter
*/
$sectors_filter = wp_dropdown_categories( array(
        'taxonomy' => 'category',
        'name' => 'sectors',
        'id' => 'js-sectors',
        'class' => 'sectors__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );
$sectors_filter = str_replace( "form id=", "form multiple='multiple' id=", $sectors_filter );
$sectors_filter = str_replace( "select", "span", $sectors_filter );
$sectors_filter = str_replace( "option class=", "input type='checkbox' class=", $sectors_filter );
$sectors_filter = str_replace( "option", "", $sectors_filter );
$sectors_filter = str_replace( "</>", "<br/>", $sectors_filter );









// The Query
//$posts = new WP_Query( $query_args );
// The Loop

//while($posts->have_posts()) : $posts->the_post();
  //  include('news-grid.php');
//endwhile;

?>
<div class="filter-bar__container">
    <div class="filter-bar__col filter-bar__col--search">
        <input class="filter-bar__input" id="js-search" type="text" placeholder="Search.." value=<?php get_search_query() ?>>
    </div>
    <button class="js-filter-link filter-bar__col filter-link">
        <p class="filter-link__title">Filter</p>
        <div class="filter-link__icon"></div>
    </button>
</div>
<div class="filters__container js-filters__container">
    <div class="filters__col">
        <p class="filters__title">by Service(s)</p>
        <?php echo $services_filter; ?>
    </div>
    <div class="filters__col">
        <p class="filters__title">by Sector(s)</p>
        <?php echo $sectors_filter; ?>
    </div>
    <div class="filters__col">
        <p class="filters__title">by Type</p>
        <?php echo $type_filter; ?>
    </div>
</div>

<select class="sorting-dropdown" name="sort-posts" id="sortbox">
    <option disabled>Sort by</option>
    <option value="orderby=date&order=DESC">Newest</option>
    <option value="orderby=date&order=ASC">Oldest</option>
    <option value="orderby=title&order=ASC">A-Z Asc</option>
    <option value="orderby=title&order=DESC">A-Z Desc</option>
</select>
<div id="results"></div>