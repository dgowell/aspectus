<li class="wp-block-post post-3064 tapacode_document type-tapacode_document status-publish has-post-thumbnail hentry category-case-study post with-featured-image">
    <a href="<?php echo get_permalink() ?>">
        <figure class="wp-block-post-featured-image">
            <?php echo get_the_post_thumbnail( get_the_id(), array(1024,683), array( 'class' => 'attachment-post-thumbnail size-post-thumbnail wp-post-image' ) ); ?>
        </figure>
        <div class="overlay"></div>
    </a>
    <div class="taxonomy-category wp-block-post-terms">
         <?php
        $categories = get_the_category();
        foreach($categories as $key=>$category){
            echo '<a rel="tag">' . $category->name . '</a>';
        }
    ?>
    </div>
    <a href="<?php echo get_permalink() ?>">
        <h4 class="wp-block-post-title"><?php echo get_the_title(); ?></h4>
    </a>
</li> 