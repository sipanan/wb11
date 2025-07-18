<?php
/**
 * Template Name: Über uns
 * 
 * The about us page template for Safe Cologne
 * Telling the company story and introducing the team
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main ueber-uns-page" role="main">
    
    <!-- Hero Section -->
    <section class="about-hero bg-secondary" aria-labelledby="about-hero-title">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <?php 
            $hero_image = get_theme_mod('about_hero_image', get_template_directory_uri() . '/assets/images/about-hero.jpg');
            if ($hero_image): ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="Safe Cologne Team" class="hero-bg-image" loading="eager">
            <?php endif; ?>
        </div>
        
        <div class="container">
            <div class="hero-content text-center text-white">
                <h1 id="about-hero-title" class="hero-title">
                    <?php echo get_theme_mod('about_hero_title', 'Über Safe Cologne'); ?>
                </h1>
                <p class="hero-subtitle">
                    <?php echo get_theme_mod('about_hero_subtitle', 'Sicherheitsdienst mit Herz & System'); ?>
                </p>
                <p class="hero-description">
                    <?php echo get_theme_mod('about_hero_description', 'Seit 2023 stehen wir für professionelle Sicherheitsdienstleistungen in Köln. Lernen Sie unser Team und unsere Geschichte kennen.'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Company Story Section -->
    <section class="company-story section bg-white" aria-labelledby="story-title">
        <div class="container">
            <div class="story-content">
                <div class="story-text">
                    <h2 id="story-title" class="section-title">
                        <?php echo get_theme_mod('story_title', 'Unsere Geschichte'); ?>
                    </h2>
                    <div class="story-intro">
                        <?php 
                        $story_content = get_theme_mod('story_content', 'Safe Cologne wurde 2023 mit einer klaren Vision gegründet: Sicherheit mit menschlichem Ansatz zu bieten. Was als kleine Idee begann, ist heute ein vertrauensvoller Partner für Unternehmen und Privatpersonen in ganz Köln und Umgebung.');
                        echo wp_kses_post(wpautop($story_content));
                        ?>
                    </div>
                </div>
                
                <div class="story-timeline">
                    <div class="timeline-item">
                        <div class="timeline-year">2023</div>
                        <div class="timeline-content">
                            <h3><?php esc_html_e('Gründung in Köln', 'safe-cologne'); ?></h3>
                            <p><?php esc_html_e('Start mit einem kleinen Team von 5 Sicherheitsprofis und der Vision, Sicherheit neu zu definieren.', 'safe-cologne'); ?></p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2023</div>
                        <div class="timeline-content">
                            <h3><?php esc_html_e('Erste Großkunden', 'safe-cologne'); ?></h3>
                            <p><?php esc_html_e('Erfolgreiches Debüt bei mehreren Großveranstaltungen und Übernahme der ersten Objektschutz-Aufträge.', 'safe-cologne'); ?></p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2024</div>
                        <div class="timeline-content">
                            <h3><?php esc_html_e('Expansion & Wachstum', 'safe-cologne'); ?></h3>
                            <p><?php esc_html_e('Ausbau des Teams auf über 100 Mitarbeiter und Erweiterung des Serviceportfolios um Spezialdienstleistungen.', 'safe-cologne'); ?></p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-year">2024</div>
                        <div class="timeline-content">
                            <h3><?php esc_html_e('Modernste Technik', 'safe-cologne'); ?></h3>
                            <p><?php esc_html_e('Einführung von GPS-Tracking, digitaler Berichterstattung und modernster Kommunikationstechnik.', 'safe-cologne'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values Section -->
    <section class="mission-values section bg-gray-50" aria-labelledby="mission-title">
        <div class="container">
            <h2 id="mission-title" class="section-title">
                <?php echo get_theme_mod('mission_title', 'Unsere Mission & Werte'); ?>
            </h2>
            
            <div class="mission-grid">
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Unsere Mission', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('Wir schaffen Sicherheit, die Menschen vertrauen können. Durch professionelle Kompetenz, menschlichen Ansatz und modernste Technik sorgen wir dafür, dass sich unsere Kunden rundum sicher fühlen.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Qualität', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('Höchste Standards in Ausbildung, Ausrüstung und Service. Jeder Mitarbeiter durchläuft kontinuierliche Schulungen und wird regelmäßig weitergebildet.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Menschlichkeit', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('Respekt, Empathie und Deeskalation stehen im Mittelpunkt unseres Handelns. Wir lösen Probleme mit Köpfchen, nicht mit Kraft.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Transparenz', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('Ehrliche Kommunikation, faire Preise und offene Berichterstattung. Unsere Kunden wissen immer, was wir tun und warum.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 6L12 10.5 8.5 8 12 5.5 15.5 8zM12 17.5L8.5 15 12 12.5 15.5 15 12 17.5z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Innovation', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('Modernste Technik und innovative Lösungsansätze. Wir entwickeln uns kontinuierlich weiter, um immer die beste Sicherheit zu bieten.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="mission-card">
                    <div class="mission-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="mission-title-card"><?php esc_html_e('Verlässlichkeit', 'safe-cologne'); ?></h3>
                    <p class="mission-description">
                        <?php esc_html_e('24/7 Verfügbarkeit, pünktliche Einsätze und zuverlässige Kommunikation. Auf uns können Sie sich verlassen – immer.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section section bg-white" aria-labelledby="team-title">
        <div class="container">
            <h2 id="team-title" class="section-title">
                <?php echo get_theme_mod('team_title', 'Unser Führungsteam'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('team_subtitle', 'Die Menschen hinter Safe Cologne'); ?>
            </p>
            
            <div class="team-grid">
                <?php
                // Get team members
                $team_members = new WP_Query(array(
                    'post_type' => 'team_members',
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'meta_query' => array(
                        array(
                            'key' => '_leadership_team',
                            'value' => '1',
                            'compare' => '='
                        )
                    ),
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($team_members->have_posts()) :
                    while ($team_members->have_posts()) : $team_members->the_post();
                        $position = get_post_meta(get_the_ID(), '_member_position', true);
                        $experience = get_post_meta(get_the_ID(), '_member_experience', true);
                        $certifications = get_post_meta(get_the_ID(), '_member_certifications', true);
                        $specialization = get_post_meta(get_the_ID(), '_member_specialization', true);
                ?>
                <article class="team-member">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="member-photo">
                            <?php the_post_thumbnail('team-member', array('loading' => 'lazy')); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="member-info">
                        <h3 class="member-name"><?php the_title(); ?></h3>
                        <?php if ($position) : ?>
                            <p class="member-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                        
                        <div class="member-content">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <?php if ($experience) : ?>
                            <div class="member-experience">
                                <strong><?php echo esc_html($experience); ?> Jahre Erfahrung</strong>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($specialization) : ?>
                            <div class="member-specialization">
                                <strong><?php esc_html_e('Spezialisierung:', 'safe-cologne'); ?></strong>
                                <?php echo esc_html($specialization); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>
                <?php 
                    endwhile; 
                    wp_reset_postdata();
                else : ?>
                    <div class="no-team-members">
                        <p><?php esc_html_e('Derzeit sind keine Teammitglieder verfügbar.', 'safe-cologne'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Facts & Figures Section -->
    <section class="facts-figures section bg-gray-50" aria-labelledby="facts-title">
        <div class="container">
            <h2 id="facts-title" class="section-title">
                <?php echo get_theme_mod('facts_title', 'Zahlen & Fakten'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('facts_subtitle', 'Safe Cologne in Zahlen'); ?>
            </p>
            
            <div class="facts-grid">
                <div class="fact-item">
                    <div class="fact-number" data-count="500">0</div>
                    <h3 class="fact-label"><?php esc_html_e('Geschützte Objekte', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('Bürogebäude, Produktionsstätten, Baustellen und Events', 'safe-cologne'); ?></p>
                </div>
                
                <div class="fact-item">
                    <div class="fact-number" data-count="100">0</div>
                    <h3 class="fact-label"><?php esc_html_e('Team-Mitglieder', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('Qualifizierte Sicherheitsfachkräfte nach §34a GewO', 'safe-cologne'); ?></p>
                </div>
                
                <div class="fact-item">
                    <div class="fact-number" data-count="24">0</div>
                    <h3 class="fact-label"><?php esc_html_e('Stunden täglich', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('365 Tage im Jahr für Sie erreichbar und einsatzbereit', 'safe-cologne'); ?></p>
                </div>
                
                <div class="fact-item">
                    <div class="fact-number" data-count="99.9">0</div>
                    <h3 class="fact-label"><?php esc_html_e('% Zuverlässigkeit', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('Pünktlichkeit und Verfügbarkeit bei allen Einsätzen', 'safe-cologne'); ?></p>
                </div>
                
                <div class="fact-item">
                    <div class="fact-number" data-count="1200">0</div>
                    <h3 class="fact-label"><?php esc_html_e('Events gesichert', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('Von Firmenfeiern bis zu Großveranstaltungen', 'safe-cologne'); ?></p>
                </div>
                
                <div class="fact-item">
                    <div class="fact-number" data-count="98">0</div>
                    <h3 class="fact-label"><?php esc_html_e('% Kundenzufriedenheit', 'safe-cologne'); ?></h3>
                    <p class="fact-description"><?php esc_html_e('Basierend auf Kundenbewertungen und Feedback', 'safe-cologne'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="certifications section bg-white" aria-labelledby="cert-title">
        <div class="container">
            <h2 id="cert-title" class="section-title">
                <?php echo get_theme_mod('cert_title', 'Zertifizierungen & Partner'); ?>
            </h2>
            <p class="section-subtitle">
                <?php echo get_theme_mod('cert_subtitle', 'Unsere Qualifikationen und Partnerschaften'); ?>
            </p>
            
            <div class="certifications-grid">
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                    </div>
                    <h3 class="cert-title"><?php esc_html_e('§34a GewO Zertifizierung', 'safe-cologne'); ?></h3>
                    <p class="cert-description">
                        <?php esc_html_e('Alle Mitarbeiter sind nach dem Bewachungsgewerbegesetz zertifiziert und regelmäßig geschult.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <h3 class="cert-title"><?php esc_html_e('ISO 9001 Qualitätsmanagement', 'safe-cologne'); ?></h3>
                    <p class="cert-description">
                        <?php esc_html_e('Zertifizierte Qualitätsmanagementsysteme für gleichbleibend hohe Servicequalität.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <h3 class="cert-title"><?php esc_html_e('IHK Köln Mitgliedschaft', 'safe-cologne'); ?></h3>
                    <p class="cert-description">
                        <?php esc_html_e('Mitglied der Industrie- und Handelskammer Köln für regionalen Wirtschaftsaustausch.', 'safe-cologne'); ?>
                    </p>
                </div>
                
                <div class="cert-item">
                    <div class="cert-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                        </svg>
                    </div>
                    <h3 class="cert-title"><?php esc_html_e('BDSW Verband', 'safe-cologne'); ?></h3>
                    <p class="cert-description">
                        <?php esc_html_e('Mitglied im Bundesverband der Sicherheitswirtschaft für Branchenstandards.', 'safe-cologne'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="about-cta section bg-primary" aria-labelledby="about-cta-title">
        <div class="container">
            <div class="cta-content text-center text-white">
                <h2 id="about-cta-title" class="cta-title">
                    <?php echo get_theme_mod('about_cta_title', 'Werden Sie Teil unserer Erfolgsgeschichte'); ?>
                </h2>
                <p class="cta-description">
                    <?php echo get_theme_mod('about_cta_description', 'Vertrauen Sie auf unsere Erfahrung und Kompetenz. Lassen Sie uns gemeinsam Ihre Sicherheitsanforderungen lösen.'); ?>
                </p>
                
                <div class="cta-buttons">
                    <a href="/kontakt" class="btn btn-white btn-lg">
                        <?php esc_html_e('Jetzt kontaktieren', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </a>
                    <a href="/karriere" class="btn btn-secondary btn-lg">
                        <?php esc_html_e('Jobs & Karriere', 'safe-cologne'); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 00-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>