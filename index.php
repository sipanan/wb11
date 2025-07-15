<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">
            <?php
            if (is_home() && !is_front_page()) {
                single_post_title();
            } else {
                esc_html_e('Blog', 'safe-cologne');
            }
            ?>
        </h1>
    </div>
</div>

<div class="blog-page">
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <?php if (have_posts()) : ?>
                    <div class="blog-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-card'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="blog-card-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('blog-thumb'); ?>
                                        </a>
                                        <div class="blog-card-category">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="blog-card-content">
                                    <header class="entry-header">
                                        <h2 class="blog-card-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <div class="blog-card-meta">
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
                                            <?php if (comments_open()) : ?>
                                                <span class="comments-link">
                                                    <i class="far fa-comment"></i>
                                                    <?php comments_popup_link(
                                                        esc_html__('0 Kommentare', 'safe-cologne'),
                                                        esc_html__('1 Kommentar', 'safe-cologne'),
                                                        esc_html__('% Kommentare', 'safe-cologne')
                                                    ); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </header>
                                    
                                    <div class="blog-card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <footer class="blog-card-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            <?php esc_html_e('Weiterlesen', 'safe-cologne'); ?>
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </footer>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                    
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__('Zurück', 'safe-cologne'),
                        'next_text' => esc_html__('Weiter', 'safe-cologne') . ' <i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-posts">
                        <div class="no-posts-icon">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <h2><?php esc_html_e('Keine Beiträge gefunden', 'safe-cologne'); ?></h2>
                        <p><?php esc_html_e('Es scheint, als hätten wir noch keine Beiträge veröffentlicht.', 'safe-cologne'); ?></p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Zur Startseite', 'safe-cologne'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </main>
            
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<style>
.blog-page {
    padding: 3rem 0;
    background: var(--bg-light);
}

.content-wrapper {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 3rem;
}

.no-posts {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--white);
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
}

.no-posts-icon {
    font-size: 5rem;
    color: #ddd;
    margin-bottom: 2rem;
}

@media (max-width: 968px) {
    .content-wrapper {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
