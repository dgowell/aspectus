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
            <?php if ( is_singular('post') ) { ?>
                <div class="breadcrumbs mob-hide"><a href="/news-insights">News & Insights</a><span class="breadcrumb__separator">></span><span class="breadcrumb__title"><?php echo wp_trim_words( get_the_title(), 3 ); ?></span></div>
                <div class="breadcrumbs mob-show pt-20"><a href="/news-insights">< Back to News & Insights</a></div>
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
                <?php genesis_block_theme_post_byline(); ?>
            <?php } else if ( is_singular('tapacode_case-study')) {

                } else { ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            <?php } ?>
        </header>
        <div class="entry-content">

            <?php
            if ( ! is_single() && has_excerpt() ) {
                the_excerpt();
            } else {
                // Get the content.
                the_content( esc_html__( 'Read More', 'genesis-block-theme' ) . ' <span class="screen-reader-text">' . __( 'about ', 'genesis-block-theme' ) . get_the_title() . '</span>' );
                 get_template_part( 'template-parts/related-news');
            }

            ?>
        </div><!-- .entry-content -->
    </div><!-- .post-content-->

</article><!-- #post-## -->
