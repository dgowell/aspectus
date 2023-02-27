<?php
/**
 * The template used for displaying standard post content
 *
 * @package Genesis Block Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> aria-label="<?php the_title_attribute(); ?>">
    <div class="post-content">
        <header class="article__header">
            <?php if ( is_single() ) { ?>
                <div class="breadcrumbs"><a href="/news-insights">News & Insights</a><span class="breadcrumb__separator">></span><span class="breadcrumb__title"><?php the_title(); ?></span></div>
                <div class="category__container">
                    <?php
                        $categories = get_the_category();
                        foreach($categories as $key=>$category){
                            echo '<button class="category__item" rel="tag">' . $category->name . '</button>';
                        }   ?>
                </div>
                <h1 class="article__title">
                    <?php the_title(); ?>
                </h1>
            <?php } else { ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            <?php } ?>

            <?php genesis_block_theme_post_byline(); ?>
            </header>

        <div class="entry-content">

            <?php
            if ( ! is_single() && has_excerpt() ) {
                the_excerpt();
            } else {
                // Get the content.
                the_content( esc_html__( 'Read More', 'genesis-block-theme' ) . ' <span class="screen-reader-text">' . __( 'about ', 'genesis-block-theme' ) . get_the_title() . '</span>' );
            }

            ?>
        </div><!-- .entry-content -->
    </div><!-- .post-content-->

</article><!-- #post-## -->
