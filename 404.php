<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="error-404 not-found">
    <div class="container">
        <div class="error-content">
            <div class="error-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            
            <h1 class="error-title">404</h1>
            <h2><?php esc_html_e('Seite nicht gefunden', 'safe-cologne'); ?></h2>
            
            <p class="error-message">
                <?php esc_html_e('Die von Ihnen gesuchte Seite existiert leider nicht. Möglicherweise wurde sie verschoben oder gelöscht.', 'safe-cologne'); ?>
            </p>
            
            <div class="error-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                    <i class="fas fa-home"></i>
                    <?php esc_html_e('Zur Startseite', 'safe-cologne'); ?>
                </a>
                
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontakt'))); ?>" class="btn btn-secondary btn-lg">
                    <i class="fas fa-envelope"></i>
                    <?php esc_html_e('Kontakt aufnehmen', 'safe-cologne'); ?>
                </a>
            </div>
            
            <div class="helpful-links">
                <h3><?php esc_html_e('Hilfreiche Links:', 'safe-cologne'); ?></h3>
                <ul>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('dienstleistungen'))); ?>">
                        <?php esc_html_e('Unsere Dienstleistungen', 'safe-cologne'); ?>
                    </a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('ueber-uns'))); ?>">
                        <?php esc_html_e('Über uns', 'safe-cologne'); ?>
                    </a></li>
                    <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('jobportal'))); ?>">
                        <?php esc_html_e('Karriere', 'safe-cologne'); ?>
                    </a></li>
                </ul>
            </div>
            
            <div class="search-form-404">
                <h3><?php esc_html_e('Oder nutzen Sie die Suche:', 'safe-cologne'); ?></h3>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>

<style>
.error-404 {
    padding: 5rem 0;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.error-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
}

.error-icon {
    font-size: 5rem;
    color: var(--primary-red);
    margin-bottom: 2rem;
}

.error-title {
    font-size: 8rem;
    font-weight: 900;
    line-height: 1;
    color: var(--primary-red);
    margin-bottom: 1rem;
}

.error-404 h2 {
    margin-bottom: 1rem;
}

.error-message {
    font-size: 1.25rem;
    color: var(--light-gray);
    margin-bottom: 3rem;
}

.error-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 3rem;
}

.helpful-links {
    margin-bottom: 3rem;
}

.helpful-links h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

.helpful-links ul {
    list-style: none;
    padding: 0;
}

.helpful-links li {
    margin-bottom: 0.5rem;
}

.search-form-404 h3 {
    font-size: 1.25rem;
    margin-bottom: 1rem;
}

@media (max-width: 768px) {
    .error-title {
        font-size: 5rem;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .error-actions .btn {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<?php get_footer(); ?>
