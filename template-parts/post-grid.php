<li class="post__item">
    <a href="<?php echo get_permalink() ?>">
        <figure class="post__img">
            <?php echo @get_the_post_thumbnail( get_the_ID(), array(1024,683), array( 'class' => 'attachment-post-thumbnail size-post-thumbnail wp-post-image' ) ); ?>
        </figure>
    </a>
    <a href="<?php echo get_permalink() ?>">
        <h4 class="post__title--post"><?php echo get_the_title(); ?></h4>
    </a>
    <hr class="post__separator"></hr>
    <div class="post-info__container">
        <div class="post-info__col post-info__col--author">
            <!-- Create an avatar link -->
            <?php 
            $author_id = get_the_author_meta('ID'); ?>
            <a class="post-info__img" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Posts by %s', 'genesis-block-theme' ), get_the_author() ) ); ?>">
                <?php echo get_avatar( $author_id, apply_filters( 'genesis_block_theme_author_bio_avatar', 44 ) ); ?>
            </a>

            <!-- Create an author post link -->
            <a class="post-info__author" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
            <?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
            </a>
        </div>
        <div class="post-info__col post-info__col--date">
            <span class="post-info__date"><?php echo get_the_date('d.m.y'); ?></span>
        </div>
    </div>
</li>