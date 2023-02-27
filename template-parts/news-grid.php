<li class="post__item">
    <a href="<?php echo get_permalink() ?>">
        <figure class="post__img">
            <?php echo @get_the_post_thumbnail( get_the_ID(), array(1024,683), array( 'class' => 'attachment-post-thumbnail size-post-thumbnail wp-post-image' ) ); ?>
        </figure>
    </a>
    <a href="<?php echo get_permalink() ?>">
        <p class="post__title"><?php echo get_the_title(); ?></p>
    </a>
    <a href="<?php echo get_permalink() ?>">
        <p class="post__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
    </a>
</li>