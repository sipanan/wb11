<?php
/**
 * The template for displaying all single posts
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php if (function_exists('bcn_display')) : ?>
            <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
                <?php bcn_display(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="single-post">
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="far fa-calendar"></i>
                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo get_the_date(); ?>
                                    </time>
                                </span>
                                <span class="posted-by">
                                    <i class="far fa-user"></i>
                                    <?php the_author(); ?>
                                </span>
                                <?php if (has_category()) : ?>
                                    <span class="cat-links">
                                        <i class="far fa-folder"></i>
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </header>
                        
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="entry-content">
                            <?php the_content(); ?>
                            
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Seiten:', 'safe-cologne'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        
                        <footer class="entry-footer">
                            <?php if (has_tag()) : ?>
                                <div class="tag-links">
                                    <i class="fas fa-tags"></i>
                                    <?php the_tags('', ', '); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-navigation">
                                <?php
                                the_post_navigation(array(
                                    'prev_text' => '<i class="fas fa-arrow-left"></i> %title',
                                    'next_text' => '%title <i class="fas fa-arrow-right"></i>',
                                ));
                                ?>
                            </div>
                        </footer>
                    </article>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                <?php endwhile; ?>
            </main>
            
            <?php if (is_active_sidebar('sidebar-main')) : ?>
                <aside class="sidebar">
                    <?php dynamic_sidebar('sidebar-main'); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
                    
