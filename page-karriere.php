<?php
/**
 * Template Name: Karriere
 * 
 * The careers page template for Safe Cologne
 * Focused on recruitment and team building
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main karriere-page" role="main">
    
    <!-- Hero Section -->
    <section class="karriere-hero bg-secondary" aria-labelledby="karriere-hero-title">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php 
            $hero_image = get_theme_mod('karriere_hero_image', get_template_directory_uri() . '/assets/images/team-karriere.jpg');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Karriere bei Safe Cologne" class="hero-bg-image" loading="eager">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content text-center text-white">
                <h1 id="karriere-hero-title" class="hero-title">
                    <?php echo get_theme_mod('karriere_hero_title', 'Dein Job mit Sinn'); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo get_theme_mod('karriere_hero_subtitle', 'Werde Teil unseres Teams bei Safe Cologne'); ?>
                </p>
                <p class="hero-description">
                    <?php echo get_theme_mod('karriere_hero_description', 'Bei uns bist du mehr als ein Sicherheitsmitarbeiter – du bist Sicherheitsgastgeber mit Herz und Verstand.'); ?>
                </p>
                
                <div class="hero-cta">
                    <a href="#jobs" class="btn btn-primary btn-lg">
                        <?php esc_html_e('Offene Stellen ansehen', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M8.59 16.58L13.17 12l-4.58-4.59L10 6l6 6-6 6-1.41-1.42z"/>
                        </svg>
                    </a>
                    <a href="mailto:bewerbung@safecologne.de" class="btn btn-white btn-lg">
                        <?php esc_html_e('Initiativbewerbung', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Work With Us Section -->
    <section class="why-work-section section bg-white" aria-labelledby="why-work-title">
        <div class="container">
            <h2 id="why-work-title" class="section-title">
                <?php echo get_theme_mod('why_work_title', 'Warum bei Safe Cologne arbeiten?'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('why_work_subtitle', 'Diese Benefits erwarten dich bei uns'); ?>
            </p>
            
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Übertarifliche Bezahlung', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Faire Vergütung über dem Branchendurchschnitt mit attraktiven Zuschlägen für Nacht- und Wochenendarbeit.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Moderne Ausstattung', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Professionelle Arbeitskleidung, moderne Kommunikationstechnik und Sicherheitsausrüstung auf dem neuesten Stand.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Teamgeist & Respekt', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Kollegiales Arbeitsumfeld mit flachen Hierarchien, persönlicher Wertschätzung und echtem Teamgefühl.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Weiterbildung & Aufstieg', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Kontinuierliche Schulungen, Zertifizierungen und klare Karrierepfade für deine berufliche Entwicklung.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 6L12 10.5 8.5 8 12 5.5 15.5 8zM12 17.5L8.5 15 12 12.5 15.5 15 12 17.5z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Flexible Arbeitszeiten', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Familienfreundliche Schichtmodelle, die Work-Life-Balance ermöglichen und individuelle Bedürfnisse berücksichtigen.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 11H7v6h2v-6zm4 0h-2v6h2v-6zm4 0h-2v6h2v-6zm2-7H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM19 20H5V8h14v12z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title"><?php esc_html_e('Soziale Absicherung', 'safe-cologne'); ?></h3>
                    <p class="benefit-description">
                        <?php esc_html_e('Betriebliche Altersvorsorge, Gesundheitsförderung und umfassende Sozialleistungen für deine Sicherheit.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Open Positions Section -->
    <section id="jobs" class="jobs-section section bg-gray-50" aria-labelledby="jobs-title">
        <div class="container">
            <h2 id="jobs-title" class="section-title">
                <?php echo get_theme_mod('jobs_title', 'Aktuelle Stellenangebote'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('jobs_subtitle', 'Finde deinen perfekten Job bei Safe Cologne'); ?>
            </p>
            
            <div class="jobs-filter">
                <button class="filter-btn active" data-filter="all">
                    <?php esc_html_e('Alle Stellen', 'safe-cologne'); ?>
                </button>
                <button class="filter-btn" data-filter="vollzeit">
                    <?php esc_html_e('Vollzeit', 'safe-cologne'); ?>
                </button>
                <button class="filter-btn" data-filter="teilzeit">
                    <?php esc_html_e('Teilzeit', 'safe-cologne'); ?>
                </button>
                <button class="filter-btn" data-filter="minijob">
                    <?php esc_html_e('Minijob', 'safe-cologne'); ?>
                </button>
            </div>
            
            <div class="jobs-grid">
                <?php
                // Get job openings
                $jobs = new WP_Query(array(
                    'post_type' => 'job_openings',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'meta_key' => '_job_type',
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($jobs->have_posts()) :
                    while ($jobs->have_posts()) : $jobs->the_post();
                        $job_type = get_post_meta(get_the_ID(), '_job_type', true);
                        $job_location = get_post_meta(get_the_ID(), '_job_location', true);
                        $job_salary = get_post_meta(get_the_ID(), '_job_salary_range', true);
                        $job_requirements = get_post_meta(get_the_ID(), '_job_requirements', true);
                        $job_benefits = get_post_meta(get_the_ID(), '_job_benefits', true);
                        
                        $type_labels = array(
                            'vollzeit' => __('Vollzeit', 'safe-cologne'),
                            'teilzeit' => __('Teilzeit', 'safe-cologne'),
                            'minijob' => __('Minijob', 'safe-cologne'),
                            'freelance' => __('Freelance', 'safe-cologne'),
                        );
                ?>
                <article class="job-card" data-job-type="<?php echo esc_attr($job_type); ?>">
                    <div class="job-header">
                        <h3 class="job-title"><?php the_title(); ?></h3>
                        <div class="job-meta">
                            <?php if ($job_type && isset($type_labels[$job_type])) : ?>
                                <span class="job-type job-type-<?php echo esc_attr($job_type); ?>">
                                    <?php echo esc_html($type_labels[$job_type]); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($job_location) : ?>
                                <span class="job-location">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                    </svg>
                                    <?php echo esc_html($job_location); ?>
                                </span>
                            <?php endif; ?>
                            <?php if ($job_salary) : ?>
                                <span class="job-salary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                                    </svg>
                                    <?php echo esc_html($job_salary); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="job-content">
                        <div class="job-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php if ($job_requirements) : ?>
                            <div class="job-requirements">
                                <h4><?php esc_html_e('Das bringst du mit:', 'safe-cologne'); ?></h4>
                                <?php 
                                $requirements = explode("\n", $job_requirements);
                                if (!empty($requirements)) : ?>
                                    <ul>
                                        <?php foreach (array_slice($requirements, 0, 3) as $requirement) : ?>
                                            <li><?php echo esc_html(trim($requirement)); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="job-footer">
                        <div class="job-actions">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                <?php esc_html_e('Details ansehen', 'safe-cologne'); ?>
                            </a>
                            <a href="mailto:bewerbung@safecologne.de?subject=Bewerbung: <?php echo urlencode(get_the_title()); ?>" 
                               class="btn btn-secondary">
                                <?php esc_html_e('Jetzt bewerben', 'safe-cologne'); ?>
                            </a>
                        </div>
                    </div>
                </article>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <div class="no-jobs">
                        <h3><?php esc_html_e('Derzeit keine offenen Stellen', 'safe-cologne'); ?></h3>
                        <p><?php esc_html_e('Wir freuen uns aber über Initiativbewerbungen!', 'safe-cologne'); ?></p>
                        <a href="mailto:bewerbung@safecologne.de" class="btn btn-primary">
                            <?php esc_html_e('Initiativbewerbung senden', 'safe-cologne'); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Application Process Section -->
    <section class="application-process section bg-white" aria-labelledby="process-title">
        <div class="container">
            <h2 id="process-title" class="section-title">
                <?php echo get_theme_mod('process_title', 'So einfach bewirbst du dich'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('process_subtitle', 'Dein Weg zu uns in nur wenigen Schritten'); ?>
            </p>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3 class="step-title"><?php esc_html_e('Bewerbung senden', 'safe-cologne'); ?></h3>
                    <p class="step-description">
                        <?php esc_html_e('Schick uns deine vollständigen Bewerbungsunterlagen per E-Mail oder bewirb dich direkt über unsere Stellenanzeigen.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3 class="step-title"><?php esc_html_e('Erstes Gespräch', 'safe-cologne'); ?></h3>
                    <p class="step-description">
                        <?php esc_html_e('Wir laden dich zu einem persönlichen oder telefonischen Kennenlerngespräch ein, um mehr über dich zu erfahren.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3 class="step-title"><?php esc_html_e('Praktischer Test', 'safe-cologne'); ?></h3>
                    <p class="step-description">
                        <?php esc_html_e('Bei einem Probearbeitstag kannst du uns und das Team kennenlernen. Wir zeigen dir deine zukünftigen Aufgaben.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3 class="step-title"><?php esc_html_e('Willkommen im Team', 'safe-cologne'); ?></h3>
                    <p class="step-description">
                        <?php esc_html_e('Nach einer erfolgreichen Bewerbung starten wir gemeinsam mit einer umfassenden Einarbeitung in deine neue Rolle.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="karriere-cta section bg-primary" aria-labelledby="karriere-cta-title">
        <div class="container">
            <div class="cta-content text-center text-white">
                <h2 id="karriere-cta-title" class="cta-title">
                    <?php echo get_theme_mod('karriere_cta_title', 'Bereit für den nächsten Schritt?'); ?>
                </h2>
                <p class="cta-description">
                    <?php echo get_theme_mod('karriere_cta_description', 'Werde Teil unseres Teams und starte deine Karriere bei Safe Cologne. Wir freuen uns auf deine Bewerbung!'); ?>
                </p>
                
                <div class="cta-buttons">
                    <a href="mailto:bewerbung@safecologne.de" class="btn btn-white btn-lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                        <?php esc_html_e('Jetzt bewerben', 'safe-cologne'); ?>
                    </a>
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '0221 65058801'))); ?>" 
                       class="btn btn-secondary btn-lg">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                        <?php esc_html_e('Fragen? Anrufen!', 'safe-cologne'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>