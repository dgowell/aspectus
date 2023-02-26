<?php
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



/* show checkboxes of service taxonomy */
$html = wp_dropdown_categories( array(
        'taxonomy' => array('service'),
        'name' => 'service',
        'id' => 'js-services',
        'class' => 'services__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );

$html = str_replace( "form id=", "form multiple='multiple' id=", $html );
$html = str_replace( "select", "span", $html );
$html = str_replace( "option class=", "input type='checkbox' class=", $html );
$html = str_replace( "option", "", $html );
$html = str_replace( "</>", "<br/>", $html );

echo $html;



/* show checkboxes of type taxonomy */
$html = wp_dropdown_categories( array(
        'taxonomy' => 'type',
        'name' => 'type',
        'id' => 'js-types',
        'class' => 'types__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );

$html = str_replace( "form id=", "form multiple='multiple' id=", $html );
$html = str_replace( "select", "span", $html );
$html = str_replace( "option class=", "input type='checkbox' class=", $html );
$html = str_replace( "option", "", $html );
$html = str_replace( "</>", "<br/>", $html );

echo $html;

/* show checkboxes of category taxonomy */
$html = wp_dropdown_categories( array(
        'taxonomy' => 'category',
        'name' => 'sectors',
        'id' => 'js-sectors',
        'class' => 'sectors__form',
        'echo' => 0,
        'value_field' => 'slug'
    ) );
$html = str_replace( "form id=", "form multiple='multiple' id=", $html );
$html = str_replace( "select", "span", $html );
$html = str_replace( "option class=", "input type='checkbox' class=", $html );
$html = str_replace( "option", "", $html );
$html = str_replace( "</>", "<br/>", $html );

echo $html;



// The Query
//$posts = new WP_Query( $query_args );
// The Loop

//while($posts->have_posts()) : $posts->the_post();
  //  include('news-grid.php');
//endwhile;
echo '<div id="results"></div>';
?>