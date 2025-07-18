<?php
/**
 * Single Job Template
 *
 * @package Safe_Cologne
 */

get_header(); ?>

<div class="single-job-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Page Header -->
        <div class="page-header job-header">
            <div class="container">
                <div class="header-content">
                    <div class="breadcrumbs">
                        <a href="<?php echo home_url('/'); ?>"><?php esc_html_e('Home', 'safe-cologne'); ?></a>
                        <span class="separator">/</span>
                        <a href="<?php echo get_permalink(get_page_by_path('karriere')); ?>"><?php esc_html_e('Karriere', 'safe-cologne'); ?></a>
                        <span class="separator">/</span>
                        <span class="current"><?php the_title(); ?></span>
                    </div>
                    
                    <h1 class="job-title"><?php the_title(); ?></h1>
                    
                    <div class="job-meta">
                        <?php
                        $job_type = get_post_meta(get_the_ID(), '_job_type', true);
                        $job_location = get_post_meta(get_the_ID(), '_job_location', true);
                        $job_salary = get_post_meta(get_the_ID(), '_job_salary_range', true);
                        ?>
                        
                        <?php if ($job_type) : ?>
                            <span class="job-type-badge"><?php echo esc_html(ucfirst($job_type)); ?></span>
                        <?php endif; ?>
                        
                        <div class="meta-items">
                            <?php if ($job_location) : ?>
                                <div class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?php echo esc_html($job_location); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($job_salary) : ?>
                                <div class="meta-item">
                                    <i class="fas fa-euro-sign"></i>
                                    <span><?php echo esc_html($job_salary); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span><?php printf(esc_html__('Veröffentlicht: %s', 'safe-cologne'), get_the_date()); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Job Content -->
        <div class="job-content-section">
            <div class="container">
                <div class="job-layout">
                    
                    <!-- Main Content -->
                    <div class="job-main-content">
                        <div class="job-description">
                            <h2><?php esc_html_e('Stellenbeschreibung', 'safe-cologne'); ?></h2>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        
                        <!-- Requirements -->
                        <?php
                        $requirements = get_post_meta(get_the_ID(), '_job_requirements', true);
                        if ($requirements) :
                            $requirements_list = explode("\n", trim($requirements));
                        ?>
                            <div class="job-requirements">
                                <h3><?php esc_html_e('Anforderungen', 'safe-cologne'); ?></h3>
                                <ul class="requirements-list">
                                    <?php foreach ($requirements_list as $requirement) : ?>
                                        <?php if (trim($requirement)) : ?>
                                            <li><?php echo esc_html(trim($requirement)); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Benefits -->
                        <?php
                        $benefits = get_post_meta(get_the_ID(), '_job_benefits', true);
                        if ($benefits) :
                            $benefits_list = explode("\n", trim($benefits));
                        ?>
                            <div class="job-benefits">
                                <h3><?php esc_html_e('Was wir bieten', 'safe-cologne'); ?></h3>
                                <ul class="benefits-list">
                                    <?php foreach ($benefits_list as $benefit) : ?>
                                        <?php if (trim($benefit)) : ?>
                                            <li><?php echo esc_html(trim($benefit)); ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Application Process -->
                        <div class="application-process">
                            <h3><?php esc_html_e('Bewerbungsprozess', 'safe-cologne'); ?></h3>
                            <div class="process-steps">
                                <div class="step">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h4><?php esc_html_e('Bewerbung senden', 'safe-cologne'); ?></h4>
                                        <p><?php esc_html_e('Senden Sie uns Ihre vollständigen Bewerbungsunterlagen.', 'safe-cologne'); ?></p>
                                    </div>
                                </div>
                                
                                <div class="step">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h4><?php esc_html_e('Erstgespräch', 'safe-cologne'); ?></h4>
                                        <p><?php esc_html_e('Bei positiver Vorauswahl laden wir Sie zu einem persönlichen Gespräch ein.', 'safe-cologne'); ?></p>
                                    </div>
                                </div>
                                
                                <div class="step">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h4><?php esc_html_e('Vertragsangebot', 'safe-cologne'); ?></h4>
                                        <p><?php esc_html_e('Nach erfolgreichem Gespräch erhalten Sie Ihr individuelles Angebot.', 'safe-cologne'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="job-sidebar">
                        
                        <!-- Quick Apply Card -->
                        <div class="apply-card">
                            <h3><?php esc_html_e('Interesse geweckt?', 'safe-cologne'); ?></h3>
                            <p><?php esc_html_e('Bewerben Sie sich jetzt direkt online oder kontaktieren Sie uns für weitere Informationen.', 'safe-cologne'); ?></p>
                            
                            <div class="apply-buttons">
                                <button class="btn btn-primary btn-apply" data-job-id="<?php echo get_the_ID(); ?>">
                                    <i class="fas fa-paper-plane"></i>
                                    <?php esc_html_e('Jetzt bewerben', 'safe-cologne'); ?>
                                </button>
                                
                                <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_option('safe_cologne_settings')['phone'] ?? '022165058801')); ?>" class="btn btn-outline">
                                    <i class="fas fa-phone"></i>
                                    <?php esc_html_e('Anrufen', 'safe-cologne'); ?>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Job Details Card -->
                        <div class="job-details-card">
                            <h3><?php esc_html_e('Job Details', 'safe-cologne'); ?></h3>
                            
                            <div class="detail-item">
                                <strong><?php esc_html_e('Anstellungsart:', 'safe-cologne'); ?></strong>
                                <span><?php echo $job_type ? esc_html(ucfirst($job_type)) : esc_html__('Vollzeit', 'safe-cologne'); ?></span>
                            </div>
                            
                            <?php if ($job_location) : ?>
                                <div class="detail-item">
                                    <strong><?php esc_html_e('Standort:', 'safe-cologne'); ?></strong>
                                    <span><?php echo esc_html($job_location); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <?php if ($job_salary) : ?>
                                <div class="detail-item">
                                    <strong><?php esc_html_e('Gehalt:', 'safe-cologne'); ?></strong>
                                    <span><?php echo esc_html($job_salary); ?></span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="detail-item">
                                <strong><?php esc_html_e('Veröffentlicht:', 'safe-cologne'); ?></strong>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            
                            <div class="detail-item">
                                <strong><?php esc_html_e('Job-ID:', 'safe-cologne'); ?></strong>
                                <span><?php echo get_the_ID(); ?></span>
                            </div>
                        </div>
                        
                        <!-- Contact Card -->
                        <div class="contact-card">
                            <h3><?php esc_html_e('Ihr Ansprechpartner', 'safe-cologne'); ?></h3>
                            
                            <div class="contact-person">
                                <div class="contact-avatar">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="contact-info">
                                    <h4><?php esc_html_e('HR-Team SafeCologne', 'safe-cologne'); ?></h4>
                                    <p><?php esc_html_e('Personalabteilung', 'safe-cologne'); ?></p>
                                </div>
                            </div>
                            
                            <div class="contact-methods">
                                <a href="mailto:karriere@safecologne.de" class="contact-method">
                                    <i class="fas fa-envelope"></i>
                                    <span>karriere@safecologne.de</span>
                                </a>
                                
                                <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_option('safe_cologne_settings')['phone'] ?? '022165058801')); ?>" class="contact-method">
                                    <i class="fas fa-phone"></i>
                                    <span><?php echo esc_html(get_option('safe_cologne_settings')['phone'] ?? '0221 65058801'); ?></span>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Share Card -->
                        <div class="share-card">
                            <h3><?php esc_html_e('Job teilen', 'safe-cologne'); ?></h3>
                            <div class="share-buttons">
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn linkedin">
                                    <i class="fab fa-linkedin"></i>
                                    <span>LinkedIn</span>
                                </a>
                                
                                <a href="https://www.xing.com/spi/shares/new?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn xing">
                                    <i class="fab fa-xing"></i>
                                    <span>XING</span>
                                </a>
                                
                                <a href="mailto:?subject=<?php echo urlencode('Stellenanzeige: ' . get_the_title()); ?>&body=<?php echo urlencode('Schau dir diese Stellenanzeige an: ' . get_permalink()); ?>" class="share-btn email">
                                    <i class="fas fa-envelope"></i>
                                    <span>E-Mail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Jobs -->
        <div class="related-jobs-section">
            <div class="container">
                <h2><?php esc_html_e('Weitere offene Stellen', 'safe-cologne'); ?></h2>
                
                <?php
                $related_jobs = get_posts(array(
                    'post_type' => 'jobs',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($related_jobs) : ?>
                    <div class="related-jobs-grid">
                        <?php foreach ($related_jobs as $job) : setup_postdata($job); ?>
                            <div class="related-job-card">
                                <h3><a href="<?php echo get_permalink($job->ID); ?>"><?php echo esc_html($job->post_title); ?></a></h3>
                                
                                <?php
                                $related_type = get_post_meta($job->ID, '_job_type', true);
                                $related_location = get_post_meta($job->ID, '_job_location', true);
                                ?>
                                
                                <div class="related-meta">
                                    <?php if ($related_type) : ?>
                                        <span class="type"><?php echo esc_html(ucfirst($related_type)); ?></span>
                                    <?php endif; ?>
                                    
                                    <?php if ($related_location) : ?>
                                        <span class="location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo esc_html($related_location); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="related-excerpt">
                                    <?php echo wp_trim_words($job->post_excerpt ?: $job->post_content, 20); ?>
                                </div>
                                
                                <a href="<?php echo get_permalink($job->ID); ?>" class="btn btn-outline btn-sm">
                                    <?php esc_html_e('Details ansehen', 'safe-cologne'); ?>
                                </a>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>