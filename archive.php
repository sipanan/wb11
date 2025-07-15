<?php
/**
 * The template for displaying archive pages
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </div>
</div>

<div class="archive-page">
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <?php if (have_posts()) : ?>
                    <div class="archive-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('archive-item'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="archive-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('blog-thumb'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="archive-content">
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        
                                        <?php if (get_post_type() === 'post') : ?>
                                            <div class="entry-meta">
                                                <span class="posted-on">
                                                    <i class="far fa-calendar"></i>
                                                    <?php echo get_the_date(); ?>
                                                </span>
                                                <span class="posted-by">
                                                    <i class="far fa-user"></i>
                                                    <?php the_author(); ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </header>
                                    
                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <footer class="entry-footer">
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
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                    ));
                    ?>
                    
                <?php else : ?>
                    <div class="no-results">
                        <h2><?php esc_html_e('Keine Einträge gefunden', 'safe-cologne'); ?></h2>
                                                <p><?php esc_html_e('Es wurden keine Einträge gefunden.', 'safe-cologne'); ?></p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                            <?php esc_html_e('Zur Startseite', 'safe-cologne'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </main>
            
            <?php if (is_active_sidebar('sidebar-main')) : ?>
                <aside class="sidebar">
                    <?php dynamic_sidebar('sidebar-main'); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.archive-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.archive-item {
    background: var(--white);
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
}

.archive-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.archive-thumbnail {
    height: 200px;
    overflow: hidden;
}

.archive-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.archive-item:hover .archive-thumbnail img {
    transform: scale(1.05);
}

.archive-content {
    padding: 1.5rem;
}

.archive-content .entry-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.archive-content .entry-meta {
    display: flex;
    gap: 1.5rem;
        margin-bottom: 1rem;
    font-size: 0.875rem;
    color: var(--light-gray);
}

.archive-content .entry-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.archive-content .entry-summary {
    margin-bottom: 1rem;
}

.archive-content .read-more {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: var(--primary-red);
    transition: var(--transition);
}

.archive-content .read-more:hover {
    gap: 0.75rem;
}

@media (max-width: 768px) {
    .archive-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>
