<?php
//get current post id
$current_post = get_the_ID();

//make sure to return array of category ids
$cat_args = array('fields'=> 'ids');

//get the post categories
$cats = wp_get_post_categories($current_post, $cat_args);

//the args for the query below
$args = array(
    'post_type'              => array('post'), // use any for any kind of post type, custom post type slug for custom post type
    'post_status'            => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
    'post__not_in'           => array($current_post),
    'posts_per_page'         => '2', // use -1 for all post
    'order'                  => 'DESC', // Also support: ASC
    'orderby'                => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
    'category__in'           => array(207,208),
);
?>

<div class="wp-block-genesis-blocks-gb-columns title pt-90 gb-layout-columns-2 gb-2-col-equal">
    <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
        <div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center">
            <div class="gb-block-layout-column-inner">
                <h2>Related News</h2>
            </div>
        </div>
        <div class="wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center">
            <div class="gb-block-layout-column-inner">
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="wp-block-genesis-blocks-gb-columns post__container gb-layout-columns-1 one-column">
    <div class="gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column">
        <div class="wp-block-genesis-blocks-gb-column gb-block-layout-column">
            <div class="gb-block-layout-column-inner">
                <div class="is-layout-flow wp-block-query alignwide post__list">
                    <ul class="is-layout-flow is-flex-container columns-2 wp-block-post-template">
                        <?php

                        // The Query
                        $query = new WP_Query($args);

                        // The Loop
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                include('post-grid.php');
                            }
                        } else {
                            // no posts found
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>