<?php
/**
 * The template for displaying search results pages
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1 class="page-title">
            <?php
            printf(
                esc_html__('Suchergebnisse für: %s', 'safe-cologne'),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </div>
</div>

<div class="search-results">
    <div class="container">
        <div class="content-wrapper">
            <main class="main-content">
                <?php if (have_posts()) : ?>
                    <div class="search-info">
                        <?php
                        global $wp_query;
                        printf(
                            esc_html(_n(
                                '%d Ergebnis gefunden',
                                '%d Ergebnisse gefunden',
                                $wp_query->found_posts,
                                'safe-cologne'
                            )),
                            $wp_query->found_posts
                        );
                        ?>
                    </div>
                    
                    <div class="search-results-list">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('search-result-item'); ?>>
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <div class="entry-meta">
                                        <?php if (get_post_type() === 'post') : ?>
                                            <span class="posted-on">
                                                <i class="far fa-calendar"></i>
                                                <?php echo get_the_date(); ?>
                                            </span>
                                        <?php endif; ?>
                                        
                                        <span class="post-type">
                                            <i class="far fa-file"></i>
                                            <?php
                                            $post_type_obj = get_post_type_object(get_post_type());
                                            echo esc_html($post_type_obj->labels->singular_name);
                                            ?>
                                        </span>
                                    </div>
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
                        <div class="no-results-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        
                        <h2><?php esc_html_e('Keine Ergebnisse gefunden', 'safe-cologne'); ?></h2>
                        
                        <p><?php esc_html_e('Leider wurden keine Inhalte gefunden, die Ihrer Suche entsprechen. Versuchen Sie es mit anderen Suchbegriffen.', 'safe-cologne'); ?></p>
                        
                        <div class="search-form-wrapper">
                            <?php get_search_form(); ?>
                        </div>
                        
                        <div class="search-suggestions">
                            <h3><?php esc_html_e('Vorschläge:', 'safe-cologne'); ?></h3>
                            <ul>
                                <li><?php esc_html_e('Überprüfen Sie Ihre Rechtschreibung', 'safe-cologne'); ?></li>
                                <li><?php esc_html_e('Verwenden Sie allgemeinere Suchbegriffe', 'safe-cologne'); ?></li>
                                <li><?php esc_html_e('Verwenden Sie weniger Suchbegriffe', 'safe-cologne'); ?></li>
                            </ul>
                        </div>
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
.search-results {
    padding: 3rem 0;
}

.search-info {
    margin-bottom: 2rem;
    font-size: 1.125rem;
    color: var(--light-gray);
}

.search-results-list {
    margin-bottom: 3rem;
}

.search-result-item {
    padding: 2rem;
    margin-bottom: 2rem;
    background: var(--bg-light);
    border-radius: var(--radius-md);
    transition: var(--transition);
}

.search-result-item:hover {
    box-shadow: var(--shadow-md);
}

.search-result-item .entry-title {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}

.search-result-item .entry-meta {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1rem;
    font-size: 0.875rem;
    color: var(--light-gray);
}

.search-result-item .entry-summary {
    margin-bottom: 1rem;
}

.read-more {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    color: var(--primary-red);
    transition: var(--transition);
}

.read-more:hover {
    gap: 0.75rem;
}

.no-results {
    text-align: center;
    padding: 3rem 0;
}

.no-results-icon {
    font-size: 5rem;
    color: #ddd;
    margin-bottom: 2rem;
}

.search-form-wrapper {
    max-width: 500px;
    margin: 2rem auto;
}

.search-suggestions {
    margin-top: 3rem;
}

.search-suggestions ul {
    list-style: none;
    padding: 0;
}

.search-suggestions li {
    padding: 0.5rem 0;
}
</style>

<?php get_footer(); ?>
